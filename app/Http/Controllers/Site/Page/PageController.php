<?php

namespace App\Http\Controllers\Site\Page;

use App\Http\Controllers\SiteController;
use App\Models\Page\Page;

class PageController extends SiteController
{
    public function show($alias)
    {
        $item = Page::where('is_show', true)
            ->where('slug', $alias)
            ->firstOrFail();

        return view('site.page.show', compact('item'));
    }
}
