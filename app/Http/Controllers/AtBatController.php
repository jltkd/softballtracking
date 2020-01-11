<?php

namespace App\Http\Controllers;

use App\AtBat;
use Illuminate\Http\Request;

class AtBatController extends Controller
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
        return view('atbat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $atbat = new AtBat([
            'player_id' => $request->get('player_id'),
            'date' => $request->get('date'),
            'inning' => $request->get('inning'),
            'balls' => $request->get('balls'),
            'strikes' => $request->get('strikes'),
            'outcome' => $request->get('outcome')
        ]);

        $atbat->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AtBat  $atBat
     * @return \Illuminate\Http\Response
     */
    public function show(AtBat $atBat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AtBat  $atBat
     * @return \Illuminate\Http\Response
     */
    public function edit(AtBat $atBat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AtBat  $atBat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AtBat $atBat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AtBat  $atBat
     * @return \Illuminate\Http\Response
     */
    public function destroy(AtBat $atBat)
    {
        //
    }
}
