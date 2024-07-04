<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WateringLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'plant_id',
        'watered_at',
    ];

    public function plant()
    {
        return $this->belongsTo(Plant::class);
    }
}
