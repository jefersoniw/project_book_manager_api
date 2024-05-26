<?php

namespace Tests\Feature\API;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Book;
use Illuminate\Testing\Fluent\AssertableJson;

class BookControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_get_books_endpoint(): void
    {
        $books = Book::factory(4)->create();

        $response = $this->getJson('/api/books');

        $response->assertStatus(200);
        $response->assertJsonCount(4);

        $response->assertJson(function (AssertableJson $json) use ($books) {
            $json->whereAllType([
                '0.id' => 'integer',
                '0.title' => 'string',
                '0.isbn' => 'string',
            ]);

            $json->hasAll([
                '0.id',
                '0.title',
                '0.isbn'
            ]);

            $book = $books->first();
            $json->whereAll([
                '0.id' => $book->id,
                '0.title' => $book->title,
                '0.isbn' => $book->isbn
            ]);
        });
    }

    public function test_get_details_book_endpoint(): void
    {
        $book = Book::factory(1)->createOne();

        $response = $this->getJson('/api/books/' . $book->id);

        $response->assertStatus(200);

        $response->assertJson(function (AssertableJson $json) use ($book) {
            $json->hasAll([
                'id',
                'title',
                'isbn',
                'created_at',
                'updated_at'
            ]);

            $json->whereAllType([
                'id' => 'integer',
                'title' => 'string',
                'isbn' => 'string',
            ]);

            $json->whereAll([
                'id' => $book->id,
                'title' => $book->title,
                'isbn' => $book->isbn
            ]);
        });
    }

    public function test_post_books_endpoint(): void
    {
        $book = Book::factory(1)->makeOne()->toArray();

        $response = $this->postJson('/api/books', $book);

        $response->assertStatus(201);

        $response->assertJson(function (AssertableJson $json) use ($book) {
            $json->hasAll([
                'id',
                'title',
                'isbn',
                'created_at',
                'updated_at'
            ]);

            $json->whereAll([
                'title' => $book['title'],
                'isbn' => $book['isbn']
            ])->etc();
        });
    }

    public function test_put_book_endpoint()
    {
        $bookCreated = Book::factory(1)->createOne();

        $book = [
            'title' => 'test book 1',
            'isbn' => '123456789'
        ];

        $response = $this->putJson('/api/books/' . $bookCreated->id, $book);

        $response->assertStatus(200);

        $response->assertJson(function (AssertableJson $json) use ($book) {
            $json->hasAll(['id', 'title', 'isbn', 'created_at', 'updated_at']);

            $json->whereAll([
                'title' => $book['title'],
                'isbn' => $book['isbn']
            ])->etc();
        });
    }

    public function test_patch_book_endpoint()
    {
        $bookCreated = Book::factory(1)->createOne();

        $book = [
            'title' => 'test book 1 patch'
        ];

        $response = $this->patchJson('/api/books/' . $bookCreated->id, $book);

        $response->assertStatus(200);

        $response->assertJson(function (AssertableJson $json) use ($book) {
            $json->hasAll(['id', 'title', 'isbn', 'created_at', 'updated_at']);
            $json->where('title', $book['title']);
        });
    }

    public function test_delete_book_endpoint()
    {
        $book = Book::factory(1)->createOne();

        $response = $this->deleteJson('/api/books/' . $book->id);

        $response->assertStatus(204);
    }
}
