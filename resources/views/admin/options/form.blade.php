@extends('admin.admin')
@section('title', $option->exists ? "Editer une option" : "Créer une option")

@section('content')
    <h1>@yield('title')</h1>
    <form class="vstack gap-2" action="{{route($option->exists ? 'admin.option.update' : 'admin.option.store', $option)}}" method="POST">
        @csrf
        @method($option->exists ? 'put' : 'post')

        @include('shared.input', ['type'=>'text', 'label'=>'Nom', 'name'=>'name', 'value'=>$option->name])
        <div>
            @if ($option->exists)
                <button class="btn btn-primary">Modifier</button>
            @else
                <button class="btn btn-primary">Créer</button>
            @endif
        </div>
    </form>
@endsection