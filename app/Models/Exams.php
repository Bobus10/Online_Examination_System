<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exams extends Model
{
    use HasFactory;

    protected $fillable = [
        'pass_rate',
    ];

    public function classes() {
        return $this->belongsToMany(Classes::class);
    }

    public function questions() {
        return $this->hasMany(Questions::class);
    }
}
