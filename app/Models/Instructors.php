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

    public function classes() {
        return $this->hasMany(Classes::class, 'id_instructor');
    }
}
