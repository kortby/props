<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\UnitPayment;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UnitPaymentController extends Controller
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
     * @param  \App\Models\UnitPayment  $unitPayment
     * @return \Illuminate\Http\Response
     */
    public function show(UnitPayment $unitPayment)
    {
        return Inertia::render('Payment/UnitPayment', [
            'units' => auth()->user()->units,
            'unit_type' => [],
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UnitPayment  $unitPayment
     * @return \Illuminate\Http\Response
     */
    public function edit(UnitPayment $unitPayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UnitPayment  $unitPayment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UnitPayment $unitPayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UnitPayment  $unitPayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnitPayment $unitPayment)
    {
        //
    }
}
