<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class Add_Customer_Nominee extends Model
{
    use HasApiTokens, HasFactory, SoftDeletes, Notifiable;
    protected $table = 'add_customer_nominee';
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'customer_id',
        'subscription_id',
        'e_pass_id',
        'name',
        'address',
        'mobile_number',
        'relation_with_customer',
        'status',
        'deleted_at',
        'created_at', 
        'updated_at',
    ];
    protected $dates = ['deleted_at'];
}
