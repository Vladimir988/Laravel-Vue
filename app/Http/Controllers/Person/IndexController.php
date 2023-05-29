<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Models\Person;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return array
     */
    public function __invoke()
    {
        return Person::all();
    }
}
