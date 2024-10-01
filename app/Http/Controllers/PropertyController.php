<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyContactRequest;
use App\Http\Requests\SearchPropertiesRequest;
use Illuminate\Http\Request;
use App\Models\Property;

class PropertyController extends Controller
{
    public function index(SearchPropertiesRequest $request){
        $query= Property::query()->orderBy('created_at', 'desc');

        if ($prix=$request->validated('prix')) {
            $query = $query->where('prix', '<=', $prix);
        }
        if ($surface=$request->validated('surface')) {
            $query = $query->where('surface', '>=', $surface);
        }
        if ($chambre=$request->validated('chambre')) {
            $query = $query->where('chambre', '>=', $chambre);
        }
        if ($titre=$request->validated('titre')) {
            $query = $query->where('titre', 'like', "%{$titre}%");
        }

        return view('property.index', [
            'properties'=>$query->paginate(10),
            'input'=>$request->validated()
        ]);
    }

    public function show(string $slug, Property $property){
        $expectedSlug = $property->getSlug();
        if ($slug != $expectedSlug) {
            return to_route('property.show', ['slug'=>$expectedSlug, 'property'=>$property]);
        }
        return view('property.show', [
            'property' => $property
        ]);
    }

    public function contact(Property $property, PropertyContactRequest $request){
        
    }
}
