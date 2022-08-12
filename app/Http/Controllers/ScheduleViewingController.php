<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\ScheduleViewing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Laravel\Nova\Notifications\NovaNotification;

class ScheduleViewingController extends Controller
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
    public function create(Property $property)
    {
        return Inertia::render('ScheduleViewing', [
            'property' => $property
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            ScheduleViewing::create($request->all());
            $request->user()->notify(
                NovaNotification::make()->message('Your schedule of viewing been submitted.')->icon('cog')->type('success'),
            );
            return  Redirect::route('dashboard')->with('success', 'Thank you! We will contact you shortly.');
        } catch (\Exception $e) {
            Log::error($e);
        }
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ScheduleViewing  $scheduleViewing
     * @return \Illuminate\Http\Response
     */
    public function show(ScheduleViewing $scheduleViewing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ScheduleViewing  $scheduleViewing
     * @return \Illuminate\Http\Response
     */
    public function edit(ScheduleViewing $scheduleViewing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ScheduleViewing  $scheduleViewing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ScheduleViewing $scheduleViewing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ScheduleViewing  $scheduleViewing
     * @return \Illuminate\Http\Response
     */
    public function destroy(ScheduleViewing $scheduleViewing)
    {
        //
    }
}
