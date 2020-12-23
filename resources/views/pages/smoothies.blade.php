@extends('layouts.app')
<?php
function add3dots($string, $repl, $limit) 
{
  if(strlen($string) > $limit) 
  {
    return substr($string, 0, $limit) . $repl; 
  }
  else 
  {
    return $string;
  }
} 
?>
@section('content')
    @if(count($smoothienum) > 0)
        <br>
        <br> 
            @foreach ($smoothienum as $smoothie)
                <div class="custom-well">
                <div><img style="box-sizing: border-box; width:97%;min-height: 625.5%" src="storage/cover_images/{{$smoothie->cover_image}}"></div>
                <a class='title'href="/larapp/public/smoothies/{{$smoothie->id}}">{{$smoothie->title}} <br></a>
                <div class="textbody">{!!add3dots($smoothie->text, "...", 250)!!}</div>
                <small class="bottom">Written on: {{$smoothie->created_at}} by {{$smoothie->user->name}}</small>
                </div>
        <br>
            @endforeach
        <div class="paginator"> {{$smoothienum->links()}} </div>
    @endif
@endsection