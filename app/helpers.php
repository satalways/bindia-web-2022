<?php

use App\Models\Template;
use Firebase\JWT\JWT;
use Illuminate\Mail\Message;
use libphonenumber\PhoneNumberUtil;
use Illuminate\Support\Facades\Mail;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use TijsVerkoyen\CssToInlineStyles\CssToInlineStyles;

function DateFormat($date)
{
    if ($date instanceof \Carbon\Carbon) {
        return $date->format(config('app.date_format'));
    } else {
        return \Carbon\Carbon::create($date)->format(config('app.date_format'));
    }
}

function DateTimeFormat($date)
{
    if ($date instanceof \Carbon\Carbon) {
        return $date->format(config('app.date_time_format'));
    } else {
        return \Carbon\Carbon::create($date)->format(config('app.date_time_format'));
    }
}

function template($id)
{
    try {
        $obj = Template::query()
                       ->where('id', $id)
                       ->orWhere('TemplateNo', $id)
                       ->first();
    } catch (Exception $e) {
        $obj = null;
    }

    if (empty($obj)) {
        return new class{
            public $TemplateNo = '';

            public $id = 0;

            public $subject = '-';

            public $content = '';

            public $name = '';

            public $number = 0;

            public $template_version = 0;

            public $type = '';

            public $function = '';

            public $description = '';

            public $approved = false;

            public function setOption($key, $value)
            {
                throw new Exception('User not found in database');
            }

            public function getOption($key)
            {
                throw new Exception('User not found in database');
            }

            public function toArray()
            {
                return [];
            }
        };
    } else {
        return $obj;
    }
}

/**
 * @param $phone_number
 * @param string $region_code
 * @return bool
 * @throws \libphonenumber\NumberParseException
 */
function is_phone($phone_number, $region_code = 'DK')
{
    if (blank($phone_number)) {
        return false;
    }
    //	$replace      = [ '+', ' ' ];
    //	$phone_number = str_replace( $replace, '', trim( $phone_number ) );

    /*## Set region for pakistan
	if ( strlen( $phone_number ) == 12 && substr( $phone_number, 0, 2 ) == '92' ) {
		$region_code = 'PK';
	}

	## Set region for Norway
	if ( strlen( $phone_number ) == 10 && substr( $phone_number, 0, 2 ) == '47' ) {
		$region_code = 'NO';
	}*/

    //	if ( substr( $phone_number, 0, 2 ) <> '45' ) {
    //		$phone_number = '00' . $phone_number;
    //	}

    // https://github.com/giggsey/libphonenumber-for-php
    try {
        $phoneNumberUtil = libphonenumber\PhoneNumberUtil::getInstance();

        $phoneNumberObject = $phoneNumberUtil->parse($phone_number, $region_code);

        return $phoneNumberUtil->isValidNumber($phoneNumberObject);
    } catch (Exception $exception) {
        return false;
    }
}

/**
 * @param $phone_number
 * @param string $region_code
 * @return string|string[]
 */
function formatize_phone_number($phone_number, string $region_code = 'DK')
{
    try {
        $phone_number = trim($phone_number);

        if (substr($phone_number, 0, 1) == '+') {
            $phoneNumberUtil = PhoneNumberUtil::getInstance();
            $phoneNumberObject = $phoneNumberUtil->parse($phone_number);

            return $phoneNumberUtil->format($phoneNumberObject, 1);
        }

        $replace = ['+', ' '];
        $phone_number = str_replace($replace, '', trim($phone_number));

        if (isset($phone_number[11]) && substr($phone_number, 0, 2) == '92') {
            //$phone_number = '00' + $phone_number;
            $region_code = 'PK';
        }
        $phoneNumberUtil = PhoneNumberUtil::getInstance();

        $phoneNumberObject = $phoneNumberUtil->parse($phone_number, $region_code);

        return $phoneNumberUtil->format($phoneNumberObject, 1);
    } catch (Exception $e) {
        return $phone_number;
    }
}

