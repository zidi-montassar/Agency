<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyContactRequest;
use App\Http\Requests\SearchPropertyRequest;
use App\Mail\PropertyContactMail;
use App\Models\property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PublicPropertyController extends Controller
{
    public function index(SearchPropertyRequest $request)
    {
        $query = property::query();
        //dd($request->validated());
        if($request->validated(['price'])){
            $query = $query->where('price', '<=', $request->input('price'));
        }
        if($request->validated(['surface'])){
            $query = $query->where('surface', '>=', $request->input('surface'));
        }
        if($request->validated(['rooms'])){
            $query = $query->where('rooms', '>=', $request->input('rooms'));
        }
        if($request->validated(['title'])){
            $query = $query->where('title', 'like', '%' . $request->input('title') . '%');
        }
        $properties = $query->orderBy('created_at', 'desc')->paginate(16);
        return view('property.index', [
            'properties' => $properties,
            'input' => $request->validated()
        ]);
    }

    public function show(string $slug, property $property)
    {
        if($slug !== $property->slug()){
            return to_route('property.show', [
                'slug' => $property->slug(),
                'property' => $property
            ]);
        }
        return view('property.show', ['slug' => $slug, 'property' => $property]);
    }

    public function contact(property $property, PropertyContactRequest $request)
    {
        Mail::send(new PropertyContactMail($property, $request->validated()));
        return back()->with('success', 'your contact request has been sent successfully');
    }
}
