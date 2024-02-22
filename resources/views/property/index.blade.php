@extends('base')


@section('title', 'All properties') 



@section('content')

<div class="bg-light p-5 mb-5 text-center">
    <form action="" method="GET" class="container d-flex gap-2">
        <input type="number" placeholder="Max price" class="form-control" name="price" value="{{ $input['price'] ?? '' }}">
        <input type="number" placeholder="Min surface" class="form-control" name="surface" value="{{ $input['surface'] ?? '' }}">
        <input type="number" placeholder="Min rooms" class="form-control" name="rooms" value="{{ $input['rooms'] ?? '' }}">
        <input placeholder="Key word" class="form-control" name="title" value="{{ $input['title'] ?? '' }}">
        <button class="btn btn-primary btn-sm flex-grow-0">Search</button>

    </form>
</div>



<div class="container">
    <div class="row">
        @forelse($properties as $property)
            <div class="col-3 mb-4">
                @include('shared.card')
            </div>
        @empty
            <div class="col">
                No Property Found >__<
            </div>
        @endforelse
    </div>
    <div class="my-4">
        {{ $properties->links() }}
    </div>
</div>

@endsection