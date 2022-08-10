<?php

namespace App\Http\Controllers;

use App\Models\Prescreening;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Laravel\Nova\Notifications\NovaNotification;

class PrescreeningController extends Controller
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
        return Inertia::render('Prescreening', [
            'questions' => Question::all(),
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
            $request->merge([
                'user_id' => auth()->user()->id,
            ]);
            Prescreening::create($request->all());
            $request->user()->notify(
                NovaNotification::make()->message('Pre-secreening has been submitted.')->icon('cog')->type('success'),
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
     * @param  \App\Models\Prescreening  $prescreening
     * @return \Illuminate\Http\Response
     */
    public function show(Prescreening $prescreening)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prescreening  $prescreening
     * @return \Illuminate\Http\Response
     */
    public function edit(Prescreening $prescreening)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prescreening  $prescreening
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prescreening $prescreening)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prescreening  $prescreening
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prescreening $prescreening)
    {
        //
    }
}
