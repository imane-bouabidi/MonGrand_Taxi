<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class taxi extends Model
{
    use HasFactory;
    protected $table = 'taxi';
    protected $fillable = ['immatricule', 'type_vehicule', 'total_seats', 'prix'];

    public function driver()
    {
        return $this->hasMany(Driver::class);
    }
}
