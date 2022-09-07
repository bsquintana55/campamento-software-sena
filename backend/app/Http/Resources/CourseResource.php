<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
       
        return[
            "bootcamp_id" => $this->bootcamp_id,
            'titulo'=> $this->description,
            'description'=> $this->description,
            'weeks'=> $this->weeks,
            'enroll_cost'=> $this->enroll_cost,
            'minimum_skill'=> $this->minimum_skill,
            
      ];


    }
}
