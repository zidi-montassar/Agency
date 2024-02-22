@extends('base')

@section('title', 'Login')




@section('content')


<div class="container mt-4">
    <h1>@yield('title')</h1>

    @include('shared.flash')

    <form action="{{ route('auth.login') }}" method="post" class="vstack gap-3">
        @csrf

        @include('shared.input', ['type' => 'email', 'name' => 'email', 'label' => 'E-mail'])

        @include('shared.input', ['type' => 'password', 'name' => 'password', 'label' => 'Password'])

        <div>
            <button class="btn btn-primary">Login</button>
        </div>
    </form>
</div>




@endsection