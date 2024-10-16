<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Diploma
 *
 * @property $id
 * @property $evento_id
 * @property $fondo
 * @property $descripcion
 * @property $es_borrable
 * @property $created_at
 * @property $updated_at
 *
 * @property Evento $evento
 * @property DiplomasUsuario[] $diplomasUsuarios
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Diploma extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['evento_id', 'fondo', 'descripcion', 'es_borrable'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function evento()
    {
        return $this->belongsTo(\App\Models\Evento::class, 'evento_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function diplomasUsuarios()
    {
        return $this->hasMany(\App\Models\DiplomasUsuario::class, 'id', 'diploma_id');
    }
    
}
