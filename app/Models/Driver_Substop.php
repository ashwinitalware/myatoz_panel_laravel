<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver_Substop extends Model
{
    use HasFactory;
    protected $table = 'driver_substops';
    protected $fillable = [
        'driver_id',
        'subStop_id',
    ];
}
