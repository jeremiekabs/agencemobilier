@extends('base')

@section('title', 'Tous nos biens')

@section('content')

    <div class="bg-light p-5 mb-5 text-center">
        <form action="" method="get" class="container d-flex gap-2">
            <input type="number" placeholder="Budget max" class="form-control" name="prix" value="{{$input['prix'] ?? ''}}">
            <input type="number" placeholder="Surface min" class="form-control" name="surface" value="{{$input['surface'] ?? ''}}">
            <input type="number" placeholder="Chambre" class="form-control" name="chambre" value="{{$input['chambre'] ?? ''}}">
            <input type="text" placeholder="Mot clé" class="form-control" name="titre" value="{{$input['titre'] ?? ''}}">
            <button class="btn btn-primary btn-sm flex-grow-0">
                Rechercher
            </button>
        </form>
    </div>
    <div class="container">
        <div class="row">
            @forelse ($properties as $property)
                <div class="col-3 mb-4">
                    @include('property.card')
                </div>
            @empty
                <div class="col">
                    Aucun bien ne correspond à votre recherche
                </div>
            @endforelse
        </div>
    </div>

    <div class="container my-4">
        {{ $properties->links() }}
    </div>
@endsection