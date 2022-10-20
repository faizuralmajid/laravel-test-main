<?php

namespace App\Http\Controllers;

use App\BookReview;
use App\Http\Requests\PostBookReviewRequest;
use App\Http\Resources\BookReviewResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BooksReviewController extends Controller
{
    public function __construct()
    {
    }

    public function store(int $bookId, PostBookReviewRequest $request)
    {
        // @TODO implement
        $bookReview = BookReview::create([
            'book_id' => $bookId,
            'user_id' => $request->user_id,
            'comment' => $request->comment,
            'review' => $request->review,

        ]);

         return new BookReviewResource($bookReview);
    }

    public function destroy(int $bookId, int $reviewId, Request $request)
    {

        // @TODO implement

        BookReview::where('book_id', $bookId)->where('review', $reviewId)->delete();

        return response()->json([$bookId, $reviewId], Response::HTTP_NO_CONTENT);
    }
}
