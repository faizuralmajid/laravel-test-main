<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Requests\PostBookRequest;
use App\Http\Resources\BookResource;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        // // @TODO implement
        $books = new Book;

        $title = $request->query('title');
        $sortColumn = $request->query('sortColumn');
        $sortDirection = $request->query('sortDirection');
        $authors = explode(";",$request->query('authors'));

        if($title != NULL){
            $books = Book::where('title', 'LIKE', '%'.$title.'%');
        }
        if($sortColumn != NULL && $sortDirection == NULL){
            $books = $books->orderBy($sortColumn);
        }
        if($sortDirection != NULL){
            $books = $books->orderByDesc($sortColumn);
        }

        $books = $books->paginate();

        return BookResource::collection($books);
    }

    public function store(PostBookRequest $request)
    {
        // @TODO implement

        $book = Book::create([
            'isbn' => $request->isbn,
            'title' => $request->title,
            'description' => $request->description,
            'published_year' => $request->published_year,
            'book_authors.' => $request->authors
        ]);


        return new BookResource($book);
    }
}
