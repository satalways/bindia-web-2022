<?php

namespace App\Translator;

use Illuminate\Support\Facades\Log;
use Illuminate\Translation\Translator as BaseTranslator;

/**
 * Class JsonTranslator
 * @package App\Translator
 */
class JsonTranslator extends BaseTranslator
{
    /**
     * @param string $key
     * @param array $replace
     * @param null $locale
     * @param bool $fallback
     *
     * @return array|null|string|void
     */
    public function get($key, array $replace = [], $locale = null, $fallback = true)
    {
        $translation = parent::get($key, $replace, $locale, $fallback);

        if ($translation === $key) {
            Log::warning('Language item could not be found.', [
                'language' => $locale ?? config('app.locale'),
                'id' => $key,
                'url' => config('app.url')
            ]);
        }

        return $translation;
    }
}
