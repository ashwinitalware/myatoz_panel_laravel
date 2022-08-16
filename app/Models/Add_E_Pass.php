<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class Add_E_Pass extends Model
{
    use HasApiTokens, HasFactory, SoftDeletes, Notifiable;
    protected $table = 'add_e_pass';
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'customer_id',
        'city_id',
        'booking_date',
        'subscription_id',
        'duration',
        'monthly_insurance_taken',
        'from_date',
        'to_date',
        'e_pass_no',
        'amount_to_be_paid',
        'mode_of_payment_id',
        'razorpay_order_id',
        'status',
        'deleted_at',
        'created_at', 
        'updated_at',
    ];
    protected $dates = ['deleted_at'];
}
