<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use Illuminate\Support\Facades\DB;

class SongController extends Controller
{
    protected $songs;
    protected $user_id;

    public function __construct()
    {
        $this->user_id = 1;
        $this->songs = array( 
                        array(  "id" => 1,
                                "file_name" => "yourlove.mp3"
                        ),
                        array(  "id" => 2,
                                "file_name" => "fallin.mp3"
                        ), 
                        array(  "id" => 3,
                                "file_name" => "thousandyears.mp3"
                        )
                    );
    }
    public function index()
    {
        $songlist = $this->songs;
        $mp3 = DB::table('songs')->where('user_id', $this->user_id )->pluck('song_id');
        return view('view_song', compact('songlist', 'mp3'));
    }

    public function store(Request $request)
    {
        $val = new Song;
        $val->user_id = $this->user_id ;
        $val->song_id = $request->song_id;
        $val->save();
        
        return redirect('view-songs')->with('status', 'Song has been purchased');
    }

    public function downloadSong ( $song_id )
    {
        foreach(  $this->songs as $song ){
            if( $song["id"] == $song_id ) {
                $file_name = $song["file_name"];
            }
         }

        $downloaded_file = public_path("songs/{$file_name}");

        return response()->download( $downloaded_file);
    }	


}
