<?php

namespace App\Http\Controllers;

use App\Models\Property;
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
    public function show(Property $property)
    {
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
                count($property->getMedia('property_collection')) ? $property->getMedia('property_collection')[0]->getUrl() : 'https://therevivalists.com/admin/fm/source/empty.png',
                count($property->getMedia('property_collection')) ? $property->getMedia('property_collection')[1]->getUrl() : 'https://therevivalists.com/admin/fm/source/empty.png',
                count($property->getMedia('property_collection')) ? $property->getMedia('property_collection')[2]->getUrl() : 'https://therevivalists.com/admin/fm/source/empty.png',
                count($property->getMedia('property_collection')) ? $property->getMedia('property_collection')[3]->getUrl() : 'https://therevivalists.com/admin/fm/source/empty.png',
            ],
            'units' => $property->units()->where('is_active', true)->take(4)->get(),
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
