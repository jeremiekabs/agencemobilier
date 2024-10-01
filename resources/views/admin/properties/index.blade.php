@extends('admin.admin')
@section('title', 'Les biens')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1>@yield('title')</h1>
            <a href="{{ route('admin.property.create')}}" class="btn btn-primary">Ajouter un bien</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Surface</th>
                    <th>Prix</th>
                    <th>Pièces</th>
                    <th>Ville</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($properties as $property)
                    <tr>
                        <td>{{$property->titre}}</td>
                        <td>{{$property->surface}}m²</td>
                        <td>{{number_format($property->prix, thousands_separator: ' ')}}</td>
                        <td>{{$property->nbre_piece}}</td>
                        <td>{{$property->ville}}</td>
                        <td>
                            <div class="d-flex gap-2 w-100 justify-content-end">
                                <a href="{{ route('admin.property.edit', $property)}}" class="btn btn-primary">Editer</a>
                                <form action="{{ route('admin.property.destroy', $property) }}" method="POST">
                                    @csrf
                                    @method("delete")
                                    <button class="btn btn-danger">Supprimer</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
        {{$properties->links()}}
    </div>
    
@endsection