function testServer()
{
    $_SERVER['HTTP_HOST'] = $_SERVER['HTTP_HOST'] ?? '';

    return $_SERVER['HTTP_HOST'] === 'testsite.bindia.dk';
}

function localhost()
{
    $_SERVER['HTTP_HOST'] = $_SERVER['HTTP_HOST'] ?? '';
    $_SERVER['REMOTE_ADDR'] = $_SERVER['REMOTE_ADDR'] ?? '';

    if (! isset($_SERVER["HTTP_HOST"])) {
        return false;
    }

    return in_array($_SERVER["HTTP_HOST"], [
            'local.bindia.pk',
            '127.0.0.1',
            'localhost',
            'admin.bindia.pk',
            'bindia.localhost',
            'staff.bindia.pk',
            '127.0.0.1:8000',
        ]) || in_array($_SERVER["REMOTE_ADDR"], [
            '::1',
            '127.0.0.1',
        ]);
}

function send_mail($to, string $subject, string $htmlContent, array $fields = [], $attachedFiles = null)
{
    if (testServer()) {
//        if (trim(strtolower($to)) !== 'jacoblanghorn@gmail.com') {
        $to = [
            'shakeel@shakeel.pk',
            'arslan@bindia.dk',
            //'shakeel1000@hotmail.com'
        ];
//        }
    } else if (localhost()) {
        $to = env('EMAILS_SEND_TO', 'shakeel@shakeel.pk');
    }

    $fields = array_combine(
        array_map(function($key) {
            return '{' . $key . '}';
        }, array_keys($fields)),
        $fields
    );

    $htmlContent = strtr($htmlContent, $fields);
    $htmlContent = view('layouts.email', [
        'content' => $htmlContent,
        'subject' => $subject,
    ])->render();
    $cssToInlineStyles = new CssToInlineStyles();
    $cssPath = resource_path('css/email.css');

    $htmlContent = $cssToInlineStyles->convert($htmlContent, file_get_contents($cssPath));
    $subject = strtr($subject, $fields);

    if (! empty($attachedFiles)) {
        $attachedFiles = make_array($attachedFiles);
    }
    $dsn = 'smtp://' . env('MAIL_USERNAME') . ':' . env('MAIL_PASSWORD') . '@' . env('MAIL_HOST') . ':' . env('MAIL_PORT') . '?verify_peer=0';

    try {
        $mailer = \Symfony\Component\Mailer\Transport::fromDsn($dsn);
        $email = new   \Symfony\Component\Mime\Email();

        //debug(env('MAIL_FROM_ADDRESS', 'office@bindia.dk'));
        $email->from(new \Symfony\Component\Mime\Address(env('MAIL_FROM_ADDRESS', 'office@bindia.dk'), env('MAIL_FROM_NAME', 'Bindia')));

        $to = make_array($to);
        foreach ($to as $e) {
            $email->addTo($e);
        }
        $email->subject($subject)
              ->text(strip_tags($htmlContent))
              ->html($htmlContent);

        if (is_array($attachedFiles)) {
            foreach ($attachedFiles as $file) {
                if (! is_string($file)) continue;
                if (is_file($file)) $email->attachFromPath($file);
            }
        }

        $mailer->send($email);
    } catch (Exception $exception) {
        return $exception->getMessage();
    }

//    try {
//        Mail::send([], [], function (Message $message) use ($to, $subject, $htmlContent, $attachedFiles) {
//            $message
//                ->from(env('MAIL_FROM_ADDRESS', 'office@bindia.dk'), env('MAIL_FROM_NAME', 'Bindia'))
//                ->to($to)
//                ->subject($subject)
//                ->setBody($htmlContent, 'text/html');
//
//            if (is_array($attachedFiles)) {
//                foreach ($attachedFiles as $attachedFile) {
//                    if (is_file($attachedFile))
//                        $message->attach($attachedFile);
//                }
//            }
//        });
//    } catch (Exception $exception) {
//        return $exception->getMessage();
//    }

    try {
        \App\Models\MailLogs::query()->insert([
            'to' => is_array($to) ? json_encode($to) : $to,
            'name' => '',
            'subject' => $subject,
            'message' => $htmlContent,
            'time' => \Carbon\Carbon::now(),
            'ip' => getIP(),
            'user_id' => 0,
        ]);
    } catch (Exception $exception) {

    }

    return 'OK';
}

function js($code)
{
    switch ($code) {
        case 'select2':
            return '
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css" integrity="sha512-aD9ophpFQ61nFZP6hXYu4Q/b/USW7rpLCQLX6Bi0WJHXNO7Js/fUENpBQf/+P4NtpzNX0jSgR5zVvPOJp+W2Kg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-5-theme/1.2.0/select2-bootstrap-5-theme.min.css" integrity="sha512-ZaFewc2ndIrsFWmG9gZR9zfJtR1Q+bvikASGXnQlUtoGj1PLDTyDabWdLbjC/YmyqTH8Txi/RdYcQW5Xpah3Ig==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js" integrity="sha512-4MvcHwcbqXKUHB6Lx3Zb5CEAVoE9u84qN+ZSMM6s7z8IeJriExrV3ND5zRze9mxNlABJ6k864P/Vl8m0Sd3DtQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            ';
        case 'cookie':
            return '
            <script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.2.1/js.cookie.min.js" integrity="sha512-Meww2sXqNHxI1+5Dyh/9KAtvI9RZSA4c1K2k5iL02oiPO/RH3Q30L3M1albtqMg50u4gRTYdV4EXOQqXEI336A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            ';
        case 'form':
            return '
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha512-YUkaLm+KJ5lQXDBdqBqk7EVhJAdxRnVdT2vtCzwPHSweCzyMgYV/tgGF4/dCyqtCC2eCphz0lRQgatGVdfR0ww==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            ';
            break;
        case 'validate':
        case 'validation':
            $string = '
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            ';

            if (getCurrentLang() == 'da') {
                $string .= '
                <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-message-box@3.2.2/dist/messagebox.min.js"></script>
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-message-box@3.2.2/dist/messagebox.min.css">

                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/localization/messages_da.min.js"
                    integrity="sha512-jVUoHWGGjz3AnASc4bcelHoffeTAqPPTNfubjsC4vtV9TrsJc99N4EqNFNYuBCIV2jJRq+MFW61XiFMkp7SWvw=="
                    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            ';
            }

            return $string;
        case 'date':
            return '
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.6.4/themes/default.css" integrity="sha512-x9ZSPqJJfUhtPuo+fw6331wHeC3vhDpNI3Iu4KC05zJrxx7MWYewaDaASGxAUgWyrwU50oFn6Xk0CrQnTSuoOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.6.4/themes/default.date.css" integrity="sha512-Ix4qjGzOeoBtc8sdu1i79G1Gxy6azm56P4z+KFl+po7kOtlKhYSJdquftaI4hj1USIahQuZq5xpg7WgRykDJPA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.6.4/themes/default.time.css" integrity="sha512-OVCdZvsw/MeYx12cD+0Cmw/TA5Iw3bJXM4dpSIxXmDK3X5erHyETXkB3OGqnNQ72sL4UOuyTH9kdWds2MGYcBQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
                <script src="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.6.4/compressed/picker.js" integrity="sha512-PC6BMUJfhXSSRw6fOnyfn21Yjc/6oRUnAGUboA+uzAUkKX5K2wzUvTHPCEjfwmmfrjCuiSnf23iX8JYVlJTXmA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.6.4/compressed/picker.date.js" integrity="sha512-sWV6NfLhYF/5QK1RdK4rp0uwxn/eTKOuqf73dU7APGW3KVfCTblF1/9a+4pyXLQcSS25dxOkXWe7Mv7hYYft7g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.6.4/compressed/picker.time.js" integrity="sha512-wsTBGzc0ra42jNgXre39rdHpXqAkkaSN+bRrXZ3hpOvqxOtLNZns3OseDZRfGCWSs00N9HuXyKHZEzKAWCl3SA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            ';
        case 'lazyload':
        case 'img':
            return '
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyloadxt/1.1.0/jquery.lazyloadxt.min.js" integrity="sha512-3vivnUcccTdHsFyh6mAPtdxQ09Ihk1PbBajJ0PSshJftB7ekRxDmMsM4aKS0Ja1bfgkUgde71N2k1sDzQ9NvTg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            ';
        case 'bootbox':
            return '

            ';
    }
}

function make_array($arr, $sep = ",", $considerLineBreaks = false)
{
    if (is_string($arr) && trim($arr) == "") {
        return [];
    }
    if (is_object($arr) || is_array($arr)) {
        return json_decode(json_encode($arr), true);
    }
    if (is_json($arr)) {
        return json_decode($arr, true);
    }
    if ($considerLineBreaks) {
        $arr = str_replace("\n", $sep, $arr);
    }
    //$arr = str_replace("'", "''", $arr);            // To avoid error MySQL insertion/update.
    $arr = explode($sep, $arr);
    $arr = array_map('trim', $arr);
    $arr = array_filter($arr);

    return $arr;
}

function queries()
{
    return \DB::getQueryLog();
}

/**
 * @param $args
 * @param $default
 *
 * @return array
 *
 * This method checks default parameters and set with give parameters.
 */
function set_args($args, $default): array
{
    if (! is_array($args)) {
        $args = str_replace(" = ", "=", $args);
        $args = str_replace(" =", "=", $args);
        $args = str_replace(" =", "=", $args);
        $args = str_replace(" =", "=", $args);
        $args = stripslashes($args);
        parse_str($args, $args);
    }
    if (! is_array($args)) {
        return [];
    }
    $default = make_array($default);
    if (! is_array($default)) {
        return $default;
    }
    foreach ($default as $k => $v) {
        if (! isset($args[$k])) {
            $args[$k] = $v;
        }
    }

    //$args = array_map("stripslashes", $args);

    return $args;
}

/**
 * @return false|int
 */
function isMobile()
{
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"] ?? '');
}

function getOption(string $keyName, mixed $defaultValue = null)
{
    $value = \App\Models\Options::query()->where('field_name', $keyName)->value('field_value');

    if (! $value) return $defaultValue;

    return unserialize($value);
}

function setOption(string $keyName, mixed $value)
{
    $row = \App\Models\Options::query()->where('field_name', $keyName)->firstOrNew();

    try {
        $row->field_name = $keyName;
        $row->field_value = serialize($value);
        $row->update_time = \Carbon\Carbon::now();
        $row->save();
    } catch (Exception) {
        return false;
    }

    return true;
}

function number_format2($value, $decimals = 2)
{
    if (isDanish()) {
        return number_format($value, $decimals, ',', '.');
    } else {
        return number_format($value, $decimals);
    }
}

/**
 * @param $s
 *
 * @return bool
 *
 * Check if given string is valid base64 string or not.
 */
function is_base64($s)
{
    // Check if there are valid base64 characters
    if (! preg_match('/^[a-zA-Z0-9\/\r\n+]*={0,2}$/', $s)) {
        return false;
    }

    // Decode the string in strict mode and check the results
    $decoded = base64_decode($s, true);
    if (false === $decoded) {
        return false;
    }

    // Encode the string again
    if (base64_encode($decoded) != $s) {
        return false;
    }

    return true;
}

function encodeData(array $data)
{
    return JWT::encode($data, config('app.encode_key'));
}

