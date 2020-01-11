<?php

namespace App\Http\Controllers;

use App\Charts\HitChart;
use App\Player;
use App\AtBat;
use App\Charts\AtBatChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players = Player::all();
        return view('player.index', compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('player.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $player = new Player([
           'first_name' => $request->get('first_name'),
           'last_name' => $request->get('last_name'),
        ]);

        $player->save();

        return redirect('/players')->with('success', 'Player Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        $hits = DB::table('at_bats')->where('player_id', $player->id)->pluck('outcome');
        $singles = substr_count($hits, 'Single');
        $doubles = substr_count($hits, 'Double');
        $triples = substr_count($hits, 'Triple');
        $homeruns = substr_count($hits, 'Home Run');
        $walks = substr_count($hits, 'Walk');
        $strikeouts = substr_count($hits, 'Strike Out');

        $balls = DB::table('at_bats')->where('player_id', $player->id)->pluck('balls')->sum();
        $strikes = DB::table('at_bats')->where('player_id', $player->id)->pluck('strikes')->sum();

        $totalatbats = count($hits);
        if ($totalatbats > 0) {
            $batavg = ($singles + $doubles + $triples + $homeruns) / $totalatbats;
            $batavg = number_format($batavg, 3, '.', '');
        }

        $atbats = AtBat::all()->where('player_id', '=', $player->id);

        $borderColors = [
            "rgba(255, 99, 132, 0.5)",
            "rgba(22,160,133, 0.5)",
            "rgba(255, 205, 86, 0.5)",
            "rgba(51,105,232, 0.5)",
            "rgba(244,67,54, 0.5)",
            "rgba(34,198,246, 0.5)",
            "rgba(153, 102, 255, 0.5)",
            "rgba(255, 159, 64, 0.5)",
            "rgba(233,30,99, 0.5)",
            "rgba(205,220,57, 0.5)"
        ];
        $fillColors = [
            "rgba(255, 99, 132, 0.5)",
            "rgba(22,160,133, 0.5)",
            "rgba(255, 205, 86, 0.5)",
            "rgba(51,105,232, 0.5)",
            "rgba(244,67,54, 0.5)",
            "rgba(34,198,246, 0.5)",
            "rgba(153, 102, 255, 0.5)",
            "rgba(255, 159, 64, 0.5)",
            "rgba(233,30,99, 0.5)",
            "rgba(205,220,57, 0.5)"
        ];

        $atbatsChart = new AtBatChart;
        $atbatsChart->minimalist(false);
        $atbatsChart->labels(['Strikes', 'Balls']);
        $atbatsChart->dataset('Strikes vs. Balls', 'bar', [$strikes,$balls])->color($borderColors)->backgroundcolor($fillColors);

        $hitsChart = new HitChart;
        $hitsChart->minimalist(false);
        $hitsChart->labels(['Singles', 'Doubles', 'Triples', 'Home Runs', 'Walks', 'Strike Outs']);
        $hitsChart->dataset('Outcome', 'bar', [$singles,$doubles,$triples,$homeruns,$walks,$strikeouts])
            ->color($borderColors)
            ->backgroundcolor($fillColors);

        return view('player.show', ['atbatsChart' => $atbatsChart, 'hitsChart' => $hitsChart], compact('player','atbats', 'batavg', 'atbat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $player)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Player $player)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        //
    }
}