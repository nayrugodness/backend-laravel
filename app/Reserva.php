<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    // Campos que se agregaran
    protected $fillable = [
        'hora',
        'fecha',
        'user_id', 
        'receta_id'
    ];
    
    // Obtiene el usuario que reserva via FK
    public function usuario()
    {
       return $this->belongsTo(User::class, 'user_id');
    }
    // Obtiene el restaurante via FK
    public function receta()
    {
       return $this->belongsTo(Receta::class, 'receta_id');
    }

    // Obtiene la información del usuario via FK
    //public function autor()
    //{
    //    return $this->belongsTo(User::class, 'user_id'); // FK de esta tabla
    //}

}
