@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Edit</h1>
                <form action="/admin/movies/edit" method= "POST">
                @csrf
                <input type="hidden" name="movieid" id="movieid" value="{{ $movie->_id }}">
                <div class="form-group">
                        <label for="type">type</label>
                        <input class="form-control" type="text" name="type" id="type" value="{{ $movie->type }}" >
                    </div>
                    <div class="form-group">
                        <label for="title">title</label>
                        <input class="form-control" type="int" name="title" id="title" value="{{ $movie->title }}" >
                    </div>
                    <div class="form-group">
                        <label for="director">director</label>
                        <input class="form-control" type="int" name="director" id="director" value="{{ $movie->director }}">
                    </div>
                    <div class="form-group">
                        <label for="cast">cast</label>
                        <input class="form-control" type="int" name="cast" id="cast" value="{{ $movie->cast }}" >
                    </div>
                    <div class="form-group">
                        <label for="country">country</label>
                        <input class="form-control" type="int" name="country" id="country" value="{{ $movie->country }}">
                    </div>
                    <div class="form-group">
                        <label for="date_added">date_added</label>
                        <input class="form-control" type="int" name="date_added" id="date_added" value="{{ $movie->date_added }}" >
                    </div>
                    <div class="form-group">
                        <label for="release_year">release_year</label>
                        <input class="form-control" type="int" name="release_year" id="release_year" value="{{ $movie->release_year }}">
                    </div>
                    <div class="form-group">
                        <label for="rating">rating</label>
                        <input class="form-control" type="int" name="rating" id="rating" value="{{ $movie->rating }}">
                    </div>
                    <div class="form-group">
                        <label for="duration">duration</label>
                        <input class="form-control" type="int" name="duration" id="duration" value="{{ $movie->duration }}">
                    </div>
                    <div class="form-group">
                        <label for="listed_in">listed_in</label>
                        <input class="form-control" type="int" name="listed_in" id="listed_in" value="{{ $movie->listed_in }}" >
                    </div>
                    <div class="form-group">
                        <label for="description">description</label>
                        <input class="form-control" type="int" name="description" id="description" value="{{ $movie->description }}">
                    </div>
                <a href="/admin/movies/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                <button type="submit" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection