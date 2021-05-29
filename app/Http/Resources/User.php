<?php

namespace App\Http\Resources;
use Illuminate\Support\Str;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'firstName' => $this->name,
            'lastName' => $this->email,
            "something"=> 414197000409,
            "jobTitle"=> Str::random(10),
            "started"=> 1367700388909,
            "dob"=> 183768652128,
            "status"=> rand(0,1) ? "Active" : "Suspended",
        ];
    }
}
