<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use stdClass;

class BooksController extends Controller
{

    public function __construct(private Book $book)
    {
    }

    public function index()
    {
        return response()->json($this->book->all());
    }

    public function show($id)
    {
        return response()->json($this->book->find($id));
    }

    public function store(Request $request)
    {
        return response()->json($this->book->create($request->all()), 201);
    }
}
