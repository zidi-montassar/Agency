@extends('admin.layout')

@section('title', $property->exists ? 'Edit Property' : 'Create New Property')


@section('content')

    <h1>@yield('title')</h1>

    <div class="container mt-4">
        <form class="vstack gap-2" action="{{ route($property->exists ? 'admin.property.update' : 'admin.property.store', $property) }}" method="post">
            @csrf
            @method($property->exists ? 'put' : 'post')


            <div class="row">
                @include('shared.input', ['name' => 'title','class' => 'col', 'value' => $property->title])
                <div class="col row">
                    @include('shared.input', ['name' => 'surface','class' => 'col', 'value' => $property->surface])
                    @include('shared.input', ['name' => 'price','class' => 'col', 'value' => $property->price])
                </div>
            </div>
            
            @include('shared.input', ['type' => 'textarea', 'name' => 'description', 'value' => $property->description])

            <div class="row">
                @include('shared.input', ['name' => 'rooms','class' => 'col', 'value' => $property->rooms])
                @include('shared.input', ['name' => 'bedrooms', 'class' => 'col', 'value' => $property->bedrooms])
                @include('shared.input', ['name' => 'floor','class' => 'col', 'value' => $property->floor])
            </div>

            <div class="row">
                @include('shared.input', ['name' => 'city','class' => 'col', 'value' => $property->city])
                @include('shared.input', ['name' => 'adress', 'label' => 'Address', 'class' => 'col', 'value' => $property->adress])
                @include('shared.input', ['name' => 'postal_code', 'label' => 'Postal Code', 'class' => 'col', 'value' => $property->postal_code])
            </div>

            @include('shared.select', ['name' => 'options', 'label' => 'Options', 'value' => $property->options()->pluck('id'), 'options' => $options])

            @include('shared.checkbox', ['name' => 'sold', 'value' => $property->sold])

            <div>
                <button class="btn btn-primary">
                    @if($property->exists)
                        Update
                    @else
                        Create
                    @endif
                </button>
            </div>

        </form>
    </div>


@endsection