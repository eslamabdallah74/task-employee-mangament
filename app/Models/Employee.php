<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];

    public function shift()
    {
        return $this->hasOne(Shift::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
