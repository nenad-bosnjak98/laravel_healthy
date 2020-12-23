@extends('layouts.app')
@section('content')
    <a href="/larapp/public/snacks/" class="dugme">Go Back</a>
    <div class="custom-well-id">
        <div><img style="box-sizing: border-box; width:100%; height: 300%" src="../storage/cover_images/{{$snacksnum->cover_image}}"></div> 
        <div class="titleshow"><p>{{$snacksnum->title}} <br></p></div>
        <div class="textbodyl">{!!$snacksnum->text!!}</div>
        <small class="bottomwr">Written on: {{$snacksnum->created_at}} by {{$snacksnum->user->name}}</small>
    </div>
    @if (!Auth::guest())
        @if(Auth::user()->id == $snacksnum->user_id)
    <div class="buttons">
        <a id="editbtn" style="text-align:center" href="{{$snacksnum->id}}/edit" class="dugme1">Edit</a>
    
        {!!Form::open(['action' => ['App\Http\Controllers\SnackController@destroy', $snacksnum->id], 'method' => 'POST', 'class' => 'delbtn1'])!!}
                {{Form::hidden('_method', "DELETE")}}
                {{Form::submit('Delete', ['class'=> 'delbtn'])}}
        {!!Form::close()!!}
        </div>
        @endif
        @endif
@endsection