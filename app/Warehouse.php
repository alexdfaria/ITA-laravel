<?php

namespace App;

use App\Meal;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Warehouse extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'warehouses';

    protected $fillable = [
        'warehouse_id', 'name', 'city',
    ];

    public $timestamps = false;

    public function meal()
    {
        return $this->belongsTo(Meal::class);
    }


}
