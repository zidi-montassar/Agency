@extends('base')


@section('title', $property->title)



@section('content')


    <div class="container">


        <h1>{{ $property->title }}</h1>
        <h2>{{ $property->surface }} m² - {{ $property->rooms }} rooms</h2>

        <div class="text-primary fw-bold" style="font-size: 4rem;">
            {{ number_format($property->price, thousands_separator: ' ') }} DT
        </div>

        <hr>

        <div class="mt-4">
            <h4>Interested?</h4>

            @include('shared.flash')


            <form action="{{ route('property.contact', $property) }}" method="POST" class="vstack gap-3">
                @csrf 
                <div class="row">
                    @include('shared.input', ['name' => 'fname', 'class' => 'col', 'label' => 'First name'])
                    @include('shared.input', ['name' => 'lname', 'class' => 'col', 'label' => 'Last name'])
                </div>
                <div class="row">
                    @include('shared.input', ['name' => 'phone', 'class' => 'col', 'label' => 'Phone number'])
                    @include('shared.input', ['type' => 'email', 'name' => 'mail', 'class' => 'col', 'label' => 'E-mail'])
                </div>
                @include('shared.input', ['type' => 'textarea', 'name' => 'message', 'class' => 'col', 'label' => 'Message'])
                <button class="btn btn-primary">Contact us</button>
            </form>

        </div>

        <div class="mt-4">
            <p>{{ nl2br($property->description) }}</p>
            <div class="row mt-2">
                <div class="col-8">
                    <h5>Characteristics</h5>
                    <table class="table table-striped">
                        <tr>
                            <td>Surface</td>
                            <td>{{ $property->surface }} m²</td>
                        </tr>
                        <tr>
                            <td>Rooms</td>
                            <td>{{ $property->rooms }}</td>
                        </tr>
                        <tr>
                            <td>Bedrooms</td>
                            <td>{{ $property->bedrooms }}</td>
                        </tr>
                        <tr>
                            <td>Floors number</td>
                            <td>{{ $property->floor ?: 'Ground floor' }} </td>
                        </tr>
                        <tr>
                            <td>Location</td>
                            <td>{{ $property->adress }} <br/>
                                {{ $property->city }}
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-4">
                    <h5>Specificities</h5>
                    <ul class="list-group">
                        @foreach($property->options as $option)
                            <li class="list-group-item">{{ $option->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

    </div>

    

@endsection