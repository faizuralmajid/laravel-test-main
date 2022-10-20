<?php

namespace App\Http\Resources;

use App\Author;
use App\Book;
use App\BookReview;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
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
            'isbn' => $this->isbn,
            'title' => $this->title,
            'description' => $this->description,
            'published_year' => $this->published_year,
            'authors' => Book::find($this->id)->authors,
           // 'review' => BookReview::find($this->id)->book()->avg('review'),

        ];
    }
}
