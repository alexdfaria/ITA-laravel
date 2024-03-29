<?php

namespace App;

use App\Warehouse;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Meal extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'type', 'warehouse_id', 'price', 'stock',
    ];

    protected $table = 'meals';

    public $timestamps = false;

public function warehouse()
{
    return $this->hasOne(Warehouse::class);
}


}
