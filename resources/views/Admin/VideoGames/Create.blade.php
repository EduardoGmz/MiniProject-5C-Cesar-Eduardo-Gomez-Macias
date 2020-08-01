@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Create</h1>
                <form action="/admin/videogames/create" method="POST">
                @csrf
                <div class="form-group">
                        <label for="game">Game</label>
                        <input class="form-control" type="text" name="game" id="game" >
                    </div>
                    <div class="form-group">
                        <label for="platform">Platform</label>
                        <input class="form-control" type="text" name="platform" id="platform" >
                    </div>
                    <div class="form-group">
                        <label for="developer">Developer</label>
                        <input class="form-control" type="text" name="developer" id="developer" >
                    </div>
                    <div class="form-group">
                        <label for="genre">Genre</label>
                        <input class="form-control" type="text" name="genre" id="genre" >
                    </div>
                    <div class="form-group">
                        <label for="rating">Rating</label>
                        <input class="form-control" type="text" name="rating" id="rating" >
                    </div>
                   <div class="form-group">
                        <label for="metascore">Metascore</label>
                        <input class="form-control" type="text" name="metascore" id="metascore" >
                    </div>
                    <a href="/admin/videogames/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                    <button type="submit" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Create</>
                    </form>
            </div>
        </div>
    </div>
@endsection