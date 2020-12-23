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
    @if(count($saladnum) > 0)
        <br>
        <br> 
        @foreach ($saladnum as $salads)
            <div class="custom-well">
            <div><img style="box-sizing: border-box; width:97%;min-height: 625.5%;" src="storage/cover_images/{{$salads->cover_image}}"></div> 
            <a class="title" href="/larapp/public/salads/{{$salads->id}}">{{$salads->title}} <br></a>
            <div class="textbody">{!!add3dots($salads->text, "...", 250)!!}</div>
            <small class="bottom">Written on: {{$salads->created_at}} by {{$salads->user->name}}</small>
            </div>
            <br>
        @endforeach
       <div class="paginator"> {{$saladnum->links()}} </div>
    @endif
@endsection