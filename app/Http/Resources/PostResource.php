<?php

namespace App\Http\Resources;

use App\Http\Resources\CategoryResource;
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
            'date' => $this->created_at->format("F d, Y"),
            'date_raw' => $this->created_at->toIso8601String(),
            'image' => $this->image,
            //@todo implement category
            'category' => new CategoryResource($this->category),
            'author' => new UserResource($this->user),
        ];
    }
}
