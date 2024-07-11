<?php

namespace App\Http\Services;

use App\Models\Book;

class BooksService
{

  public function __construct(protected Book $book)
  {
  }

  public function allBooks()
  {
    return $this->book->all();
  }

  public function createBook(array $request)
  {
    return $this->book->create($request);
  }

  public function Book(Book $book)
  {
    return  $book;
  }

  public function updateBook(Book $book, array $request)
  {
    $book->update($request);
    return $book;
  }

  public function deleteBook(Book $book)
  {
    $book->delete();
    return true;
  }
}
