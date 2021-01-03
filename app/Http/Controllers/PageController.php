<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Page;
use Illuminate\Http\Request;
use App\About;

class PageController extends Controller
{
    protected $pageTemplate = 'pages.templates.';

    public function getPage($slug = null)
    {
        $page = Page::where('slug', $slug);
        $page = $page->firstOrFail();
        $about = About::all();
        $gallery = Gallery::get();
//dd($gallery);

        return view($this->pageTemplate . $page->template)
            ->with([
                'page' => $page,
                'about' => $about,
                'gallery' => $gallery,

            ]);
    }
}