<?php

namespace App\Http\Controllers;

use App\Logic\Catering;
use App\Logic\CateringOrders;
use App\Models\OrderItems;
use App\Models\TakeoutZonesModel;
use Illuminate\Http\Request;

class CateringController extends Controller
{
    public function cateringBuffet()
    {
        $Catering = new Catering();

        $curries = OrderItems::query()
            ->whereIn('section', ['bn-curries'])
            ->where('active', true)
            ->orderBy('code')
            ->get();
        $vegs = OrderItems::query()
            ->whereIn('section', ['bn-veg'])
            ->where('active', true)
            ->orderBy('code')
            ->get();

        $sessionData = $Catering->getSession();
        return view('catering.catering', [
            //'items' => $items,
            'curries' => $curries,
            'vegs' => $vegs,
            'session' => $sessionData,
            'seo' => seo('Catering Buffet'),
            'social_image' => 'https://www.bindia.dk/asstes/image/catering-menu/nav-menu-four.png'
        ]);
    }

    public function cateringDrinks()
    {
        $Catering = new Catering();
        $session = $Catering->getSession();
        if (!isset($session['menu'])) return response()->redirectToRoute('catering');

        $items = OrderItems::query()
            ->where('active', true)
            ->orderBy('code')->whereIn('section', ['bn-drinks'])->get();

        $back_link = $session['type'] == 'buffet' ? route('catering') : route('catering.portion');

        return view('catering.drinks', [
            'items' => $items,
            'session' => $session,
            'back_link' => $back_link,
            'social_image' => 'https://www.bindia.dk/asstes/image/catering-menu/nav-menu-four.png',
        ]);
    }

    public function cateringBuffetPost(Request $request)
    {
        if (!$request->ajax()) abort(404);

        $Catering = new Catering();
        switch ($request->post('action')) {
            case 'orderStep1':
                $Catering->addInSession($request->except('action'));
                return 'OK';
                break;
            case 'addItemToCart':
                $Catering->addItemToCart($request->post('code'), $request->post('add'));
                $session = $Catering->getSession();

                $items = OrderItems::query()
                    ->where('active', true)
                    ->orderBy('code')->whereIn('section', ['bn-drinks'])->get();
                $back_link = $session['type'] == 'buffet' ? route('catering') : route('catering.portion');

                return view('catering.ajax.drinks', [
                    'items' => $items,
                    'session' => $session,
                    'back_link' => $back_link,
                ]);
            case 'addDrink':
                $response = $Catering->addItemToCart($request->post('code'), $request->post('add'), $request->post('item'));
                if ($response === 'OK') {
                    return $response . $this->cateringCheckout(true);
                } else {
                    return $response;
                }
            case 'updateThermo':
                $Catering->saveSession('thermo', $request->post('thermo'));
                return $this->cateringCheckout(true);
            case 'updatePersons':
                $session = $Catering->getSession();
                if ($request->post('add') == 1)
                    $session['persons']++;
                else
                    $session['persons']--;

                if ($session['persons'] < config('catering.min_people')) $session['persons'] = config('catering.min_people');

                $Catering->saveSession('persons', $session['persons']);

                return $this->cateringCheckout(true);
            case 'updateCheckoutForm':
                $Catering->addInSession($request->except('action'));
                return $this->cateringCheckout(true);
            case 'updatePortionItemCart':
                $session = $Catering->getSession();
                $session['type'] = 'portion';
                if ($request->post('add') == 1) {
                    $session['portion']['items'][$request->post('code')] = isset($session['portion']['items'][$request->post('code')]) ? $session['portion']['items'][$request->post('code')] + 2 : 2;
                } else if ($request->post('add') == -1) {
                    $session['portion']['items'][$request->post('code')] = isset($session['portion']['items'][$request->post('code')]) ? $session['portion']['items'][$request->post('code')] - 2 : 0;
                }
                if (isset($session['portion']['items'][$request->post('code')]) && $session['portion']['items'][$request->post('code')] < 2) {
                    unset($session['portion']['items'][$request->post('code')]);
                }
                $Catering->saveSession($session);

                return $this->insertCateringPortion(true);
            case 'portionStep2':
                $session = $Catering->getSession();
                $cnt = isset($session['portion']['items']) ? array_sum($session['portion']['items']) : 0;
                if ($cnt < config('catering.min_people')) {
                    return __('catering.select_dishes', ['dishes' => config('catering.min_people')]);
                }

                return 'OK';
            case 'updatePortionSideCart':
                $session = $Catering->getSession();
                $session['type'] = 'portion';
                if ($request->post('add') == 1) {
                    $session['portion']['sides'][$request->post('code')] = isset($session['portion']['sides'][$request->post('code')]) ? $session['portion']['sides'][$request->post('code')] + 1 : 1;
                } else if ($request->post('add') == -1) {
                    $session['portion']['sides'][$request->post('code')] = isset($session['portion']['sides'][$request->post('code')]) ? $session['portion']['sides'][$request->post('code')] - 1 : 0;
                }
                if (isset($session['portion']['sides'][$request->post('code')]) && $session['portion']['sides'][$request->post('code')] < 1) {
                    unset($session['portion']['sides'][$request->post('code')]);
                }
                $Catering->saveSession($session);

                return $this->insertCateringOptionals(true);
            case 'saveOrder':
                $CateringOrder = new CateringOrders();
                return $CateringOrder->makeOrder($request->except('action'));
            case 'getCityByPostalCode':
                $row = TakeoutZonesModel::query()
                    ->whereRaw('(? between post_number and post_number2)', [$request->post('postal_code')])
                    ->orderByDesc('id')
                    ->select(['area', 'shop'])
                    ->first();

                if (!$row) {
                    return 'Invalid postal code';
                }

                $session = $Catering->getSession();
                $session['customer']['postal_code'] = $request->post('postal_code');
                $Catering->saveSession($session);

                return 'OK' . $this->cateringCheckout(true);
            default:
                abort(404);
        }

        return response()->view('errors.404', [], 404);
    }

