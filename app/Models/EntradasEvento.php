<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class EntradasEvento
 *
 * @property $id
 * @property $estado
 * @property $evento_id
 * @property $user_id
 * @property $fecha_compra
 * @property $created_at
 * @property $updated_at
 *
 * @property Evento $evento
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class EntradasEvento extends Model
{
    use HasUuids;
    
    protected $perPage = 20;
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['estado', 'evento_id', 'user_id', 'fecha_compra'];


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
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }
    
}
