<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Add_Area;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class Driver_Management extends Model
{
    use HasApiTokens, HasFactory, SoftDeletes, Notifiable;
    protected $table = 'driver_management';
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'driver_id',
        'city_id',
        'amount_per_km',
        'area_id',
        'to_area_id',
        'mode_of_payment_id',
        'status',
        'deleted_at',
        'created_at', 
        'updated_at',
    ];
    protected $dates = ['deleted_at'];

    public function pickup_details()
    {
        return $this->hasOne(Add_Area::class, 'id', 'area_id');
    }
    public function drop_details()
    {
        return $this->hasOne(Add_Area::class, 'id', 'to_area_id');
    }
}
