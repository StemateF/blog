<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'title' => $this->title,
            'excerpt' => $this->excerp,
            'body' => $this->body,
            'created_at' => $this->created_at,
            'image' => $this->image,
            //@todo implement category
            'category' => 'front-end',
        ];
    }
}
