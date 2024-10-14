<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Actividade
 *
 * @property $id
 * @property $evento_id
 * @property $descripcion
 * @property $fecha
 * @property $lugar
 * @property $created_at
 * @property $updated_at
 *
 * @property Evento $evento
 * @property Participacione[] $participaciones
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Actividade extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['evento_id', 'descripcion', 'fecha', 'lugar'];


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
    public function participaciones()
    {
        return $this->hasMany(\App\Models\Participacione::class, 'id', 'actividad_id');
    }
    
}
