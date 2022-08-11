<?php

namespace App\Http\Controllers;

use App\Models\Prescreening;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            'questions' => Question::all()->map(function ($question) {
                $question->answer = null;
                return $question;
            }),
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
        // $user = Auth::user();
        // $user->answers = $request->all();
        // $user->save();

        User::where('id', Auth::user()->id)->update($request->all());
        $request->user()->notify(
            NovaNotification::make()->message('Pre-secreening has been submitted.')->icon('cog')->type('success'),
        );
        return  Redirect::route('prescreening')->with('success', 'Thank you! We will contact you shortly.');
        try {
        } catch (\Exception $e) {
            Log::error($e);
        }
        return redirect()->route('prescreening')->with('danger', 'Something went wrong, please try again.');;
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
