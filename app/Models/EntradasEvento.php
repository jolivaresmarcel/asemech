<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;


/**
 * Class EntradasEvento
 *
 * @property $id
 * @property $tipo_entrada_id
 * @property $evento_id
 * @property $user_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Evento $evento
 * @property TiposEntrada $tiposEntrada
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class EntradasEvento extends Model
{
    use HasUuids;
    protected $keyType = 'string';

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['tipo_entrada_id', 'evento_id', 'user_id'];


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
    public function tiposEntrada()
    {
        return $this->belongsTo(\App\Models\TiposEntrada::class, 'tipo_entrada_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }
    
}
