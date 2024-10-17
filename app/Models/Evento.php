<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Evento
 *
 * @property $id
 * @property $titulo
 * @property $descripcion
 * @property $terminos
 * @property $foto
 * @property $inicio
 * @property $termino
 * @property $cupos
 * @property $cupos_disponibles
 * @property $publicacion
 * @property $lugar
 * @property $valor
 * @property $created_at
 * @property $updated_at
 *
 * @property Actividade[] $actividades
 * @property Certificado[] $certificados
 * @property EntradasEvento[] $entradasEventos
 * @property Pago[] $pagos
 * @property Participacione[] $participaciones
 * @property Transaccione[] $transacciones
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Evento extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['titulo', 'descripcion', 'terminos', 'foto', 'inicio', 'termino', 'cupos', 'cupos_disponibles', 'publicacion', 'lugar', 'valor'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function actividades()
    {
        return $this->hasMany(\App\Models\Actividade::class, 'id', 'evento_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function certificados()
    {
        return $this->hasMany(\App\Models\Certificado::class, 'id', 'evento_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function entradasEventos()
    {
        return $this->hasMany(\App\Models\EntradasEvento::class, 'id', 'evento_id');
    }
    
      
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function participaciones()
    {
        return $this->hasMany(\App\Models\Participacione::class, 'id', 'evento_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transacciones()
    {
        return $this->hasMany(\App\Models\Transaccione::class, 'id', 'evento_id');
    }
    
}
