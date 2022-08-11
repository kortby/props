<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScheduleAmenityRequest;
use App\Models\Amenity;
use App\Models\AmenitySchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Laravel\Nova\Notifications\NovaNotification;
use Illuminate\Support\Facades\Log;

class AmenityScheduleController extends Controller
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
        return Inertia::render('Amenities', [
            'amenities' => Amenity::select('id', 'name', 'price', 'description')
                ->where('user_id', auth()->user()->parent_id)
                ->where('price', '>', 0)
                ->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ScheduleAmenityRequest $request)
    {
        $request->merge([
            'user_id' => auth()->user()->id,
        ]);
        // dd($request->all());
        AmenitySchedule::create($request->all());
        $request->user()->notify(
            NovaNotification::make()->message('Your schedule of ' . $request->amenity_id . ' been submitted.')->icon('cog')->type('success'),
        );
        return  Redirect::route('dashboard')->with('success', 'Thank you! We will contact you shortly.');
        try {
        } catch (\Exception $e) {
            Log::error($e);
        }
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AmenitySchedule  $amenitySchedule
     * @return \Illuminate\Http\Response
     */
    public function show(AmenitySchedule $amenitySchedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AmenitySchedule  $amenitySchedule
     * @return \Illuminate\Http\Response
     */
    public function edit(AmenitySchedule $amenitySchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AmenitySchedule  $amenitySchedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AmenitySchedule $amenitySchedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AmenitySchedule  $amenitySchedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(AmenitySchedule $amenitySchedule)
    {
        //
    }
}
