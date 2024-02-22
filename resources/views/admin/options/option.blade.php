@extends('admin.layout')

@section('title', $option->exists ? 'Edit Option' : 'Create New Option')


@section('content')

    <h1>@yield('title')</h1>

    <div class="container mt-4">
        <form class="vstack gap-2" action="{{ route($option->exists ? 'admin.option.update' : 'admin.option.store', $option) }}" method="post">
            @csrf
            @method($option->exists ? 'put' : 'post')


            @include('shared.input', ['name' => 'name', 'value' => $option->name])

            <div>
                <button class="btn btn-primary">
                    @if($option->exists)
                        Update
                    @else
                        Create
                    @endif
                </button>
            </div>

        </form>
    </div>


@endsection