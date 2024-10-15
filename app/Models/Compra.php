<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Compra
 *
 * @property $id
 * @property $evento_id
 * @property $user_id
 * @property $estado_id
 * @property $tipo_compra_id
 * @property $archivo
 * @property $created_at
 * @property $updated_at
 *
 * @property Evento $evento
 * @property TiposCompra $tiposCompra
 * @property User $user
 * @property Transaccione[] $transacciones
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Compra extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['evento_id', 'user_id', 'estado_id', 'tipo_compra_id', 'archivo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function evento()
    {
        return $this->belongsTo(\App\Models\Evento::class, 'evento_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tiposCompra()
    {
        return $this->belongsTo(\App\Models\TiposCompra::class, 'tipo_compra_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transacciones()
    {
        return $this->hasMany(\App\Models\Transaccione::class, 'id', 'compra_id');
    }
    
}
