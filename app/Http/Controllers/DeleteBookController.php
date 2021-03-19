<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class DeleteBookController extends Controller
{
    public function delete(Request $request) {
        $bookId = $request->bookId;
        $book = new Book();
        $book = Book::find($bookId);

        $book->delete();
        return redirect('/');
    }
}