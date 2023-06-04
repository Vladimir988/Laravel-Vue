<?php

namespace App\Http\Resources\Person;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

class PersonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id'   => $this->id,
            'name' => $this->name,
            'age'  => $this->age,
            'job'  => $this->job,
        ];
    }
}
