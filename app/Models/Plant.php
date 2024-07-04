<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'espece',
        'date_achat',
        'image',
    ];

    public function getImageAttribute($value)
    {
        return asset('storage/' . $value);
    }

    public function arrosages()
    {
        return $this->hasMany(Arrosage::class);
    }
}