    public function cateringPortion()
    {
        return $this->insertCateringPortion();
    }

    public function insertCateringPortion(bool $ajax = false)
    {
        $Catering = new Catering();
        $session = $Catering->getSession();

        $curries = OrderItems::query()
            ->where('active', true)
            ->whereIn('section', ['bn-curries'])
            ->orderBy('code')
            ->get();
        $vegs = OrderItems::query()
            ->where('active', true)
            ->whereIn('section', ['bn-veg'])
            ->orderBy('code')
            ->get();

        $viewName = $ajax ? 'catering.ajax.portion' : 'catering.portion';

        return view($viewName, [
            'curries' => $curries,
            'vegs' => $vegs,
            'back_link' => route('catering'),
            'session' => $session
        ]);
    }

    public function cateringCheckout($ajaxPage = false)
    {
        $Catering = new Catering();
        $session = $Catering->getSession();

        if (!isset($session['type'])) return response()->redirectToRoute('catering');

        if ($session['type'] == 'buffet') {
            if (!isset($session['menu_items'][$session['menu']])) return response()->redirectToRoute('catering');
            $menuName = __('catering.menu' . $session['menu']);
        } else {
            $menuName = __('catering.portion_packed');
        }

        $curries = OrderItems::query()
            ->whereIn('section', ['bn-curries'])
            ->where('active', true)
            ->orderBy('code')
            ->get();
        $vegs = OrderItems::query()
            ->where('active', true)
            ->whereIn('section', ['bn-veg'])
            ->orderBy('code')
            ->get();
        $back_link = $session['type'] == 'buffet' ? route('catering.drinks') : route('catering.optionals');

        $viewName = $ajaxPage ? 'catering.ajax.checkout' : 'catering.checkout';
        $CateringOrder = new CateringOrders();
        return view($viewName, [
            'menuName' => $menuName,
            'session' => $session,
            'amount' => $Catering->calculateSessionPrice(),
            'curries' => $curries,
            'vegs' => $vegs,
            'thermo' => $Catering->calculateThermoBoxes(),
            'isThermo' => $Catering->IsThermo(),
            'delivery' => $Catering->Delivery(),
            'back_link' => $back_link,
            'sideItems' => $session['type'] === 'buffet' ? $CateringOrder->makeSideItemQty($session['persons'], $session['menu']) : []
        ]);
    }

    public function cateringOptionals()
    {
        return $this->insertCateringOptionals();
    }

    public function insertCateringOptionals(bool $ajax = false)
    {
        $Catering = new Catering();
        $session = $Catering->getSession();

        $items = OrderItems::query()
            ->where('active', true)
            ->whereIn('section', ['bn-drinks', 'bn-sides'])
            ->whereNotIn('code', [211, 212, 213, 214, 221, 222, 223, 224, 600])
            ->orderBy('code')
            ->get();

        $viewName = $ajax ? 'catering.ajax.optionals' : 'catering.optionals';
        return view($viewName, [
            'session' => $session,
            'back_link' => route('catering.portion'),
            'items' => $items,
        ]);
    }
}
