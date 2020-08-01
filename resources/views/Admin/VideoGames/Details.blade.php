@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Details</h1>
                <div class="card">
                    <div class="card-body">
                    <p class="card-text"> {{ $videogame -> game }}</p>
                        <p class="card-text"> {{ $videogame -> platform }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Developer: </b> {{ $videogame -> developer }}</li>
                        <li class="list-group-item"><b>Genre: </b> {{ $videogame -> genre }}</li>
                        <li class="list-group-item"><b>Rating: </b> {{ $videogame -> rating }}</li>
                        <li class="list-group-item"><b>Metascore: </b> {{ $videogame -> metascore }}</li>
                    </ul>
                    <div class="card-body">
                        <a href="/admin/videogames/" class="btn btn-secondary btn-sm active" role="button" aria-pressed="true">Back</a>
                        <a href="/admin/videogames/edit/{{ $videogame->_id }}" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Edit</a>
                        <a href="/admin/videogames/delete/{{ $videogame->_id }}" class="btn btn-danger btn-sm active" role="button" aria-pressed="true">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
