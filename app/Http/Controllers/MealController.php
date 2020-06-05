<?php

namespace App\Http\Controllers;

use App\Meal;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class MealController extends Controller
{
        /**
     * Display a listing of the users
     *
     * 
     * @return \Illuminate\View\View
     */


/*     public function create()
    {
        $meals = DB::table('meals')->get();

        return view('pages.table_list', ['meals' => $meals]);
    } */


    public function show($id)
    {

        $meal = DB::table('meals')->where('ITEM_ID' , $id)->first();

        $e = new \stdClass();

        $e->id = $meal->ITEM_ID;
        $e->name = $meal->ITEM_NAME;
        $e->company = $meal->COMPANY_ID;

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


        DB::update('UPDATE meals set ITEM_NAME = ? where ITEM_ID = ?',[$name,$id]);

        return redirect()->route('table');
    }

/*     public function store(Request $request)
    {
         $request->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]); 

        User::create([

            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        
        //$user = User::create(request(['name', 'email', 'password']));
        
        //auth()->login($user);
        
        return redirect('/user');
    } */
}
