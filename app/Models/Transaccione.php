<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class Transaccione
 *
 * @property $id
 * @property $payment_id
 * @property $evento_id
 * @property $user_id
 * @property $compra_id
 * @property $status
 * @property $status_detail
 * @property $create_payment
 * @property $get_payment
 * @property $created_at
 * @property $updated_at
 *
 * @property Compra $compra
 * @property Evento $evento
 * @property User $user
 * @package App
 * use Illuminate\Database\Eloquent\Concerns\HasUuids;
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Transaccione extends Model
{
    use HasUuids;
    protected $keyType = 'string';
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['payment_id', 'evento_id', 'user_id', 'compra_id', 'status', 'status_detail', 'create_payment', 'get_payment'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function compra()
    {
        return $this->belongsTo(\App\Models\Compra::class, 'compra_id', 'id');
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
