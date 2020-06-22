<?php

namespace App\Http\Controllers;

use App\Meal;
use App\Warehouse;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class MealController extends Controller
{


/*     public function create()
    {
        $meals = DB::table('meals')->get();

        return view('pages.table_list', ['meals' => $meals]);
    } */


        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meals = DB::table('meals')->get();
        $warehouses = DB::table('warehouses')->get();

        return view('pages.table_list', ['meals' => $meals, 'warehouses' => $warehouses]);
    }




    public function create()
    {
        return view('pages.table_add');
    }


    public function store(Request $request)
    {
        //Active Record
        $user = new Meal;  
        $user->name = $request->name;  
        $user->type = $request->type;  
        $user->warehouse_id = $request->warehouse;  
        $user->price = $request->price;  
        $user->stock = $request->stock;  
        $user->save(); 
        
        
        return redirect()->route('table');;
    }

    public function getName($id){

        $meal = DB::table('meals')->where('id' , $id)->first();

        return $meal->name;
    }
    public function getType($id){

        $meal = DB::table('meals')->where('id' , $id)->first();

        return $meal->type;
    }

    public function show($id)
    {

        $meal = DB::table('meals')->where('id' , $id)->first();

        $e = new \stdClass();

        $e->id = $meal->id;
        $e->name = $meal->name;
        $e->type = $meal->type;
        $e->warehouse_id = $meal->warehouse_id;
        $e->price = $meal->price;


        return view('pages.table_edit', ['meal' => $e]);

    }

    /**
     * Update the specified user.
     *
     * @param  Request  $request
     * @param  string  $id
     * @return Response
     */
    public function update(Request $request, $id) {
        $name = $request->input('name');
        $type = $request->input('type');
        $warehouse_id = $request->input('warehouse');
        $price = $request->input('price');


        DB::table('meals')
              ->where('id', $id)
              ->update(['name' => $name, 'type' => $type, 'warehouse_id' => $warehouse_id, 'price' => $price]);

        return redirect()->route('table');
    }

    public function destroy(Request $request, $id){   
     
        DB::delete('delete from meals where id = ?',[$id]);  

        $request->session()->flash('alert-success', ' Meal was deleted successfully.');
     
        return redirect()->route('table');
     }
}
