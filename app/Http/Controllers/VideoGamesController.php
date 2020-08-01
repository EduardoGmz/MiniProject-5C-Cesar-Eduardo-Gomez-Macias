<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB;

class VideoGamesController extends Controller
{
    public function TeamsStore() {
        $collection = (new MongoDB\Client)->MiniProyecto->VideoGames;
        $teamCount = $collection->count();
        $page = request("pg") == 0 ? 1 : request("pg");
        $videogames = $collection->find([], ["limit" => 12, "skip" => ($page-1) * 12]);  
        return view('VideoGames.Index', ['videogames' => $videogames, 'videogameCount' => $videogameCount]);
    }

    //User

    public function AddComment() {
        $collection = (new MongoDB\Client)->MiniProyecto->VideoGames;
        $comment = [
            "user_id" => request('userid'),
            "comment" => request('comment'),
            "date" => date("Y-m-d H:i:s")            ];
        $videogame= $collection->findOne([ "_id" => new MongoDB\BSON\ObjectId(request('videogame')) ]);
        $Comments = $videogame->Comments;
        if (count($Comments) == 0 || $Comments == null || empty($Comments)) {
            $Comments = [$comment];
        } else {
            $Comments = [$comment, ...$Comments];
        }
        $updateOneResult = $collection->updateOne([
            "_id" => new MongoDB\BSON\ObjectId(request('videogameid'))
        ],[
            '$set' => [ 'Comments' => $Comments ]
        ]);

        return redirect("/videogames/".request('videogameid'));
    }

    public function Details($id) {
        $collection = (new MongoDB\Client)->MiniProyecto->Teams;
        $videogame = $collection->findOne(["_id" => new MongoDB\BSON\ObjectId($id)]);
        return view('VideoGames.Details', [ "videogame" => $videogame]);
    }

    //ADMIN

    public function Index() {
        $collection = (new MongoDB\Client)->MiniProyecto->VideoGames;
        $videogame = $collection->find();  
        return view('Admin.VideoGames.Index', ['videogame' => $videogame]);
    }

    public function Create() {
        $collection = (new MongoDB\Client)->MiniProyecto->VideoGames;
        $videogame = $collection->find();
        return view('Admin.VideoGames.Create', [ "videogames" => $videogame ]);
    }

    public function Store() {
        $videogame = [
            "game"=> request("game"),   
            "platform"=> request("platform"),
            "developer"=> request("developer"),
            "genre"=> request("genre"), 
            "rating"=> request("rating"),
            "metascore"=> request("metascore"),
            "Rating" => [],
            "Comments" => []
        ];
        $collection = (new MongoDB\Client)->MiniProyecto->VideoGames;
        $insertOneResult = $collection->insertOne($videogame);
        return redirect("/admin/videogames");
    }

    public function Edit($id) {
        $collection = (new MongoDB\Client)->MiniProyecto->VideoGames;
        $videogame = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('Admin.VideoGames.Edit', [ "videogame" => $videogame ]);
    }    
    
    public function Update(){
        $collection = (new MongoDB\Client)->MiniProyecto->VideoGames;
        $videogame = [
            "game"=> request("game"),   
            "platform"=> request("platform"),
            "developer"=> request("developer"),
            "genre"=> request("genre"), 
            "rating"=> request("rating"),
            "metascore"=> request("metascore"),
            "Rating" => [],
            "Comments" => []
        ];
        $updateOneResult = $collection->updateOne([
            "_id" => new \MongoDB\BSON\ObjectId(request("videogameid"))
        ], [
            '$set' => $videogame
        ]);
        return redirect('/admin/videogames/');
    }

    public function Delete($id) {
        $collection = (new MongoDB\Client)->MiniProyecto->VideoGames;
        $videogame = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('Admin.VideoGames.Delete', [ "videogame" => $videogame ]);
    }
    
    public function Remove(){
        $collection = (new MongoDB\Client)->MiniProyecto->VideoGames;
        $deleteOneResult = $collection->deleteOne([
            "_id" => new \MongoDB\BSON\ObjectId(request("videogameid"))
        ]);
        return redirect('/admin/videogames/');
    }

    public function Show($id) {
        $collection = (new MongoDB\Client)->MiniProyecto->VideoGames;
        $videogame = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('Admin.VideoGames.Details', [ "videogame" => $videogame ]);
    }

}