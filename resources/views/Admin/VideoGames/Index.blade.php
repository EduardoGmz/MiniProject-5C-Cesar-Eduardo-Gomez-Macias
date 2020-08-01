@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>VideoGames</h1>
                <a class="text-right" href="/admin/videogames/create">Create New</a>
                <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Game</th>
                        <th scope="col">Platform</th>
                        <th scope="col">Developer</th>
                        <th scope="col">Genre</th>
                        <th scope="col">Rating</th>
                        <th scope="col">Metascore</th>
                        <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($videogame as $videogame)
                    <tr>
                        <th scope="row">{{ $loop->index + 1}}</th>
                        <td>{{ $videogame->game }}</td>
                        <td>{{ $videogame->platform }}</td>
                        <td>{{ $videogame->developer }}</td>
                        <td>{{ $videogame->genre }}</td>
                        <td>{{ $videogame->rating }}</td>
                        <td>{{ $videogame->metascore }}</td>
                        <td>
                            <a href="/admin/videogames/{{ $videogame->_id }}">Details</a> |
                            <a href="/admin/videogames/edit/{{ $videogame->_id }}">Edit</a> |
                            <a href="/admin/videogames/delete/{{ $videogame->_id }}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection