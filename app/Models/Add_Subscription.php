<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class Add_Subscription extends Model
{
    use HasApiTokens, HasFactory, SoftDeletes, Notifiable;
    protected $table = 'subscription';
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'city_id',
        'subscription_type',
        'duration',
        'amount',
        'status',
        'deleted_at',
        'created_at', 
        'updated_at',
    ];
    protected $dates = ['deleted_at'];
}
