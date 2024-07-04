<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arrosage extends Model
{
    use HasFactory;

    protected $fillable = [
        'plant_id',
        'quantity',
        'frequency',
    ];

    public function plant()
    {
        return $this->belongsTo(Plant::class);
    }
}
