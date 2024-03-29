<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\UnitType;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property, UnitType $unitType)
    {
        // dd($property->units()->where('is_active', true)->take(4)->get())
        return Inertia::render('Property', [
            'id' => $property->id,
            'name' => $property->name,
            'description' => $property->description,
            'address_1' => $property->address_line_1,
            'address_2' => $property->address_line_2,
            'city' => $property->city,
            'state' => $property->state,
            'postal_code' => $property->postal_code,
            'phone' => $property->phone,
            'pictures' => [
                getDefaultPictureIfNull($property->getMedia('property_collection'), 0),
                getDefaultPictureIfNull($property->getMedia('property_collection'), 1),
                getDefaultPictureIfNull($property->getMedia('property_collection'), 2),
                getDefaultPictureIfNull($property->getMedia('property_collection'), 3),
            ],
            'units' => $property->units()->where('is_active', true)->take(4)->get(),
            'amenities' => [
                getDefaultPictureIfNull($property->amenities()->first()->getMedia('amenity_collection'), 0),
                getDefaultPictureIfNull($property->amenities()->get()[1]->getMedia('amenity_collection'), 0),
            ],
            'floor_plans_pictures' => [
                getDefaultPictureIfNull($unitType->get()[0]->getMedia('unit_type_collection'), 0),
                getDefaultPictureIfNull($unitType->get()[1]->getMedia('unit_type_collection'), 0),
                getDefaultPictureIfNull($unitType->get()[2]->getMedia('unit_type_collection'), 0),
                getDefaultPictureIfNull($unitType->get()[3]->getMedia('unit_type_collection'), 0),
            ],
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        //
    }
}
