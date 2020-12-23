<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() {
        $title = "VICTUS";
        return view('pages.index')->with('title', $title);
    }
/*
    public function salads() {
        $title = "VICTUS";
        return view('pages.salads')->with('title', $title);
    }

    public function snacks() {
        $title = "VICTUS";
        return view('pages.snacks')->with('title', $title);
    }

    public function smoothies() {
        $title = "VICTUS";
        return view('pages.smoothies')->with('title', $title);
    }
*/
}
