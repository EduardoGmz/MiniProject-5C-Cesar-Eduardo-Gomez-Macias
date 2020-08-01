@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Details</h1>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><b>{{ $music->genre}}</b></h4>
                        <p class="card-text"><b>Artist Name: </b> {{ $music->artist_name }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Track Name: </b> {{ $music->track_name }}</li>
                    </ul>
                    <div class="card-body">
                        <a href="/admin/music/" class="btn btn-secondary btn-sm active" role="button" aria-pressed="true">Back</a>
                        <a href="/admin/music/edit/{{ $music->_id }}" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Edit</a>
                        <a href="/admin/music/delete/{{ $music->_id }}" class="btn btn-danger btn-sm active" role="button" aria-pressed="true">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
