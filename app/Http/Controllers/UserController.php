<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\StoreData;
use App\Http\Requests\StoreEmail;
use App\Http\Requests\StorePassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getUser()
    {
        return User::find(auth()->user()->id);
    }

    public function logoutUser()
    {
        Auth::logout();

        return redirect('/');
    }

    public function showUser()
    {
        return view('users.show',[
            'user'=> $this->getUser(),
            'title'=>'- moje konto'
        ]);
    }

    public function editUser()
    {
        return view('users.edit',[
            'user'=>$this->getUser(),
            'title'=>'- edycja profilu'
        ]);
    }

    public function storeUserData(StoreData $request)
    {
        $user = $this->getUser();
        $user->nick = $request->input('nick');
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->save();

        return redirect('/myAccount');
    }

    public function storeUserEmail(StoreEmail $request)
    {
        $user = $this->getUser();
        $user->email = $request->input('email');
        $user->save();

        return redirect('/myAccount');
    }

    public function storeUserPassword(StorePassword $request)
    {
        $user = $this->getUser();
        $user->password = Hash::make($request->input('new_password'));
        $user->save();

        return redirect('/myAccount');
    }

    public function deleteUser()
    {
        if ($this->getUser()->delete())
        {
            Auth::logout();
        }
    }
}
