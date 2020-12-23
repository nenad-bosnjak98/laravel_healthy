@extends('layouts.app')
@section('content')
<p style="margin-left: 38.8%;color:#dbb4d3;margin-top:1%;font-size:45px;text-decoration:underline;font-family: 'Noto Serif JP', serif;">Welcome to Victus! </p>
    <div style="font-family: 'Noto Serif JP', serif;" class="text1">
        <p> This website was built with the goal of spreading love and positivity. We all know how important it is to stay
            focused and well-rested and eating healthier foods plays a huge role to that end. <br><br> During your visit to our website, we will introduce you to our
            user submitted recipes that will shape your wellness and improve your overall constitution. We present special recipes for different kinds of 
            salads, snacks and delicious smoothies that you can make in under 10 minutes.    </p>
    </div>

    <div class="pic1">
        <img src="storage/cover_images/foods.jpg">
    </div>
    <p style="margin-left: 27.8%;color:#dbb4d3;margin-top:1%;font-size:45px;text-decoration:underline;font-family: 'Noto Serif JP', serif;">Top 10 Benefits of Eating Healthy Food </p>
    <div style="font-family: 'Noto Serif JP', serif;" class="text2">
        <ol>
            <li style="background: none;color:#dbb4d3;margin-left: 28.1%;font-size:27px"> Heart health</li><br>
            <li style="background: none;color:#dbb4d3;margin-left: 28.1%;font-size:27px"> Reduced cancer risk</li><br>
            <li style="background: none;color:#dbb4d3;margin-left: 28.1%;font-size:27px"> Better mood</li><br>
            <li style="background: none;color:#dbb4d3;margin-left: 28.1%;font-size:27px"> Improved gut health</li><br>
            <li style="background: none;color:#dbb4d3;margin-left: 28.1%;font-size:27px"> Improved memory</li><br>
            <li style="background: none;color:#dbb4d3;margin-left: 28.1%;font-size:27px"> Weight loss</li><br>
            <li style="background: none;color:#dbb4d3;margin-left: 28.1%;font-size:27px"> Diabetes management</li><br>
            <li style="background: none;color:#dbb4d3;margin-left: 28.1%;font-size:27px"> Strong bones and teeth</li><br>
            <li style="background: none;color:#dbb4d3;margin-left: 28.1%;font-size:27px"> Getting a good night’s sleep</li><br>
            <li style="background: none;color:#dbb4d3;margin-left: 28.1%;font-size:27px"> The health of the next generation</li><br>
        
        </ol> 
    </div>

    <div class="pic2">
        <img src="storage/cover_images/health.png">
    </div>

    <div class="text3">
        <p> Interested in sharing your recipes with others? <a href='/larapp/public/register'> Become a member now!</a> </p>
    </div>
@endsection