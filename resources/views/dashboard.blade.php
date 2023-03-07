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
        <form method="POST" action="{{route('login.exit')}}">
            @csrf
             <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{$model['name'] ?? ""}}</h5>
                    <p class="card-text">{{$model['email'] ?? ""}}</p>
                    <p class="card-text text-center mt-3">TOKEN</p>
                    <p class="card-text">{{$model['token'] ?? ""}}</p>
                </div>
            </div>
            <button class="w-auto btn btn-lg btn-primary mt-4" type="submit">Logout</button>
        </form>
    </main> 
@stop