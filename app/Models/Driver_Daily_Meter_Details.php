<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Add_Area;
use App\Models\Add_Driver;
class Driver_Daily_Meter_Details extends Model
{
    use HasApiTokens, HasFactory, SoftDeletes, Notifiable;
    protected $table = 'driver_daily_meter_details';
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'driver_id',
        'login_day_date',
        'meter_reading_login',
        'meter_photo_login',
        'logout_day_date',
        'meter_reading_logout',
        'meter_photo_logout',
        'total_run_km',
        'total_hrs',
        'total_amount',
        'status',
        'deleted_at',
        'created_at', 
        'updated_at',
    ];
    protected $dates = ['deleted_at'];

    public function driver_details()
    {
        return $this->hasOne(Add_Driver::class, 'id', 'driver_id');
    }
}
