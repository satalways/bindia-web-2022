<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Pages extends Controller
{
    public function dinein()
    {
        return view('pages.dinein', [
            'seo' => seo('dinein')
        ]);
    }

    public function amg()
    {
        return view('pages.amg', [
            'seo' => seo('AMG')
        ]);
    }

    public function bdv()
    {
        return view('pages.bdv',[
            'seo' => seo('BDV')
        ]);
    }

    public function elm()
    {
        return view('pages.elm',[
            'seo' => seo('ELM')
        ]);
    }

    public function gkv()
    {
        return view('pages.gkv',[
            'seo' => seo('GKV')
        ]);
    }

    public function lhg()
    {
        return view('pages.lhg',[
            'seo' => seo('LHG')
        ]);
    }

    public function shg()
    {
        return view('pages.shg',[
            'seo' => seo('SHG')
        ]);
    }

    public function story()
    {
        return view('pages.story', [
            'seo' => seo('Story')
        ]);
    }

    public function values()
    {
        return view('pages.values', [
            'seo' => seo('Our Values')
        ]);
    }

    public function team()
    {
        return view('pages.team', [
            'seo' => seo('Our Team')
        ]);
    }

    public function faq()
    {
        return view('pages.faq', [
            'seo' => seo('FAQ')
        ]);
    }

    public function glossary()
    {
        return view('pages.glossary',[
            'seo' => seo('Glossary')
        ]);
    }

    public function privacy_policy()
    {
        return view('pages.privacy_policy', [
            'seo' => seo('Privacy Policy')
        ]);
    }

    public function terms()
    {
        return view('pages.terms', [
            'seo' =>  seo('Terms Conditions')
        ]);
    }
}
