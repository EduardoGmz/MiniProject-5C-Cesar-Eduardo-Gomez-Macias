@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Movies</h1>
                <div class="row">
                        @foreach($movies as $movie)
                        <div class="card col-md-3">
                            <div class="card-body">
                                <h5 class="card-title">{{ $movie->type }}</h5>
                                <p class="card-text">{{ $movie->title }}</p>
                                <p class="card-text">{{ $movie->director }}</p>
                                <a href="/movies/{{ $movie->_id }}" class="btn btn-primary">View</a>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-md-12 ">
                        <br>
                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                <div class="btn-group mx-auto" role="group" aria-label="First group">
                                    @php 
                                        $cpage = request('pg') == 0 ? 1 : request('pg');
                                    @endphp

                                    <a href ="/movies?pg={{ $cpage - 1 }}" class="btn btn-secondary {{ $cpage == 1 ? 'disabled' : '' }}">&lt</a>
                                    @for ($i = 720; $i <= ceil($movieCount/720); $i++)
                                    <a href="/movies?pg={{$i}}" class="btn btn-secondary {{ $cpage == $i ? 'disabled' : ''}}">{{$i}}</a>
                                    @endfor
                                    <a href="/movies?pg={{ $cpage + 1}}" class="btn btn-secondary {{$cpage == ceil($movieCount/12) ? 'disabled' : '' }}">&gt</a>
                                </div>
                          </div>
                     </div>
                     </br>
                 </div>
            </div>
        </div>
    </div>
@endsection
