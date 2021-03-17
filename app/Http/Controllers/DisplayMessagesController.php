<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class DisplayMessagesController extends Controller
{
   public function index()
   {
        $books = Book::all();
        return view('mainpage',[
            'books' => $books
        ]);
   }
}
