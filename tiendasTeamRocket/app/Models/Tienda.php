<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Usuario;

class Tienda extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 'ubicacion', 'id_comerciante'
    ];

    public function user(){
        return $this->belongsTo(User::class,'id_comerciante');
    }

    public function product(){
        return $this->hasMany(Producto::class,'tienda_id');
    }
}
