<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Http\Resources\Person\PersonResource;
use App\Models\Person;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __invoke()
    {
        return PersonResource::collection(Person::all());
    }
}
