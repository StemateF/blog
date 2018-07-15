<?php

namespace App\Http\Resources;

use App\Http\Resources\CommentCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            'id'=>$this->id,
            'body'=>$this->body,
            'date' => $this->created_at->format("F d, Y"),
            'date_raw' => $this->created_at->toIso8601String(),
            'replays' => new CommentCollection($this->replays),
            'author' => new UserResource($this->user),
        ];
    }
}
