<!DOCTYPE html>
<html>
<head>
    <title>MP3 Download</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .song {
            display: inline-block;
            text-align: center;
            margin-right: 10px; 
        }
        .action {
            width: 100%;
        }
    </style>
</head>
<body>
<div class="container mt-4">
<h2>MP3 Songs</h2>
@if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
@for ($x = 0; $x < count($songlist); $x++)
    <span style="display:none">The current value is {{ $songlist[$x]['id'] }}</span>
    <div class="song">
        <form method="post" action="{{url('store-song')}}">
        @csrf
          <input type="hidden" name="song_id" value="{{$songlist[$x]['id']}}">
          <img src="{{ URL::to('/') }}/images/song-placeholder.png" >
          <p>{{$songlist[$x]['file_name']}}</p>
          @if( $mp3->contains( $songlist[$x]['id'] ) )
            <a  class="btn btn-success action" href="{{ url('download-song', $songlist[$x]['id'] ) }}">Download </a>
          @else
            <input type="submit" class="btn btn-primary action" value="Purchase" >
          @endif
        </form>
    </div>
@endfor
</div>    
</body>