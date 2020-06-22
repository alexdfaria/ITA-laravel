<?php

namespace App\Http\Controllers;

use App\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function index(AllWarehousesQuery $query)
    {
        // Fetch warehouse data
        $warehouses = $query->fetch(['id', 'name', 'city']);

        // Return view
        return view('pages.table_list2', ['warehouses' => $warehouses]);
    }

    public function lazyLoad(){
        $warehouses = Warehouse::all();

        return view('pages.table_list2', ['warehouses' => $warehouses]);
    }

}
