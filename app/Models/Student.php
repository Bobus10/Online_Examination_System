<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'surname',
        'date_of_birth',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function classes() {
        return $this->belongsTo(Classes::class);
    }
}
