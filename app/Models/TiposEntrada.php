<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TiposEntrada
 *
 * @property $id
 * @property $descripcion
 * @property $created_at
 * @property $updated_at
 *
 * @property EntradasEvento[] $entradasEventos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TiposEntrada extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['descripcion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function entradasEventos()
    {
        return $this->hasMany(\App\Models\EntradasEvento::class, 'id', 'tipo_entrada_id');
    }
    
}
