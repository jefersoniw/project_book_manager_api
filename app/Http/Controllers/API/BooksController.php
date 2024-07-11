<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\BooksStoreRequest;
use App\Http\Services\BooksService;
use App\Models\Book;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use stdClass;

class BooksController extends Controller
{

    public function __construct(protected BooksService $booksService)
    {
    }

    public function index(): JsonResponse
    {
        return response()->json($this->booksService->allBooks());
    }

    public function show(Book $book): JsonResponse
    {
        return response()->json($this->booksService->book($book));
    }

    public function store(BooksStoreRequest $request): JsonResponse
    {
        return response()->json($this->booksService->createBook($request->all()), 201);
    }

    public function update(Book $book, Request $request): JsonResponse
    {
        return response()->json($this->booksService->updateBook($book, $request->all()));
    }

    public function delete(Book $book): JsonResponse
    {
        $this->booksService->deleteBook($book);
        return response()->json([], 204);
    }
}
