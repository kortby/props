<?php

namespace App\Http\Controllers;

use App\Http\Requests\MaintenanceStoreRequest;
use App\Models\Category;
use App\Models\Maintenance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Laravel\Nova\Notifications\NovaNotification;

class MaintenanceController extends Controller
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
        $unit_arr = [];
        $units = [];
        foreach (auth()->user()->units->pluck('unit_number', 'id') as $key => $value) {
            $unit_arr['id'] = $key;
            $unit_arr['unit_number'] = $value;
            array_push($units, $unit_arr);
        }
        return Inertia::render('Maintenance', [
            'units' => $units,
            'categories' => Category::select('id', 'name')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(MaintenanceStoreRequest $request)
    {
        try {
            Maintenance::create($request->all());
            $request->user()->notify(
                NovaNotification::make()->message('New maintenance has been requested.')->icon('cog')->type('success'),
            );
            Mail::send(new \App\Mail\MaintenanceRequested);
            return  Redirect::route('dashboard')->with('success', 'Thank you! We will contact you shortly.');
        } catch (\Exception $e) {
            Log::error($e);
        }
        return redirect()->route('maintenance');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function show(Maintenance $maintenance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function edit(Maintenance $maintenance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Maintenance $maintenance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maintenance $maintenance)
    {
        //
    }
}
