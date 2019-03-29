<?php

namespace App\Http\Controllers;

use App\Users;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = Users::all();

        return view('index', ['users' => $users]);
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
            $users->password = $request->input('password');
            $users->email = $request->input('email');
            $users->save();
        }
        return redirect()->route('index');

    }

    public function edit($id)
    {
        $user = Users::findOrFail($id);
        return view('edit', ['user' => $user]);
    }

    public function update($id, Request $request)
    {
        if ($request->isMethod('post')) {
            $user = Users::find($id);
            $user->name = $request->input('name');
            $user->password = $request->input('password');
            $user->email = $request->input('email');
            $user->save();
        }
        return redirect()->route('index');
    }

    public function delete($id)
    {
        Users::find($id)->delete();
        return redirect()->route('index');
    }
}
