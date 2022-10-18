<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'owner' => $this->owner,
            'candy_machine_id' => $this->candy_machine_id,
            'title' => $this->title,
            'image_url' => $this->image_url,
            'description' => $this->description,
        ];
    }
}
