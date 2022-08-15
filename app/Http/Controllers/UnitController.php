<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UnitController extends Controller
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
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        return Inertia::render('Unit', [
            'unit_heading' => $unit->unit_heading,
            'number_of_bedroom' => $unit->number_of_bedroom,
            'number_of_bathroom' => $unit->number_of_bathroom,
            'number_of_balcony' => $unit->number_of_balcony,
            'date_available_from' => $unit->date_available_from,
            'description' => $unit->description,
            'unit_number' => $unit->unit_number,
            'size' => $unit->size,
            'price' => $unit->price,
            'property_name' => $unit->property->name,
            'property_address_1' => $unit->property->address_line_1,
            'property_address_2' => $unit->property->address_line_2,
            'property_city' => $unit->property->city,
            'property_state' => $unit->property->state,
            'property_postal_code' => $unit->property->postal_code,
            'property_phone' => $unit->property->phone,
            'pictures' => [
                count($unit->getMedia('units_collection')) ? $unit->getMedia('units_collection')[0]->getUrl() : 'https://therevivalists.com/admin/fm/source/empty.png',
                count($unit->getMedia('units_collection')) ? $unit->getMedia('units_collection')[1]->getUrl() : 'https://therevivalists.com/admin/fm/source/empty.png',
                count($unit->getMedia('units_collection')) ? $unit->getMedia('units_collection')[2]->getUrl() : 'https://therevivalists.com/admin/fm/source/empty.png',
            ],
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        //
    }
}
