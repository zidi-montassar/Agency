@extends('admin.layout')

@section('title', 'Options: ')

@section('content')


    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title'):</h1>
        <a href="{{ route('admin.option.create') }}" class="btn btn-primary">Create new option</a>
    </div>


    <div class="container mt-4">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($options as $option)
                <tr>
                    <th>{{ $option->name }}</th>
                    <th>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a href="{{ route('admin.option.edit', $option) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('admin.option.destroy', $option) }}" method="POST" 
                                onsubmit="return confirm('Do you really want to delete this Option ?')">
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


        {{ $options->links() }}
    </div>
    

@endsection