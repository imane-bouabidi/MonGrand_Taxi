<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;


class driver extends Model
{
    use HasFactory,HasRoles;
    protected $table = 'driver';
    protected $fillable = ['description', 'type_paiement', 'statut', 'user_id', 'taxi_id', 'trajet_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function taxi()
    {
        return $this->belongsTo(Taxi::class);
    }

    public function trajet()
    {
        return $this->belongsTo(Trajet::class);
    }
    public function horaires()
    {
        return $this->belongsToMany(Horaire::class, 'horaire_driver', 'driver_id', 'horaire_id')->withPivot('statut');
    }
    public function horaire_driver()
    {
        return $this->belongsToMany(horaire_driver::class, 'horaire_driver', 'driver_id', 'horaire_id')->withPivot('statut');
    }
}
