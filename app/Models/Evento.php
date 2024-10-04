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
 * @property $pucbicar
 * @property $lugar
 * @property $valor
 * @property $created_at
 * @property $updated_at
 *
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
    protected $fillable = ['titulo', 'descripcion', 'terminos', 'foto', 'inicio', 'termino', 'cupos', 'pucbicar', 'lugar', 'valor'];


}
