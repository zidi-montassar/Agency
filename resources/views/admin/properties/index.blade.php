@extends('admin.layout')

@section('title', 'All Properties')

@section('content')


    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title'):</h1>
        <a href="{{ route('admin.property.create') }}" class="btn btn-primary">Create new property</a>
    </div>


    <div class="container mt-4">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Surface</th>
                    <th>Price</th>
                    <th>City</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($properties as $property)
                <tr>
                    <th>{{ $property->title }}</th>
                    <th>{{ $property->surface }}m²</th>
                    <th>{{ number_format($property->price, 0, ".", " ") }}</th>
                    <th>{{ $property->city }}</th>
                    <th>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a href="{{ route('admin.property.edit', $property) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('admin.property.destroy', $property) }}" method="POST" 
                                onsubmit="return confirm('Do you really want to delete this Property ?')">
                                @csrf
                                @method("delete")
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>


        {{ $properties->links() }}
    </div>
    

@endsection