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
        @if(count($snacksnum) > 0)
            <br>
            <br> 
                @foreach ($snacksnum as $snack)
                    <div class="custom-well">
                    <div><img style="box-sizing: border-box; width:97%;min-height: 625.5%" src="storage/cover_images/{{$snack->cover_image}}"></div>
                    <a class="title" href="/larapp/public/snacks/{{$snack->id}}">{{$snack->title}} <br></a>
                    <div class="textbody">{!!add3dots($snack->text, "...", 250)!!}</div>
                    <small class="bottom">Written on: {{$snack->created_at}} by {{$snack->user->name}}</small>
                    </div>
                    <br>
                @endforeach
            <div class="paginator"> {{$snacksnum->links()}} </div>
        @endif
@endsection