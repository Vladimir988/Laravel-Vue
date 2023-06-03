<?php

namespace App\Http\Controllers;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __invoke()
    {
        return view('index');
    }
}
