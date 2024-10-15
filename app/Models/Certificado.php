<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Certificado
 *
 * @property $id
 * @property $user_id
 * @property $es_valido
 * @property $fecha_caducidad
 * @property $archivo
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Certificado extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['user_id', 'es_valido', 'fecha_caducidad', 'archivo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }
    
}
