<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{

    // Campos que se agregaran
    protected $fillable = [
        'titulo', 'descripcion', 'direccion', 'email', 'telefono',  'imagen', 'categoria_id', 'ciudad_id'
    ];
    
    // Obtiene la categoria de la receta via FK
    public function categoria()
    {
       return $this->belongsTo(CategoriaReceta::class);
    }
    // Obtiene la ciudad de la receta via FK
    public function ciudad()
    {
       return $this->belongsTo(CiudadReceta::class);
    }

    // Obtiene la información del usuario via FK
    public function autor()
    {
        return $this->belongsTo(User::class, 'user_id'); // FK de esta tabla
    }

    // Likes que ha recibido una receta
    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes_receta');
    }

}
