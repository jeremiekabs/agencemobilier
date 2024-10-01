<div class="card">
    <div class="card-body">
        <h5 class="card-title">
            <h6>{{ $property->vendue ? 'Indisponible' : 'Disponible' }}</h6>
            <a href="{{ route('property.show', ['slug' => $property->getSlug(), 'property'=>$property]) }}">{{$property->titre}}</a>
        </h5>
        <p class="card-text">{{ $property->surface}}m² - {{$property->ville}}</p>
        <div class="text-primary fw-bold" style="font-size: 1.4rem;">
            {{ number_format($property->prix, thousands_separator: ' ')}} $
        </div>
    </div>
</div>