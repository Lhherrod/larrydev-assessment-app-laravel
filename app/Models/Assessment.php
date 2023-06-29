<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;

    protected $fillable = [
        'as_ws_pages',
        'as_ws_styles',
        'as_ws_styles_text', 
        'as_ws_functions',
        'as_ws_functions_text', 
        'as_ws_budget', 
        'as_ws_budget_text', 
        'as_ws_timeframe', 
        'as_ws_timeframe_text',
        'as_ws_hosting',
        'as_ws_domain' ,
        'as_ws_content',
        'status',
        'user_id'
    ];
}