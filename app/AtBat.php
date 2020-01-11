<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AtBat extends Model
{
    protected $fillable = [
      'player_id',
      'date',
      'inning',
      'balls',
      'strikes',
      'outcome'
    ];

    public function player() {
        return $this->belongsTo(Player::class);
    }

    public function battingavg() {
        return 'test';
    }
}
