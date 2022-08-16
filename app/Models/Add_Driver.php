<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class Add_Driver extends Model
{
    use HasApiTokens, HasFactory, SoftDeletes, Notifiable;

    protected $table = 'add_driver';
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'city_id',
        'first_name',
        'middle_name',
        'last_name',
        'auto_no',
        'auto_insurance_validity_expire_date',
        'user_id',
        'password',
        'user_id',
        'address',
        'contact_no',
        'account_holder_name',
        'account_number',
        'ifsc_code',
        'bank_name',
        'nominee_details',
        'driver_photo_name',
        'driver_aadhar_photo_name',
        'deleted_at',
        'created_at', 
        'updated_at',
    ];
    protected $dates = ['deleted_at'];


    public function dailyLoginDetails()
    {
        return $this->hasMany(Driver_Daily_Meter_Details::class, 'driver_id');
    }

    
}
