@extends('base')

@section('title', 'Home')

@section('content')
    <div class="bg-light p-5 mb-5 text-center">
        <div class="container">
            <h1>Agence de location</h1>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem cupiditate laudantium ab saepe non voluptate, earum, beatae itaque dolores delectus maiores voluptatibus, qui mollitia suscipit sequi laboriosam iusto hic dolorum.</p>
        </div>
    </div>
    <div class="container">
        <h2>Nos derniers biens</h2>
        <div class="row">
            @foreach ($properties as $property)
                <div class="col">
                    @include('property.card')
                </div>
            @endforeach
            
        </div>
    </div>
    
@endsection
    
