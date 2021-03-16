<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Image;

use App\Models\Book;

class CreateBook extends Controller
{

    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'bookDesc' => 'required',
            'bookCover' => 'required|image|max:2048',
        ]);
        $bookCover = $request->bookCover;
        $image = Image::make($bookCover);

        Response::make($image->encode('jpeg'));

        $formData = array(
            'title' => $request->title,
            'bookDesc' => $request->bookCover,
            'bookCover' => $image,
        );
        Book::create($formData);

        return redirect('/');
    }

}
