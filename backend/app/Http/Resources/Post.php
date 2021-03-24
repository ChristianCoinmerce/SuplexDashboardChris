<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Post extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'author' => $this->author
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
