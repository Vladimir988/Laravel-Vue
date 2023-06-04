<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Http\Resources\Person\PersonResource;
use App\Models\Person;

class ShowController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return PersonResource
     */
    public function __invoke(Person $person)
    {
        return new PersonResource($person);
    }
}
