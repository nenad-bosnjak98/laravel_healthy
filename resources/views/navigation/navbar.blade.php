<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/navbar.css')}}">
        <title>Victus</title>
    </head>
    <body>
        <div class="page">
            <nav class="page__menu page__custom-settings menu">
              <ul class="menu__list r-list">
                <li class="menu__group"><a href="/larapp/public/" class="menu__link r-link text-underlined">Home</a></li>
                <li class="menu__group"><a href="/larapp/public/salads" class="menu__link r-link text-underlined">Salads</a></li>
                <li class="menu__group"><a href="/larapp/public/snacks" class="menu__link r-link text-underlined">Snacks</a></li>
                <li class="menu__group"><a href="/larapp/public/smoothies" class="menu__link r-link text-underlined">Smoothies</a></li>
               <!-- <li class="menu__group"><a style="pointer-events: none; cursor: default;" href="/larapp/public/smoothies" id='dropdown' class="menu__link r-link text-underlined">Create</a>
                  <ul>
                    <li><a href="/larapp/public/salads/create">Salad Recipe</a></li>
                    <li><a href="/larapp/public/snacks/create">Snack Recipe</a></li>
                    <li><a href="/larapp/public/smoothies/create">Smoothie Recipe</a></li>
                  </ul>
                </li> -->
                @guest
                @if (Route::has('login'))
                    <li class="menu-group">
                        <a style="background:rgb(54, 54, 160)" class="menu__link r-link text-underlined" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif
                
                @if (Route::has('register'))
                    <li class="menu__group">
                        <a style="background:rgb(168, 52, 52)" class="menu__link r-link text-underlined" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
            <li class="menu__group"><a style="pointer-events: none; cursor: default;background:rgb(177, 158, 53)" href="#" id='dropdown1' class="menu__link r-link text-underlined">Create</a>
                <ul>
                  <li><a style="background:rgb(177, 158, 53)" href="/larapp/public/salads/create">Salad Recipe</a></li>
                  <li><a style="background:rgb(177, 158, 53)" href="/larapp/public/snacks/create">Snack Recipe</a></li>
                  <li><a style="background:rgb(177, 158, 53)" href="/larapp/public/smoothies/create">Smoothie Recipe</a></li>
                </ul>
              </li>
                <li class="menu__group">
                    <a style="background:rgb(61, 175, 105)" id="dropdown" class="menu__link r-link text-underlined" style="pointer-events: none; cursor: default;" href="/larapp/public/home" >
                        {{ Auth::user()->name }}
                    </a>

                    <ul>
                        <li><a style="background:rgb(61, 175, 105)"  class="log" href='/larapp/public/home'>Dashboard</a></li>
                        <li><a style="background:rgb(61, 175, 105)"  class="log" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a></li>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </li>
            @endguest


              </ul>
            </nav>
          </div>
    </body>
</html>