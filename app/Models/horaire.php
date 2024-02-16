<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class horaire extends Model
{
    use HasFactory;
    protected $table = 'horaire';
    protected $fillable = ['date'];

    public function drivers()
    {
        return $this->belongsToMany(Driver::class, 'horaire_driver', 'horaire_id', 'driver_id')->withPivot('statut');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    public function horaire_driver()
    {
        return $this->hasOne(horaire_driver::class);
    }
}