function decodeString($token, $needTokenInStringForm = false, $encodeKey = null)
{
    $proceedWithOldString = false;

    if (is_base64($token)) {
        $de_token = json_decode(base64_decode(urldecode($token)));
        if (isset($de_token->id) && $de_token->id <= 10000) {
            $proceedWithOldString = true;
        }
    }

    if ($proceedWithOldString) {
        $de_token = json_decode(base64_decode(urldecode($token)));
    } else {
        try {
            if ($encodeKey) {
                $de_token = JWT::decode(urldecode($token), $encodeKey, ['HS256']);
            } else {
                $de_token = JWT::decode(urldecode($token), config('app.encode_key'), ['HS256']);
            }
        } catch (\Exception $e) {
            $needTokenInStringForm = (bool) $needTokenInStringForm;
            if ($needTokenInStringForm) {
                return '';
            } else {
                return (object) [];
            }
        }
    }

    $needTokenInStringForm = (bool) $needTokenInStringForm;

    if ($needTokenInStringForm) {
        $de_token = (array) $de_token;

        return isset ($de_token['id']) ? $de_token['id'] : 0;
    } else {
        return $de_token;
    }
}

/**
 * @return string
 */
function getLastQuery()
{
    $queryObject = \DB::getQueryLog();
    $queryObject = end($queryObject);
    $addSlashes = str_replace('?', "'?'", $queryObject['query']);

    return vsprintf(str_replace('?', '%s', $addSlashes), $queryObject['bindings']);
}

/**
 * @return array
 */
function getAllQueries()
{
    $queries = \DB::getQueryLog();
    $return = [];
    foreach ($queries as $queryObject) {
        $addSlashes = str_replace('?', "'?'", $queryObject['query']);
        $return[] = vsprintf(str_replace('?', '%s', $addSlashes), $queryObject['bindings']);
    }

    return $return;
}

/**
 * @param $builder
 * @return string
 */
function getQueryByObject($builder)
{
    $addSlashes = str_replace('?', "'?'", $builder->toSql());

    return vsprintf(str_replace('?', '%s', $addSlashes), $builder->getBindings());
}

/**
 * @param $code
 * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
 */
function item($code)
{
    return \once(function() use ($code) {
        if ($code == config('catering.thermo_box_plu')) {
            return (object) [
                'id' => 0,
                'name' => config('catering.thermo_box_name'),
                'slug' => \Str::slug(config('catering.thermo_box_name')),
                'code' => config('catering.thermo_box_plu'),
                'bag_points' => 0,
                'description_en' => '',
                'description_dk' => '',
                'portion' => '',
                'section' => '',
                'veg' => false,
                'vegan' => false,
                'nuts' => false,
                'dairy' => false,
                'gluten' => false,
                'chili' => false,
                'price' => config('catering.thermo_box_price'),
            ];
        }

        return \App\Models\OrderItems::query()
                                     ->where('code', $code)
                                     ->orWhere('id', $code)
                                     ->first();
    });
}

function shop($codeName)
{
    if (is_array($codeName) || is_object($codeName)) return null;
    $codeName = strtoupper($codeName);

    return once(function() use ($codeName) {
        $shops = config('shops');
        if (! isset($shops[$codeName])) {
            foreach ($shops as $shop) {
                if (isset($shop['takeout_id']) && $shop['takeout_id'] == $codeName) {
                    return (object) $shop;
                }
            }

            return null;
        };

        return (object) $shops[$codeName];
    });
}

function getCurrentLang()
{
    //return str_starts_with(request()->path(), 'en/') ? 'en' : 'da';
    return LaravelLocalization::getCurrentLocale();
}

function get_admin_link($path = '')
{
    if (localhost()) {
        $link = 'https://admin.bindia.pk/';
    } else if (testServer()) {
        $link = 'https://testadmin.bindia.dk/';
    } else {
        $link = 'https://admin.bindia.dk/';
    }

    return $link . $path;
}

function rating_image($rating)
{
    return 'https://admin.bindia.dk/images/rating_' . $rating . '.png';
}

function seo($page)
{
    $row = \App\Models\SEOModel::query()->where('page', $page)->first();

    return $row;
}

