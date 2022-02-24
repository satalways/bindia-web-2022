<?php

namespace App\Http\Controllers;

use App\Models\OrderItems;
use App\Models\TakeoutZonesModel;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        $areas = TakeoutZonesModel::query()->select(['area', 'area_slug'])->distinct('area')
            ->whereNotIn('area_slug', ['lyngby', 'soborg', 'frederiksberg'])
            ->get();
        $items = OrderItems::query()->where('active', true)->select(['slug'])->distinct('slug')->get();

        return response()->view('sitemap', ['areas' => $areas, 'items' => $items])->header('Content-Type', 'text/xml');
    }
}
