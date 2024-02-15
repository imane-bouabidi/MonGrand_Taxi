<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trajet extends Model
{
    use HasFactory;
    protected $table = 'trajet';
    protected $fillable = ['ville_dep_id', 'ville_arr_id'];

    public function depart()
    {
        return $this->belongsTo(ville::class, 'ville_dep_id');
    }

    public function arrivee()
    {
        return $this->belongsTo(ville::class, 'ville_arr_id');
    }

    public function driver()
    {
        return $this->hasMany(Driver::class);
    }
}
