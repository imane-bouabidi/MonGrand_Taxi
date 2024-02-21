<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class horaire_driver extends Model
{
    use HasFactory;
    protected $table = 'horaire_driver';
    protected $fillable = ['driver_id', 'horaire_id', 'statut'];
    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
    public function horaire()
    {
        return $this->belongsTo(horaire::class);
    }
    public function reservation()
    {
        return $this->hasMany(reservation::class,'horaire_driver_id');
    }
}
