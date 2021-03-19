<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Book;

class CreateBook extends Controller
{

    public function create(Request $request)
    {
        $request->validate([
            'bookCover' => 'required|image|',
            'bookTitle' => 'required',
            'bookDesc' => 'required',
        ]);

        $book = new Book;
        $book->title = $request->bookTitle;
        $book->bookDesc = $request->bookDesc;
        if($request->hasfile('bookCover')){
            $file = $request->file('bookCover');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/highligths',$filename);
            $book->bookCover = $filename;
        }else{
            $book->bookCover = '';
        }
       $book->save();


        return redirect('/');
    }


}