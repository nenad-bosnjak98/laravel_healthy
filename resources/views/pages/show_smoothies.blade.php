@extends('layouts.app')
@section('content')
    <a href="/larapp/public/smoothies/" class="dugme">Go Back</a>
    <div class="custom-well-id">
        <div><img style="box-sizing: border-box; width:100%; height: 300%" src="../storage/cover_images/{{$smoothienum->cover_image}}"></div> 
        <div class="titleshow"><p>{{$smoothienum->title}} <br></p></div>
        <div class="textbodyl">{!!$smoothienum->text!!}</div>
        <small class="bottomwr">Written on: {{$smoothienum->created_at}} by {{$smoothienum->user->name}}</small>
    </div>
    @if (!Auth::guest())
        @if(Auth::user()->id == $smoothienum->user_id)
    <div class="buttons">
        <a id="editbtn" style="text-align:center" href="{{$smoothienum->id}}/edit" class="dugme1">Edit</a>
    
        {!!Form::open(['action' => ['App\Http\Controllers\SmoothieController@destroy', $smoothienum->id], 'method' => 'POST', 'class' => 'delbtn1'])!!}
                {{Form::hidden('_method', "DELETE")}}
                {{Form::submit('Delete', ['class'=> 'delbtn'])}}
        {!!Form::close()!!}
        </div>
        @endif
        @endif
@endsection