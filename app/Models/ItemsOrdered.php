<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemsOrdered extends Model
{
    use HasFactory;

    protected $primaryKey = 'items_ordered_id';
    protected $table = 'items_ordereds';

    protected $fillable = [
        'items_ordered_id',
        'appointment_id',
        'spare_part_id',
        'amount',
    ];


    public function sparePart()
    {
        return $this->belongsTo(SparePart::class, 'spare_part_id', 'spare_part_id');
    }

    public function appointment()
    {
        return $this->belongsTo(Appointment::class, 'appointment_id', 'appointment_id');
    }
}





