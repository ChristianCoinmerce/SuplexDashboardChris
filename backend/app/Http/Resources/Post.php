<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Post extends JsonResource
{

    public function toArray($request)
    {
        return [
            'the_custom_id' => $this->id,
            'the_custom_title' => $this->title,
            'the_custom_body' => $this->body
        ];
    }

    public function with($request)
    {
        return [
            'version' => 'test1',
            'api_url' => url('test2')
        ];
    }
}
