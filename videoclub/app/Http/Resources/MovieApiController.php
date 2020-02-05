<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MovieApiController extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'title' => $this->title,
            'year' => $this->year,
            'director' => $this->director,
            'poster' => $this->poster,
            'rented' => $this->rented,
            'synopsis' => $this->synopsis
        ];
    }
}
