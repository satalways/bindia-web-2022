<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExtraController extends Controller
{
    public function detailed()
    {
        return view('extra.detailed', [
            'title' => 'Detailed'
        ]);
    }

    public function detailedSection($section)
    {
        $sub_sections = config('order.sub_sections');
        $subSection = [];
        $currentSection = [];
        foreach (config('order.sections') as $section1) {
            if (\Str::slug($section1['name']) == $section) {
                $subSection = $sub_sections[$section1['name']];
                $currentSection = $section1;
            }
        }
        if(empty($currentSection)) abort(404);

        return view('extra.detailedSection', [
            'title' => 'Detailed Section',
            'sectionSlug' => $section,
            'subSection' => $subSection,
            'currentSection' => $currentSection
        ]);
    }

    public function detailedSubSection($section, $sub_section)
    {
        $orderSections = config('order.sections');
        $Section = [];
        foreach ($orderSections as $orderSection) {
            if (\Str::slug($orderSection['name']) == $section) {
                $Section = $orderSection;
            }
        }
        if (blank($Section)) abort(404);
        $subSection = config('order.sub_sections')[$Section['name']] ?? [];

        return view('extra.detailedSubSection', [
            'title' => 'Detailed Sub Section',
            'orderSections' => $orderSections,
            'Section' => $Section,
            'subSection' => $subSection,
            'subSectionSlug' => $sub_section,
            'sectionSlug' => $section
        ]);
    }
}
