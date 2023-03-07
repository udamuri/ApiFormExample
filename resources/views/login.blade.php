@extends('app')
 
@section('title', 'Page Title')
 
 
@section('css')
<style>
    .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
    }

    @media (min-width: 768px) {
    .bd-placeholder-img-lg {
        font-size: 3.5rem;
    }
    }
</style>
<link rel="stylesheet" href="{{asset('template/signin.css')}}" type="text/css">
@endsection

@section('content')
    <main class="form-signin">
        <form method="POST" action="{{route('login.post', $slug)}}">
             @csrf
            <h1 class="h3 mb-3 fw-normal">Please sign in {{$slug}}</h1>

            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            
            @if (\Session::has('error-login'))
            <div class="alert alert-success">
                <ul>
                    @foreach(\Session::get('error-login') as $key => $value)
                    <li>{!! $value[0] !!}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        </form>
    </main> 
@stop