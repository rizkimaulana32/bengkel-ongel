<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'spare_part_id',
        'quantity',
        'amount',
    ];

    public function sparePart()
    {
        return $this->belongsTo(SparePart::class, 'spare_part_id', 'spare_part_id');
    }
}
