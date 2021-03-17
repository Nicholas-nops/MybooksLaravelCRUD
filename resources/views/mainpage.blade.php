@extends('layout.app')

@section('title','Homepage')

@section('content')
<div class="container-fluid">
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand">Add a book</a>
          <form action="/create" method="post" enctype="multipart/form-data" class="d-flex">
            <input type="file" class="form-control" name="bookCover" id="bookCover">
            <input class="form-control me-2" type="field" id="bookTitle" name="bookTitle" placeholder="Book title" aria-label="Search">
            <input class="form-control me-2" type="field" id="bookDesc" name="bookDesc" placeholder="Short book description" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Send</button>
            {{csrf_field()}}

          </form>


        </div>
      </nav>
      @if($errors->any())
      <div class="alert alert-danger" role="alert">
          Error, fill all fields. {{$errors}}
        </div>

   @endif
    <div background-color="#ede6e6" class="container justify-content-center">

        @foreach ( $books as $book )
        <div class="card" style="width: 10rem;">

            <img src="uploads/highligths/{{$book->bookCover}}" class="card-img-top" >
            <div class="card-body">
              <h5 class="card-title">{{$book->title}}</h5>
              <p class="card-text">{{$book->bookDesc}}</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>

        @endforeach

    </div>
</div>


@endsection
