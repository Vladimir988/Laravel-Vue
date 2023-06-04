<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Http\Requests\Person\StoreRequest;
use App\Models\Person;

class StoreController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __invoke(StoreRequest $request)
    {
        Person::create($request->validated());
        return response([]);
    }
}
