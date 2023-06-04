<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Http\Requests\Person\UpdateRequest;
use App\Models\Person;

class UpdateController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __invoke(UpdateRequest $request, Person $person)
    {
        $person->update($request->validated());
        return response([]);
    }
}
