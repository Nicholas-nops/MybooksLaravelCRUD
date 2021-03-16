@extends('layout.app')

@section('title','Homepage')

@section('content')

    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand">Adicionar um livro</a>
          <form action="/create" method="post" class="d-flex">
            <input type="file" class="form-control" id="bookCover">
            <input class="form-control me-2" type="field" id="bookTitle" placeholder="Book title" aria-label="Search">
            <input class="form-control me-2" type="field" id="bookDesc" placeholder="Short book description" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Send</button>
            {{csrf_field()}}
          </form>
        </div>
      </nav>
      @if ($errors->any())

      <input class="form-control" id="disabledInput" type="text" placeholder="Some of the fields are empty." disabled>


      @endif
      <div class="container center">
</div>


@endsection