function isPKIp()
{
    return in_array(getIP(), [
        '72.255.21.22',
        '119.63.139.53',
        '2400:adc5:1b2:f500:7da0:5f8a:1206:8bf8',
        '119.63.139.22',
    ]);
}

function isLiveServer()
{
    $serverName = request()->server('HTTP_HOST');

    return in_array($serverName, ['www.bindia.dk', 'bindia.dk']);
}

function nextTime()
{
    $minutes = \Carbon\Carbon::now()->minute;
    $minutes = ($minutes % 5);

    return \Carbon\Carbon::now()->addMinutes($minutes)->format('H:i');
}

function spiceName($rawName)
{
    switch (strtolower($rawName)) {
        case 'default':
            return '';
        case 'hot':
            return 'Hot';
        case 'xhot':
            return 'X-Hot';
        default:
            return $rawName;
    }
}

function isDanish()
{
    return getCurrentLang() === 'da';
}

function debug_my($val)
{
    if (is_bool($val)) $val = $val ? 'TRUE' : 'FALSE';
    \Log::info($val);
}

function getIP()
{
    return once(function() {
        if (getenv('HTTP_CLIENT_IP')) {
            $ip = getenv('HTTP_CLIENT_IP');
        } else if (getenv('HTTP_X_FORWARDED_FOR')) {
            $ip = getenv('HTTP_X_FORWARDED_FOR');
        } else if (getenv('HTTP_X_FORWARDED')) {
            $ip = getenv('HTTP_X_FORWARDED');
        } else if (getenv('HTTP_FORWARDED_FOR')) {
            $ip = getenv('HTTP_FORWARDED_FOR');
        } else if (getenv('HTTP_FORWARDED')) {
            $ip = getenv('HTTP_FORWARDED');
        } else {
            $ip = @$_SERVER['REMOTE_ADDR'];
        }

        return $ip;
    });
}

function getRouteName()
{
    if (\Request::route()) {
        return \Request::route()->getName();
    } else {
        return '';
    }
}

function getMilkToolTip()
{
    return once(function() {
        return getCurrentLang() === 'en' ? 'Contains lactose' : 'Indeholder laktose';
    });
}

function getNutsToolTip()
{
    return once(function() {
        return getCurrentLang() === 'en' ? 'Contains nuts' : 'Indeholder nødder';
    });
}

function getWheatToolTip()
{
    return once(function() {
        return getCurrentLang() === 'en' ? 'Contains gluten' : 'Indeholder gluten';
    });
}

function getChiliToolTip()
{
    return once(function() {
        return getCurrentLang() === 'en' ? 'Spicy' : 'Stærk';
    });
}

function getDoubleChiliToolTip()
{
    return once(function() {
        return getCurrentLang() === 'en' ? 'Very spicy' : 'Meget stærk';
    });
}

function getVegToolTip()
{
    return once(function() {
        return getCurrentLang() === 'en' ? 'Vegetarian' : 'Vegetarisk';
    });
}

function getVeganToolTip()
{
    return once(function() {
        return getCurrentLang() === 'en' ? 'Vegan' : 'Vegansk';
    });
}

function getWeightToolTip()
{
    return once(function() {
        return getCurrentLang() === 'en' ? 'approx. net weight' : 'omtrentlig nettovægt';
    });
}

function showSideOrders()
{
    $items = (new \App\Logic\Order())->getSessionCartData();

    if (! isset($items['items'])) {
        return false;
    }

    $items = $items['items'];

    return $items->filter(function($item) {
            return $item->section == 'bn-veg' || $item->section == 'bn-curries';
        })->count() > 0;
}

function makeGoogleReview($link, $numberOfReviews, $rating)
{
    return view('googleReview', [
        'link' => $link,
        'numberOfReviews' => $numberOfReviews,
        'rating' => $rating,
    ])->render();
}

function isLongFeedbackQuestion($question, $answer): bool
{
    if (str_starts_with($answer, 'rating_')) return false;
    if (strlen($question) > 50) return true;
    if (strlen($answer) > 20) return true;

    return false;
}
