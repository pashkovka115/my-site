<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\SiteController;
use App\Models\Page\Page;

class PageController extends SiteController
{
    public function show($alias)
    {
        $page_item = Page::with('properties')
            ->where('is_show', true)
            ->where('slug', $alias)
            ->firstOrFail();

        return view('site.page.show', compact('page_item'));
    }
}
