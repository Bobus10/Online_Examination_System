<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
    ];

    public function exam() {
        return $this->belongsTo(Exams::class);
    }

    public function answers() {
        return $this->hasMany(Answers::class);
    }
}
