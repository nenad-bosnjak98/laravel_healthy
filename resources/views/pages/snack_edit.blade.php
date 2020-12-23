@extends('layouts.app')
@section('content')
                <h1 class="cpost">Edit Snack Recipe</h1>
                {!! Form::open(['action' => ['App\Http\Controllers\SnackController@update', $snacksnum->id], 'method' => 'POST', 'enctype'=>'multipart/form-data']) !!}

                        <div class="form-group-1">
                                {{Form::label('title', 'Title', ['class' => 'ftitle'])}} <br>
                                {{Form::text('title', $snacksnum->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
                        </div>
                        <div class="form-group-2">
                                {{Form::label('body', 'Description', ['class' => 'ftitle'])}} <br>
                                {{Form::textarea('body', $snacksnum->text, ['id'=>'summary-ckeditor','class' => 'form-control', 'placeholder' => 'Title'])}}
                        </div>
                                <div class="form-group-3">
                                        {{Form::file('cover_image')}} <br>
                                </div> 
                        {{Form::hidden('_method', 'PUT')}}    
                        {{Form::submit('Submit', ['class' => 'fsubmit'])}} <br>
                        

                {!! Form::close() !!}
@endsection