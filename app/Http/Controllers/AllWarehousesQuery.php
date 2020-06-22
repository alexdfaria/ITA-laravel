<?php

namespace App\Http\Controllers;

use Notifiable;

use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class AllWarehousesQuery implements AllWarehousesQueryI {

    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }


    public function fetch($fields)
    {
        return $this->db->select($fields)->from('warehouses')->orderBy('city')->get();
    }
}