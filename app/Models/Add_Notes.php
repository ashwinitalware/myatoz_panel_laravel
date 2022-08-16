<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Add_Notes extends Model
{
    use HasApiTokens, HasFactory, SoftDeletes, Notifiable;
    protected $table = 'add_notes';
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
    
        'english_notes',
        'hindi_notes',
        'status',
        'deleted_at',
        'created_at', 
        'updated_at',
    ];
    protected $dates = ['deleted_at'];
}
