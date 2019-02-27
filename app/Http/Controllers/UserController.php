<?php

namespace App\Http\Controllers;

use App\User;
use App\Users;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function index()
    {
        $users = Users::all();

        return response()->json(['users' => $users]);
  }


    public function create()
    {
        return view('create');
    }

    public function createRequest(Request $request)
    {
        if ($request->isMethod('post')) {
            $users = new Users();
            $users->name = $request->input('name');
            $users->last_name = $request->input('last_name');
            $users->password = $request->input('password');
            $users->email = $request->input('email');
            $users->phone = $request->input('phone');
            $users->address = $request->input('address');
            $users->save();
        }
        return redirect()->route('index');

    }

    public function edit($id)
    {
        $user = Users::findOrFail($id);

        return \response()->json(['user' => $user]);
//        return view('edit', ['user' => $user]);
    }

    public function update($id, Request $request)
    {
        if ($request->isMethod('post')) {
            $user = Users::find($id);
            $user->name = $request->input('name');
            $user->last_name = $request->input('last_name');
            $user->password = $request->input('password');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->address = $request->input('address');
            $user->save();
        }
        return redirect()->route('index');
    }

    public function delete($id){
        Users::find($id)->delete();
        return redirect()->route('index');
    }
}
