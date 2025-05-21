<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    public function itemsOrdered()
    {
        return $this->hasMany(itemsOrdered::class);
    }

    protected $primaryKey = 'appointment_id';

    protected $fillable = [
        'appointment_id',
        'user_id',
        'date',
        'status',
        'descriptions'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }

}
