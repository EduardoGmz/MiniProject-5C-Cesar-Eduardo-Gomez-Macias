@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Edit</h1>
                <form action="/admin/videogames/edit" method= "POST">
                @csrf
                <input type="hidden" name="VideoGamesid" id="VideoGamesid" value="{{ $videogame->_id }}">
                <div class="form-group">
                        <label for="game">Game</label>
                        <input class="form-control" type="text" name="game" id="game" value="{{ $videogame->game }}">
                    </div>
                    <div class="form-group">
                        <label for="platform">Platform</label>
                        <input class="form-control" type="text" name="platform" id="platform" value="{{ $videogame->platform }}">
                    </div>
                    <div class="form-group">
                        <label for="developer">Developer</label>
                        <input class="form-control" type="text" name="developer" id="developer" value="{{ $videogame->developer }}">
                    </div>
                    <div class="form-group">
                        <label for="genre">Genre</label>
                        <input class="form-control" type="text" name="genre" id="genre" value="{{ $videogame->genre }}">
                    </div>
                    <div class="form-group">
                        <label for="rating">Rating</label>
                        <input class="form-control" type="text" name="rating" id="rating" value="{{ $videogame->rating }}">
                    </div>
                    <div class="form-group">
                        <label for="metascore">Metascore</label>
                        <input class="form-control" type="text" name="metascore" id="metascore" value="{{ $videogame->metascore }}">
                    </div>
                <a href="/admin/videogames/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                <button type="submit" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection