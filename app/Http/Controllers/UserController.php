<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {

        $users = DB::table('users')->get();
        return view('users.index', ['users' => $users]);
    }

    public function create()
    {
        return view('users.add_user');
    }

    public function store(Request $request)
    {

        User::create([

            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        
        //$user = User::create(request(['name', 'email', 'password']));
        
        //auth()->login($user);
        
        return redirect('/user');
    }

        /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
/*     public function index()
    {
        $users = DB::table('users')->get();

        return view('pages.table_list', ['users' => $users]);
    } */
}
