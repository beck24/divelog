<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dive extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function diver() {
        return $this->belongsTo(User::class);
    }

    public function buddies() {
        return $this->belongsToMany(Buddy::class);
    }
}
