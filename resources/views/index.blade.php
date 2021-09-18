
@extends("layouts")

@section('content')
    <div class="container">
        @if(Route::has('login'))
            <div>
                @auth
                    <a href={{route('todos')}}></a>
                @else
                    <a href={{route('login')}}>Log in</a>
                    @if (Route::has('register'))
                        <a href={{route('register')}}>Register</a>
                    @endif
                @endauth
            </div>
        @endif
@endsection


