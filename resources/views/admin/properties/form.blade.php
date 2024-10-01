@extends('admin.admin')
@section('title', $property->exists ? "Editer un bien" : "Créer un bien")

@section('content')
    <h1>@yield('title')</h1>
    <form class="vstack gap-2" action="{{route($property->exists ? 'admin.property.update' : 'admin.property.store', $property)}}" method="POST">
        @csrf
        @method($property->exists ? 'put' : 'post')

        <div class="row">
            @include('shared.input', ['class'=>'col', 'label'=>'Titre', 'name'=>'titre', 'value'=>$property->titre])
            <div class="col row">
                @include('shared.input', ['class'=>'col', 'name'=>'surface', 'value'=>$property->surface])
                @include('shared.input', ['class'=>'col', 'label'=>'Prix', 'name'=>'prix', 'value'=>$property->prix])
            </div>
        </div>
        @include('shared.input', ['type'=>'textarea', 'label'=>'description', 'name'=>'description', 'value'=>$property->description])
        <div class="row">
            @include('shared.input', ['class'=>'col', 'name'=>'chambre', 'value'=>$property->chambre])
            @include('shared.input', ['class'=>'col', 'label'=>'Pièces', 'name'=>'nbre_piece', 'value'=>$property->nbre_piece])
            @include('shared.input', ['class'=>'col', 'name'=>'etage', 'value'=>$property->etage])
        </div>

        <div class="row">
            @include('shared.input', ['class'=>'col', 'name'=>'adresse', 'value'=>$property->adresse])
            @include('shared.input', ['class'=>'col', 'label'=>'Code postal', 'name'=>'code_postal', 'value'=>$property->code_postal])
            @include('shared.input', ['class'=>'col', 'name'=>'ville', 'value'=>$property->ville])
        </div>
            @include('shared.select', ['label'=>'Options', 'name'=>'options', 'value'=>$property->options()->pluck('id'), 'multiple' => true])
            @include('shared.checkbox', ['name'=>'vendue', 'value'=>$property->vendue, 'options'=>$options])
        <div>
            @if ($property->exists)
                <button class="btn btn-primary">Modifier</button>
            @else
                <button class="btn btn-primary">Créer</button>
            @endif
        </div>
    </form>
@endsection