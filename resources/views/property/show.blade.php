@extends('base')

@section('title', $property->title)

@section('content')
    <div class="container">
        <h1>{{ $property->titre }}</h1>
        <h2>{{ $property->chambre }} pièces - {{ $property->surface }} m²</h2>

        <div class="text-primary fw-bold" style="font-size:4rem;">
            {{ number_format($property->prix, thousands_separator: '') }} $
        </div>

        <hr>
    
        <div class="mt-4">
            <h4>Intéressé par ce bien</h4>
            <form action="{{Route('property.contact', $property)}}" method="POST" class="vstack gap-3">
                @csrf
                <div class="row">
                    @include('shared.input', ['class'=>'col', 'name'=>'firstname','label'=>'Prenom', 'value'=>'John'])
                    @include('shared.input', ['class'=>'col', 'name'=>'lastname','label'=>'Nom', 'value'=>'Doe'])
                </div>
                <div class="row">
                    @include('shared.input', ['class'=>'col', 'name'=>'phone','label'=>'Téléphone', 'value'=>'0973406839'])
                    @include('shared.input', ['type'=>'email', 'class'=>'col', 'name'=>'email','label'=>'Email', 'value'=>'John@doepublic.fr'])
                </div>
                @include('shared.input', ['type'=>'textarea', 'class'=>'col', 'name'=>'message','label'=>'Votre message', 'value'=>'Mon petit message'])
                <div class="mt-3">
                    <button class="btn btn-primary">
                        Nous contacter
                    </button>
                </div>
            </form>
        </div>
        <div class="mt-4">
            <p>{!! nl2br($property->description) !!}</p>
            <div class="row">
                <div class="col-8">
                    <h2>Caractéristique</h2>
                    <table class="table table-striped">
                        <tr>
                            <td>Surface habitable</td>
                            <td>{{ $property->surface }} m²</td>
                        </tr>
                        <tr>
                            <td>Pièces</td>
                            <td>{{ $property->nbre_piece }}</td>
                        </tr>
                        <tr>
                            <td>Prix</td>
                            <td>{{ $property->prix }} $</td>
                        </tr>
                        <tr>
                            <td>Chambre</td>
                            <td>{{ $property->chambre }}</td>
                        </tr>
                        <tr>
                            <td>Etages</td>
                            <td>{{ $property->etage ? : 'Rez de chaussé' }}</td>
                        </tr>
                        <tr>
                            <td>Ville</td>
                            <td>{{ $property->ville }}</td>
                        </tr>
                        <tr>
                            <td>Adresse</td>
                            <td>{{ $property->chambre }}</td>
                        </tr>
                        <tr>
                            <td>Code postal</td>
                            <td>{{ $property->code_postal }}</td>
                        </tr>
                        <tr>
                            <td>Date mise à jour</td>
                            <td>{{ $property->created_at }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-4 mb-5">
                    <h2>Spécificités</h2>
                    <ul class="list-group">
                        @foreach ($property->options as $option)
                            <li class="list-group-item">{{ $option->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection


