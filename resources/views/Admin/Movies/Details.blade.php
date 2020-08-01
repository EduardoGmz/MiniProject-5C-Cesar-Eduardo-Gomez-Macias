@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Details</h1>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><b>{{ $movie->type}}</b></h4>
                        <h4 class="card-title"><b>{{ $movie->title}}</b></h4>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>director: </b> {{ $movie->director }}</li>
                        <li class="list-group-item"><b>cast: </b> {{ $movie->cast }}</li>
                        <li class="list-group-item"><b>country: </b> {{ $movie->country }}</li>
                        <li class="list-group-item"><b>date_added: </b> {{ $movie->date_added }}</li>
                        <li class="list-group-item"><b>release_year: </b> {{ $movie->release_year }}</li>
                        <li class="list-group-item"><b>rating: </b> {{ $movie->rating }}</li>
                        <li class="list-group-item"><b>duration: </b> {{ $movie->duration }}</li>
                        <li class="list-group-item"><b>listed_in: </b> {{ $movie->listed_in }}</li>
                        <li class="list-group-item"><b>description: </b> {{ $movie->description }}</li>
                    </ul>
                    <div class="card-body">
                        <a href="/admin/movies/" class="btn btn-secondary btn-sm active" role="button" aria-pressed="true">Back</a>
                        <a href="/admin/movies/edit/{{ $movie->_id }}" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Edit</a>
                        <a href="/admin/movies/delete/{{ $movie->_id }}" class="btn btn-danger btn-sm active" role="button" aria-pressed="true">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
