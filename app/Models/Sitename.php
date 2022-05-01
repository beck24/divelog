<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sitename extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function dives() {
        return $this->hasMany(Dive::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
