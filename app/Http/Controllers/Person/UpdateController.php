<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Http\Requests\Person\UpdateRequest;
use App\Models\Person;

class UpdateController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return bool
     */
    public function __invoke(UpdateRequest $request, Person $person)
    {
        return $person->update($request->validated());
    }
}
