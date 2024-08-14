<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cars extends Model
{
    use HasFactory, softDeletes;

    protected $table = 'cars';

    protected $fillable = [
        'car_model',
        'car_image',
        'manufacturer',
        'price',
        'year',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
