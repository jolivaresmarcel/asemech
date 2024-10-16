<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
/**
 * Class DiplomasUsuario
 *
 * @property $id
 * @property $evento_id
 * @property $user_id
 * @property $diploma_id
 * @property $nota
 * @property $asistencia
 * @property $publicado
 * @property $created_at
 * @property $updated_at
 *
 * @property Diploma $diploma
 * @property Evento $evento
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DiplomasUsuario extends Model
{
    use HasUuids;
    protected $keyType = 'string';
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['evento_id', 'user_id', 'diploma_id', 'nota', 'asistencia', 'publicado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function diploma()
    {
        return $this->belongsTo(\App\Models\Diploma::class, 'diploma_id', 'id');
    }
    
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
