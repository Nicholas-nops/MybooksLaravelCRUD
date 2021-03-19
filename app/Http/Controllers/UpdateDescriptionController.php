<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class UpdateDescriptionController extends Controller
{
    public function update(Request $request) {
        $bookId = $request->bookId;
        $book = Book::find($bookId);
        $book->bookDesc = $request->changeDescBox;
        $x = $request;
        $book->save();

       return redirect('/');
    }
}