<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Models\Person;

class DeleteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __invoke(Person $person)
    {
        $person->delete();
        return response([]);
    }
}
