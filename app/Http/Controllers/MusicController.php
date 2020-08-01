<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB;

class MusicController extends Controller
{
    public function MusicStore() {
        $collection = (new MongoDB\Client)->MiniProyecto->Music;
        $musicCount = $collection->count();
        $page = request("pg") == 0 ? 1 : request("pg");
        $music = $collection->find([], ["limit" => 12, "skip" => ($page-1) * 12]);  
        return view('Music.Index', ['music' => $music, 'musicCount' => $musicCount]);
    }

    //USER

    public function AddComment() {
        $collection = (new MongoDB\Client)->MiniProyecto->Music;
        $comment = [
            "user_id" => request('userid'),
            "comment" => request('comment'),
            "date" => date("Y-m-d H:i:s")            ];
        $music= $collection->findOne([ "_id" => new MongoDB\BSON\ObjectId(request('musicid')) ]);
        $Comments = $music->Comments;
        if (count($Comments) == 0 || $Comments == null || empty($Comments)) {
            $Comments = [$comment];
        } else {
            $Comments = [$comment, ...$Comments];
        }
        $updateOneResult = $collection->updateOne([
            "_id" => new MongoDB\BSON\ObjectId(request('musicid'))
        ],[
            '$set' => [ 'Comments' => $Comments ]
        ]);

        return redirect("/music/".request('musicid'));
    }

    public function Details($id) {
        $collection = (new MongoDB\Client)->MiniProyecto->Music;
        $music = $collection->findOne(["_id" => new MongoDB\BSON\ObjectId($id)]);
        return view('music.Details', [ "music" => $music]);
    }

    //ADMIN

    public function Index() {
        $collection = (new MongoDB\Client)->MiniProyecto->Music;
        $music = $collection->find();  
        return view('Admin.music.Index', ['music' => $music]);
    }

    public function Create() {
        $collection = (new MongoDB\Client)->MiniProyecto->Music;
        $music = $collection->find();
        return view('Admin.music.Create', [ "music" => $music ]);
    }

    public function Store() {
        $music = [
            "genre"=> request("genre"),   
            "artist_name"=> request("artist_name"),
            "track_name"=> request("track_name"),
            "Rating" => [],
            "Comments" => []
        ];
        $collection = (new MongoDB\Client)->MiniProyecto->Music;
        $insertOneResult = $collection->insertOne($music);
        return redirect("/admin/music");
    }

    public function Edit($id) {
        $collection = (new MongoDB\Client)->MiniProyecto->Music;
        $music = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('Admin.Music.Edit', [ "music" => $music ]);
    }    
    
    public function Update(){
        $collection = (new MongoDB\Client)->MiniProyecto->Music;
        $music = [
            "genre"=> request("genre"),   
            "artist_name"=> request("artist_name"),
            "track_name"=> request("track_name"),
            "Rating" => [],
            "Comments" => []
        ];
        $updateOneResult = $collection->updateOne([
            "_id" => new \MongoDB\BSON\ObjectId(request("musicid"))
        ], [
            '$set' => $music
        ]);
        return redirect('/admin/music/');
    }

    public function Delete($id) {
        $collection = (new MongoDB\Client)->MiniProyecto->Music;
        $music = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('Admin..Delete', [ "music" => $music ]);
    }
    
    public function Remove(){
        $collection = (new MongoDB\Client)->MiniProyecto->Music;
        $deleteOneResult = $collection->deleteOne([
            "_id" => new \MongoDB\BSON\ObjectId(request("musicid"))
        ]);
        return redirect('/admin/music/');
    }

    public function Show($id) {
        $collection = (new MongoDB\Client)->MiniProyecto->Music;
        $music = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('Admin.music.Details', [ "music" => $music ]);
    }

}