<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SparePart extends Model
{
    use HasFactory;

    protected $table = 'spare_parts';

    protected $fillable = [
        'spare_part_id',
        'name',
        'stock',
        'entry_date',
        'description',
        'price',
        'picture',
    ];

    protected $primaryKey = 'spare_part_id';
    public $incrementing = false;
    protected $keyType = 'int';
}
