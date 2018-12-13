<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Potential extends Model
{
    protected $table = 'potentials';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
