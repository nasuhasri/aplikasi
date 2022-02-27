<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Author::factory(30)->create();

        Book::each(function ( $book ) {
            // dapatkan id-id author utk letak dlm book
            // pluck('id') - nak dapatkan id sahaja
            $author_ids = Author::inRandomOrder()->limit( rand(1, 5) )->pluck('id');

            // dapatkan author
            // pakai sync utk masukkan id author dlm table author_book utk id tersebut
            $book->authors()->sync( $author_ids );
        });
        // At 109 - this was deleted
        // Book::each(function ($book){
        //     $book->author_id = rand(1, 30);
        //     $book->save();
        // });
    }
}
