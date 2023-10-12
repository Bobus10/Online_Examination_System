<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructors extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'surname',
        'date_of_birth',
        'hire_date',
        'salary',
    ];

    public function user() {
        return $this->hasOne(User::class, 'user_id');
    }

    public function subjects() {
        return $this->hasMany(Subject::class);
    }
}
