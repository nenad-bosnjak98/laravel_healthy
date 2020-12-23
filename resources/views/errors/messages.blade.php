@if(count($errors) > 0)
        @foreach ($errors->all() as $error)
            <div style="margin-left: 27%; margin-right:27%; text-align:center; margin-top:2%" class="alert alert-danger">
                {{$error}}

            </div>
        @endforeach
@endif

@if(session("success"))
        <div style="margin-left: 27%; margin-right:27%; text-align:center; margin-top:2%" class="alert alert-success">
            {{session('success')}}
        </div>
@endif

@if(session("error"))
        <div style="margin-left: 27%; margin-right:27%; text-align:center; margin-top:2%" class="alert alert-danger">
            {{session('error')}}
        </div>
@endif