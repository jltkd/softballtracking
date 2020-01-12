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

    protected $casts = ['date' => 'date'];

    public function player() {
        return $this->belongsTo(Player::class);
    }

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('outcome', 'like', '%'.$query.'%');
    }
}
