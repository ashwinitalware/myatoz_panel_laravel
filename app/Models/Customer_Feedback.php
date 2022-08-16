<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class Customer_Feedback extends Model
{
    use HasApiTokens, HasFactory, SoftDeletes, Notifiable;
    protected $table = 'customer_feedback';

    protected $fillable = [
        'driver_id',
        'customer_id',
        'auto_no',
        'message',
        'status',
        'deleted_at',
        'created_at', 
        'updated_at',
    ];

    protected $dates = ['deleted_at'];
}
