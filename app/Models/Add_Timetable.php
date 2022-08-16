<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use App\Models\Add_Area;
use App\Models\Add_City;

class Add_Timetable extends Model
{
    use HasApiTokens, HasFactory, SoftDeletes, Notifiable;
    protected $table = 'add_timetable';
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
    
        'city_id',
        'from_area_id',
        'to_area_id',
        'sub_areas_id',
        'timeslots_id',
        'status',
        'deleted_at',
        'created_at', 
        'updated_at',
    ];
    protected $dates = ['deleted_at'];

    public function from_area()
    {
        return $this->hasOne(Add_Area::class, 'id', 'from_area_id');
    }
    public function to_area()
    {
        return $this->hasOne(Add_Area::class, 'id', 'to_area_id');
    }
    public function city()
    {
        return $this->hasOne(Add_City::class, 'id', 'city_id');
    }
    public function sub_area()
    {
        return $this->hasOne(Add_Area::class, 'id', 'sub_areas_id');
    }
}
