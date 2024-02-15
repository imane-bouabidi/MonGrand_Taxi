<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ville extends Model
{
    use HasFactory;
    protected $table = 'ville';
    protected $fillable = ['ville_name'];

    public function depart()
    {
        return $this->hasMany(trajet::class, 'ville_dep_id');
    }

    public function arrivee()
    {
        return $this->hasMany(trajet::class, 'ville_arr_id');
    }
}
