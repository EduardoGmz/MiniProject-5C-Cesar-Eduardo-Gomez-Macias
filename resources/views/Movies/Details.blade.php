@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card col-md-12">
                    <div class="card-body">
                    <h1 class="card-title">{{ $movie->type }}</h1>
                    <h3 class="card-subtitle mb-2 text-muted">{{ $movie->title }}</h3>
                    <p class="card-text">{{ $movie->director }}</p>
                </div>
                <div class="card-footer">
                    <p>Rating:</p>
                    <input type="radio" name="rating" id="rating">&nbsp1 </input>
                    <input type="radio" name="rating" id="rating">&nbsp2 </input>
                    <input type="radio" name="rating" id="rating">&nbsp3 </input>
                    <input type="radio" name="rating" id="rating">&nbsp4 </input>
                    <input type="radio" name="rating" id="rating">&nbsp5 </input>
                    <input type="radio" name="rating" id="rating">&nbsp6 </input>
                    <input type="radio" name="rating" id="rating">&nbsp7 </input>
                    <input type="radio" name="rating" id="rating">&nbsp8 </input>
                    <input type="radio" name="rating" id="rating">&nbsp9 </input>
                    <input type="radio" name="rating" id="rating">&nbsp10 </input>
                </div> 
            </div>
            <a href="/movies/" class="card-link"> <br>&nbsp&nbsp&nbsp&nbsp&nbspGo back </br> </a>
        </div>
    </div>
@endsection