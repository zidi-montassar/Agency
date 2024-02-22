@extends('base')

@section('content')

<div class="bg-light p-5 mb-5 text-center">
    <div class="container">
        <h1>Immo Agency</h1>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quisquam, error voluptatem reprehenderit cum amet veritatis ex necessitatibus iste accusantium laborum iure hic tempora animi! Saepe quasi voluptas ab voluptate rerum!</p>
    </div>
</div>


<div class="container">
    <h2>Last Properties</h2>
    <div class="row">
        @foreach($properties as $property)
            <div class="col">
                @include('shared.card')
            </div>
        @endforeach
    </div>
</div>

@endsection