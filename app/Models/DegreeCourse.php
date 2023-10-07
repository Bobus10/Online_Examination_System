<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DegreeCourse extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function yearbooks() {
        return $this->hasMany(Yearbook::class);
    }
}
