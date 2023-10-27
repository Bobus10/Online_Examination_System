<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'classes_id',
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
