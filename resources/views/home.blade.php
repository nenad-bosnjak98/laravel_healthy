@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div id='logged' class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <!-- {{ __('You are logged in!') }} -->
                   <h3 class="blog">Your Blog Posts</h3>
                   <table class="table table-striped">
                    @if (count($saladnum) > 0)
                        <tr>
                            <th>Salad Recipes</th>
                            <th></th>
                            <th></th>
                            <th></th>

                        </tr>

                        @foreach ($saladnum as $salad)
                        <tr>
                            <td class="t">{{$salad->title}}</td>
                            <td><a class='button3 blue' href="/larapp/public/salads/{{$salad->id}}">View</a></td>
                            <td><a class='button3 yellow' href="/larapp/public/salads/{{$salad->id}}/edit">Edit</a></td>
                            <td>
                                {!!Form::open(['action' => ['App\Http\Controllers\SaladController@destroy', $salad->id], 'method' => 'POST', 'class' => 'delbtn1'])!!}
                                {{Form::hidden('_method', "DELETE")}}
                                {{Form::submit('Delete', ['class'=> 'button3 red'])}}
                        {!!Form::close()!!}
                    </td>

                        </tr>
                        @endforeach
                        @endif
                        @if (count($snacksnum) > 0)
                        <tr>
                            <th>Snack Recipes</th>
                            <th></th>
                            <th></th>
                            <th></th>

                        </tr>
                        @foreach ($snacksnum as $snack)
                        <tr>
                            <td class="t">{{$snack->title}}</td>
                            <td><a class='button3 blue' href="/larapp/public/snacks/{{$snack->id}}">View</a></td>
                            <td><a class='button3 yellow' href="/larapp/public/snacks/{{$snack->id}}/edit">Edit</a></td>
                            <td>
                                {!!Form::open(['action' => ['App\Http\Controllers\SaladController@destroy', $snack->id], 'method' => 'POST', 'class' => 'delbtn1'])!!}
                                {{Form::hidden('_method', "DELETE")}}
                                {{Form::submit('Delete', ['class'=> 'button3 red'])}}
                        {!!Form::close()!!}
                    </td>

                        </tr>
                        @endforeach
                        @endif
                        @if (count($smoothienum) > 0)
                        <tr>
                            <th>Smoothie Recipes</th>
                            <th></th>
                            <th></th>
                            <th></th>

                        </tr>
                        @foreach ($smoothienum as $smoothie)
                        <tr>
                            <td class="t">{{$smoothie->title}}</td>
                            <td><a class='button3 blue' href="/larapp/public/smoothies/{{$smoothie->id}}">View</a></td>
                            <td><a class='button3 yellow' href="/larapp/public/smoothies/{{$smoothie->id}}/edit">Edit</a></td>
                            <td>
                                {!!Form::open(['action' => ['App\Http\Controllers\SaladController@destroy', $smoothie->id], 'method' => 'POST', 'class' => 'delbtn1'])!!}
                                {{Form::hidden('_method', "DELETE")}}
                                {{Form::submit('Delete', ['class'=> 'button3 red'])}}
                        {!!Form::close()!!}
                    </td>

                        </tr>
                        @endforeach
                        @endif
                   </table>
                   @if(count($smoothienum) == 0 && count($snacksnum) == 0 && count($saladnum) == 0)   
                        <p>You have no posts!</p>
                   @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
