@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Edit</h1>
                <form action="/admin/music/edit" method= "POST">
                @csrf
                <input type="hidden" name="musicid" id="musicid" value="{{ $music->_id }}">
                <div class="form-group">
                        <label for="genre">genre</label>
                        <input class="form-control" type="text" name="genre" id="genre" value="{{ $music->genre }}">
                    </div>
                    <div class="form-group">
                        <label for="artist_name">artist name</label>
                        <input class="form-control" type="text" name="artist_name" id="artist_name" value="{{ $music->artist_name }}">
                    </div>
                    <div class="form-group">
                        <label for="track_name">track name</label>
                        <input class="form-control" type="text" name="track_name" id="track_name" value="{{ $music->track_name }}">
                    </div>
                <a href="/admin/music/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                <button type="submit" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection