<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\BooksStoreRequest;
use App\Http\Services\BooksService;
use App\Models\Book;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use stdClass;

class BooksController extends Controller
{

    public function __construct(protected BooksService $booksService)
    {
    }

    /**
     * @OA\Get(
     *     path="/api/books",
     *     tags={"/books"},
     *     summary="Lista de livros cadastrados",
     *     description="Exibindo todos os livros cadastrados.",
     *     @OA\Response(
     *         response="200",
     *         description="OK"
     *     )
     * )
     */
    public function index(): JsonResponse
    {
        return response()->json($this->booksService->allBooks());
    }


    /**
     * @OA\Get(
     *     path="/api/books/{id}",
     *     tags={"/books"},
     *     summary="Detalhes de um livro cadastrado",
     *     description="Exibindo todos os livros cadastrados.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Id do livro",
     *         required=true,
     *     ),  
     *     @OA\Response(
     *         response="200",
     *         description="OK"
     *     )
     * )
     */
    public function show(Book $book): JsonResponse
    {
        return response()->json($this->booksService->book($book));
    }

    /**
     * @OA\Post(
     *     path="/api/books",
     *     tags={"/books"},
     *     summary="Cadastrando um livro",
     *     description="Cadastrando um livro.",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="title",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="isbn",
     *                     type="string"
     *                 ),
     *                 example={"title": "teste", "isbn": "854624f4"}
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response="201",
     *         description="Cadastrado"
     *     )
     * )
     */
    public function store(BooksStoreRequest $request): JsonResponse
    {
        return response()->json($this->booksService->createBook($request->all()), 201);
    }

    /**
     * @OA\Put(
     *     path="/api/books/{id}",
     *     tags={"/books"},
     *     summary="Editar um livro",
     *     description="Atualizando dados de um livro.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Id do livro",
     *         required=true,
     *     ),
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="title",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="isbn",
     *                     type="string"
     *                 ),
     *                 example={"title": "teste", "isbn": "854624f4"}
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response="201",
     *         description="Atualizado"
     *     )
     * )
     */
    public function update(Book $book, Request $request): JsonResponse
    {
        return response()->json($this->booksService->updateBook($book, $request->all()));
    }

    /**
     * @OA\Delete(
     *     path="/api/books/{id}",
     *     tags={"/books"},
     *     summary="Excluir um livro cadastrado",
     *     description="Excluindo um livro cadastrado.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Id do livro",
     *         required=true,
     *     ),  
     *     @OA\Response(
     *         response="200",
     *         description="OK"
     *     )
     * )
     */
    public function delete(Book $book): JsonResponse
    {
        $this->booksService->deleteBook($book);
        return response()->json([], 204);
    }
}
