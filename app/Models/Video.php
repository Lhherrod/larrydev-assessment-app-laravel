<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'ulid',
        'path',
        'assessment_id',
    ];

    public function getRouteKeyName()
    {
        return 'name';
    }   
}
