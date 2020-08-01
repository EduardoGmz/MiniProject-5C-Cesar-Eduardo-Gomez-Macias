@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Music</h1>
                <a class="text-right" href="/admin/music/create">Create New</a>
                <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">genre</th>
                        <th scope="col">Artist Name</th>
                        <th scope="col">Track Name</th>
                        <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($music as $music)
                    <tr>
                        <th scope="row">{{ $loop->index + 1}}</th>
                        <td>{{ $music->genre }}</td>
                        <td>{{ $music->artist_name }}</td>
                        <td>{{ $music->track_name }}</td>
                        <td>
                            <a href="/admin/music/{{ $music->_id }}">Details</a> |
                            <a href="/admin/music/edit/{{ $music->_id }}">Edit</a> |
                            <a href="/admin/music/delete/{{ $music->_id }}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection