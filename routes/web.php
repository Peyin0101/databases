<?php

use App\Models\Book;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/insert-data', function() {

    $book = new Book;
    $book->title = 'Why is Idris Gay?';
    $book->published_year = 2019;
    $book->save();

    $book = new Book;
    $book->title = 'The Catcher in the Rye';
    $book->published_year = 1951;
    $book->save();
});

Route::get('/books', function() {
    $books= Book::all();
    return $books;
    // return view('books', ['books' => $books]);
});

Route::get('/recent_books', function() {
    $books = Book::table('books')->where('publication_year', '>', 2000)
    ->orderBy('publication_year', 'desc')
    ->get();
    return $books;
    // return view('books', ['books' => $books]);
});

Route::get('/aantallen', function() {
    $books = Book::count();
    $authors = Author::count();
    $genres = Genre::count();
    return view('aantallen', ['books' => $books, 'authors' => $authors, 'genres' => $genres]);
    // return view('aantallen', compact('books', 'authors', 'genres'));
});