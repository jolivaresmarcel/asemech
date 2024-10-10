<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Transaccione
 *
 * @property $uuid
 * @property $payment_id
 * @property $evento_id
 * @property $user_id
 * @property $status
 * @property $status_detail
 * @property $create_payment
 * @property $get_payment
 * @property $created_at
 * @property $updated_at
 *
 * @property Evento $evento
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Transaccione extends Model
{
    use HasUuids;
    
    protected $perPage = 20;
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['payment_id', 'evento_id', 'user_id', 'status', 'status_detail', 'create_payment', 'get_payment'];


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
