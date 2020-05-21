<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


use App\Post;


class Posts extends JsonResource
{

    public $preserveKeys = true;
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray( $request)
    {
        
        return parent::toArray($request);

         /*
         return [
            'id' => $this->resource->id,
            'title' => $this->resource->title,
            'content' => $this->resource->content,
            
         ];*/
        
    }
}
