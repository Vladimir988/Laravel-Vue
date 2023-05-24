<?php

namespace App\Http\Controllers;

class PersonsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return array
     */
    public function __invoke()
    {
        return [
            [
                'id'   => 1,
                'name' => 'Vasja',
                'age'  => 19,
                'job'  => 'coach',
            ],
            [
                'id'   => 2,
                'name' => 'Kolja',
                'age'  => 12,
                'job'  => 'rest',
            ],
            [
                'id'   => 3,
                'name' => 'Nastja',
                'age'  => 31,
                'job'  => 'doing something',
            ],
            [
                'id'   => 4,
                'name' => 'Irina',
                'age'  => 99,
                'job'  => 'rider',
            ],
            [
                'id'   => 5,
                'name' => 'Enokentii',
                'age'  => 88,
                'job'  => 'doing nothing',
            ],
        ];
    }
}
