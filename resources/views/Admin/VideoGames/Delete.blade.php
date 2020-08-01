@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Delete</h1>
                <form action="/admin/videogames/delete" method= "POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="videogameid" id="videogameid" value="{{ $videogame->_id }}">
                <div class="form-group">
                        <label for="game">Game</label>
                        <input class="form-control" type="text" name="game" id="game" value="{{ $videogame->game }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="platform">Platform</label>
                        <input class="form-control" type="text" name="platform" id="platform" value="{{ $videogame->platform }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="developer">Developer</label>
                        <input class="form-control" type="text" name="developer" id="developer" value="{{ $videogame->developer }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="genre">Genre</label>
                        <input class="form-control" type="text" name="genre" id="genre" value="{{ $videogame->genre }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="rating">Rating</label>
                        <input class="form-control" type="text" name="rating" id="rating" value="{{ $videogame->rating }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="metascore">Metascore</label>
                        <input class="form-control" type="text" name="metascore" id="metascore" value="{{ $videogame->metascore }}" disabled>
                    </div>
                    <a href="/admin/videogames/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                    <button type="submit" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection