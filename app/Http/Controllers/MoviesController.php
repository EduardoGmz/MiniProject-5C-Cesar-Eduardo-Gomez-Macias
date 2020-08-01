<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB;

class MoviesController extends Controller
{
    public function MoviesStore() {
        $collection = (new MongoDB\Client)->MiniProyecto->Movies;
        $movieCount = $collection->count();
        $page = request("pg") == 0 ? 1 : request("pg");
        $movies = $collection->find([], ["limit" => 16, "skip" => ($page-1) * 16]);  
        return view('Movies.Index', ['movies' => $movies, 'movieCount' => $movieCount]);
    }

    //USER

    public function AddComment() {
        $collection = (new MongoDB\Client)->MiniProyecto->Movies;
        $comment = [
            "user_id" => request('userid'),
            "comment" => request('comment'),
            "date" => date("Y-m-d H:i:s")            ];
        $movie= $collection->findOne([ "_id" => new MongoDB\BSON\ObjectId(request('movieid')) ]);
        $Comments = $movie->Comments;
        if (count($Comments) == 0 || $Comments == null || empty($Comments)) {
            $Comments = [$comment];
        } else {
            $Comments = [$comment, ...$Comments];
        }
        $updateOneResult = $collection->updateOne([
            "_id" => new MongoDB\BSON\ObjectId(request('movieid'))
        ],[
            '$set' => [ 'Comments' => $Comments ]
        ]);

        return redirect("/movies/".request('movieid'));
    }

    public function Details($id) {
        $collection = (new MongoDB\Client)->MiniProyecto->Movies;
        $movie = $collection->findOne(["_id" => new MongoDB\BSON\ObjectId($id)]);
        return view('Movies.Details', [ "movie" => $movie]);
    }

    //ADMIN

    public function Index() {
        $collection = (new MongoDB\Client)->MiniProyecto->Movies;
        $movies = $collection->find();  
        return view('Admin.Movies.Index', ['movies' => $movies]);
    }

    public function Create() {
        $collection = (new MongoDB\Client)->MiniProyecto->Movies;
        $movie = $collection->find();
        return view('Admin.Movies.Create', [ "movies" => $movie ]);
    }

    public function Store() {
        $movie = [
            "type" => request("type"),
            "title" => request("title"),
            "director" => request("director"),
            "cast" => request("cast"),
            "country" => request("country"),
            "date_added" => request("date_added"),
            "release_year" => request("release_year"),
            "rating" => request("rating"),
            "duration" => request("duration"),
            "listed_in" => request("listed_in"),
            "description" => request("description"),
            "Rating" => [],
            "Comments" => []
        ];
        $collection = (new MongoDB\Client)->MiniProyecto->Movies;
        $insertOneResult = $collection->insertOne($movie);
        return redirect("/admin/movies");
    }

    public function Edit($id) {
        $collection = (new MongoDB\Client)->MiniProyecto->Movies;
        $movie = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('Admin.Movies.Edit', [ "movie" => $movie ]);
    }    
    
    public function Update(){
        $collection = (new MongoDB\Client)->MiniProyecto->Movies;
        $movie = [
            "type" => request("type"),
            "title" => request("title"),
            "director" => request("director"),
            "cast" => request("cast"),
            "country" => request("country"),
            "date_added" => request("date_added"),
            "release_year" => request("release_year"),
            "rating" => request("rating"),
            "duration" => request("duration"),
            "listed_in" => request("listed_in"),
            "description" => request("description"),
            "Rating" => [],
            "Comments" => []
        ];
        $updateOneResult = $collection->updateOne([
            "_id" => new \MongoDB\BSON\ObjectId(request("movieid"))
        ], [
            '$set' => $movie
        ]);
        return redirect('/admin/movies/');
    }

    public function Delete($id) {
        $collection = (new MongoDB\Client)->MiniProyecto->Movies;
        $movie = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('Admin.Movies.Delete', [ "movie" => $movie ]);
    }
    
    public function Remove(){
        $collection = (new MongoDB\Client)->MiniProyecto->Movies;
        $deleteOneResult = $collection->deleteOne([
            "_id" => new \MongoDB\BSON\ObjectId(request("movieid"))
        ]);
        return redirect('/admin/movies/');
    }

    public function Show($id) {
        $collection = (new MongoDB\Client)->MiniProyecto->Movies;
        $movie = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('Admin.Movies.Details', [ "movie" => $movie ]);
    }

}