<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Add_Area;
use App\Models\Add_Driver;
use App\Models\Add_Customer;

class Booking_Ride extends Model
{
 
    use HasApiTokens, HasFactory, SoftDeletes, Notifiable;
    protected $table = 'booking_ride';
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'customer_id',
        'driver_id',
        'customer_epass_id',
        'ride_booking_date',
        'ride_booking_time',
        'pickup_area_id',
        'drop_off_area_id',
        'added_persons',
        'ride_total_person',
        'status',
        'deleted_at',
        'created_at', 
        'updated_at',
    ];
    protected $dates = ['deleted_at'];

    public function pickup_details()
    {
        return $this->hasOne(Add_Area::class, 'id', 'pickup_area_id');
    }
    public function dropoff_details()
    {
        return $this->hasOne(Add_Area::class, 'id', 'drop_off_area_id');
    }
    public function driver_details()
    {
        return $this->hasOne(Add_Driver::class, 'id', 'driver_id');
    }
    public function customer_details()
    {
        return $this->hasOne(Add_Customer::class, 'id', 'customer_id');
    }
}
