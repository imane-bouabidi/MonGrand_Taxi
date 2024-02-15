<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    use HasFactory;
    protected $table = 'reservation';
    protected $fillable = ['date', 'nbr_places', 'rating', 'horaire_driver_id', 'passager_id'];

    public function horaire()
    {
        return $this->belongsTo(Horaire::class);
    }

    public function passager()
    {
        return $this->belongsTo(Passager::class);
    }
}
