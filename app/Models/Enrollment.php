<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;
    protected $fillable = [
            'user_id',
            'class_id',
            'enrollment_date',
            'enrollment_time'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
