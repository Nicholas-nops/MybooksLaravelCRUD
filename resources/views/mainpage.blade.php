@extends('layout.app')

@section('title', 'Homepage')

@section('content')
    <div class="container-fluid">
        <nav class="navbar navbar-light bg-light mb-3">
            <div class="container-fluid">
                <a class="navbar-brand">Add a book</a>
                <form action="/create" method="post" enctype="multipart/form-data" class="d-flex">

                    <input type="file" class="form-control me-2" name="bookCover" id="bookCover">


                    <input class="form-control me-2" type="field" id="bookTitle" name="bookTitle" placeholder="Book title"
                        aria-label="Search">


                    <input class="form-control me-2" type="field" id="bookDesc" name="bookDesc"
                        placeholder="Short book description" aria-label="Search">

                    <button class="btn btn-outline-success" type="submit">Send</button>

                    {{ csrf_field() }}

                </form>


            </div>
        </nav>
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                Error, fill all fields. {{ $errors }}
            </div>

        @endif
        <div class="container">
            <div class="row">
                <div class="col justify-content-between">
                    @foreach ($books as $book)
                        {{ csrf_field() }}
                        <div class="card me-3" style="width: 14rem;">
                            <img src="uploads/highligths/{{ $book->bookCover }}" class="card-img-top" height="100%">
                            <div class="card-body">
                                <h5 class="card-title">{{ $book->title }}</h5>
                                <p class="card-text">{{ $book->bookDesc }}</p>
                                <!-- Button trigger modal -->
                                <div class="row mb-1">
                                    <button type="button" data-id="{{ $book->id }}" class="btn btn-primary"
                                        data-toggle="modal" data-target="#exampleModal">
                                        Edit data
                                    </button>
                                </div>
                                <form action="/update" method="post">
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Change description
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="changes" class="form-control" id="changeDescBox"
                                                        name="changeDescBox" placeholder="Type the new description"
                                                        aria-describedby="changeDesc">
                                                    <input type="hidden" id="posting" name="bookId">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" id="saveChanges" class="btn btn-primary">Save
                                                        changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <form action="/delete" method="post">
                                    {{ csrf_field() }}
                                    <button id="deleteBook" heigth="100%" class="btn btn-danger center">Delete</button>
                                    <input type="hidden" id="bookId" value="{{ $book->id }}" name="bookId">
                                </form>
                            </div>
                        </div>


                    @endforeach
                </div>
            </div>
        </div>
        <script>
            $('#exampleModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var id = button.data('id') // Extract info from data-* attributes
                var modal = $(this)
                modal.find('.modal-body input[name="bookId"]').val(id);
            }),

        </script>
    @endsection
