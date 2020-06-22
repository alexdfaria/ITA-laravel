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

        $user = new User;
        $user->name = $request->name;  
        $user->password = $request->password;  
        $emailAsAValueObject = new Email($request->email);
        $user->setEmail($emailAsAValueObject);
        $user->save();
        
        return redirect('/user');
    }
}

Class Email {
    
    private $email;

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
    }
}
