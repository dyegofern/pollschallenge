<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PollResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'poll_id' => $this->id,
            'poll_description' => $this->description,
            'options' => OptionResource::collection($this->options)
        ];
    }
}
