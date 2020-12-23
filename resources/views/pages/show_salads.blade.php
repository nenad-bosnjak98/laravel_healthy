@extends('layouts.app')
@section('content')
    <a href="/larapp/public/salads/" class="dugme">Go Back</a>
    <div class="custom-well-id">
        <div><img style="box-sizing: border-box; width:100%; height: 300%" src="../storage/cover_images/{{$saladnum->cover_image}}"></div> 
        <div class="titleshow"><p>{{$saladnum->title}} <br></p></div>
        <div class="textbodyl">{!!$saladnum->text!!}</div>
        <small class="bottomwr">Written on: {{$saladnum->created_at}} by {{$saladnum->user->name}}</small>
    </div>
    @if (!Auth::guest())
        @if(Auth::user()->id == $saladnum->user_id)
            <div class="buttons">
            <a id="editbtn" style="text-align:center" href="{{$saladnum->id}}/edit" class="dugme1">Edit</a>

            {!!Form::open(['action' => ['App\Http\Controllers\SaladController@destroy', $saladnum->id], 'method' => 'POST', 'class' => 'delbtn1'])!!}
                {{Form::hidden('_method', "DELETE")}}
                {{Form::submit('Delete', ['class'=> 'delbtn'])}}
            {!!Form::close()!!}
            </div>
        @endif
    @endif
@endsection