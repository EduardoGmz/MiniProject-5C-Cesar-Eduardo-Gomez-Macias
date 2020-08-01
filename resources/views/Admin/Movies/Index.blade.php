@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Movies</h1>
                <a class="text-right" href="/admin/movies/create">Create New</a>
                <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Type</th>
                        <th scope="col">Title</th>
                        <th scope="col">Director</th>
                        <th scope="col">Cast</th>
                        <th scope="col">Country</th>
                        <th scope="col">Date Added</th>
                        <th scope="col">Release Year</th>
                        <th scope="col">Rating</th>
                        <th scope="col">Duration</th>
                        <th scope="col">Listed In</th>
                        <th scope="col">Description</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($movies as $movie)
                    <tr>
                        <th scope="row">{{ $loop->index + 1}}</th>
                        <td>{{ $movie->type }}</td>
                        <td>{{ $movie->title }}</td>
                        <td>{{ $movie->director }}</td>
                        <td>{{ $movie->cast }}</td>
                        <td>{{ $movie->country}}</td>
                        <td>{{ $movie->date_added }}</td>
                        <td>{{ $movie->release_year}}</td>
                        <td>{{ $movie->rating }}</td>
                        <td>{{ $movie->duration }}</td>
                        <td>{{ $movie->listed_in }}</td>
                        <td>{{ $movie->description }}</td>
                        <td>
                            <a href="/admin/movies/{{ $movie->_id }}">Details</a> |
                            <a href="/admin/movies/edit/{{ $movie->_id }}">Edit</a> |
                            <a href="/admin/movies/delete/{{ $movie->_id }}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection