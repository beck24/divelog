<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buddy extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function dives() {
        return $this->belongsToMany(Dive::class);
    }
}
