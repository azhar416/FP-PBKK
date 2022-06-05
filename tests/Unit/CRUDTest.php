<?php

namespace Tests\Unit;

use App\Models\Book;
use App\Models\Textbook;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class CRUDTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $book = Book::create([
            'name' => 'test_book',
            'book_type' => 'textbook',
            'slug' => 'test-book',
            'image' => 'test.png',
            'author' => 'tester',
            'category' => 'Test',
            'publisher' => 'tester',
            'year_published' => '2002',
            'description' => 'test',
            'link' => 'Textbook/test1.pdf',
        ]);

        $textbook = Textbook::create([
            'book_id' => $book->id,
            'isbn' => '1234-test-book',
            'edition' => '1',
            
        ]);

        $this->assertDatabaseHas('books', [
            'name' => 'test_book',
            'book_type' => 'textbook',
            'slug' => 'test-book',
            'image' => 'test.png',
            'author' => 'tester',
            'category' => 'Test',
            'publisher' => 'tester',
            'year_published' => '2002',
            'description' => 'test',
            'link' => 'Textbook/test1.pdf',
        ]);

        Book::find($book->id)->update([
            'name' => 'test_book_2',
            'book_type' => 'textbook',
            'slug' => 'test-book-2',
            'image' => 'test.png',
            'author' => 'tester',
            'category' => 'Test',
            'publisher' => 'tester',
            'year_published' => '2002',
            'description' => 'test',
            'link' => 'Textbook/test2.pdf',
        ]);

        $this->assertDatabaseHas('books', [
            'name' => 'test_book_2',
            'book_type' => 'textbook',
            'slug' => 'test-book-2',
            'image' => 'test.png',
            'author' => 'tester',
            'category' => 'Test',
            'publisher' => 'tester',
            'year_published' => '2002',
            'description' => 'test',
            'link' => 'Textbook/test2.pdf',
        ]);

        Book::destroy($book->id);

        $this->assertDatabaseMissing('books', [
            'name' => 'test_book_2',
            'book_type' => 'textbook',
            'slug' => 'test-book-2',
            'image' => 'test.png',
            'author' => 'tester',
            'category' => 'Test',
            'publisher' => 'tester',
            'year_published' => '2002',
            'description' => 'test',
            'link' => 'Textbook/test2.pdf',
        ]);
    }
}
