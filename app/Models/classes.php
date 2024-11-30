<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classes extends Model
{
    use HasFactory;
    protected $fillable = [
            'trainer_id',
            'class_name',
            'class_description',
            'class_duration',
            'class_image'
    ];

    public function trainer()
    {
        return $this->belongsTo(trainer::class);
    }
}