<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Mail\WelcomeEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BookController extends Controller
{
    public function index() {
        // $books = Book::all();

        // return books 10 per 10
        // $books = Book::paginate(10);
        // akan dapat semua attribute of books
        // $books = Book::paginate(10);
        // $books = Book::select([ 'id', 'title', 'price', 'author_id' ])->paginate(10);

        // kurangkan query utk site performance
        $books = Book::select([ 'id', 'title', 'price' ])->with('authors')->paginate(10);

        $email_data = [
            'code' => 'ABCXYZ1234',
            'name' => 'Nasuha Asri'
        ];

        Mail::to('info@kelasprogramming.com')->send( new WelcomeEmail( $email_data ));
        
        return view('books.listing', [
            'books' => $books
        ]);
    }

    public function authors() {
        // $authors = Author::all();
        $authors = Author::with('books')->get();

        return view('books.authors', [
            'authors' => $authors
        ]);
    }

    // find single author based on id
    public function author($id) {
        $author = Author::with('books')->find($id);

        return view('books.authors-single', [
            'author' => $author
        ]);
    }

    public function show($id) {

        // find() hanya pakai kat hujung je
        $book = Book::with('authors')->find($id);

        // dd($book);
        // echo "<strong>Title: </strong>" . $book->title . "<br>";
        // echo "<strong>Price(RM): </strong>" . nl2br($book->price) . "<br>";
        // echo "<strong>Synopsis: </strong>" . nl2br($book->synopsis) . "<br>";

        return view('books.single', [ 'book' => $book ]);
    }

    public function edit($id) {
        $book = Book::findOrFail($id);

        return view('books.edit', [
            'book' => $book
        ]);
    }

    public function update(Request $request, $id) {
        $book = Book::findOrFail($id);

        $validated_data = $request->validate([
            'title' => 'required|min:5|max:255',
            'price' => 'required|numeric',
            'synopsis' => 'required|min:20|max:1000'
        ]);

        $book->title = $request->title;
        $book->price = $request->price;
        $book->synopsis = $request->synopsis;

        $book->save();

        return back()->with('success', 'Book has been updated');
    }

    public function create() {
        return view('books.create');
    }

    public function store(Request $request) {

        $validated_data = $request->validate([
            'title' => 'required|min:5|max:255',
            'price' => 'required|numeric',
            'synopsis' => 'required|min:20|max:1000'
        ]);

        // $book = Book::create([
        //     'title' => $request->title,
        //     'price' => $request->price,
        //     'synopsis' => $request->synopsis
        // ]);

        $book = Book::create($validated_data);

        return redirect()->route('book-listing')->with('success', 'Your book has been added.');
    }

    public function destroy($id) {
        $book = Book::findOrFail($id);

        $book->delete();

        return redirect()->route('book-listing')->with('success', 'Your book has been deleted.');
    }
}
