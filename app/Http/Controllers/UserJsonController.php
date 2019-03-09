<?php

namespace App\Http\Controllers;

use App\Users;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Requests\UserRequest;


class UserJsonController extends Controller
{
    public function index()
    {
        $users = Users::all();

        return response()->json([$users]);
    }

    public function edit($id)
    {
        $user = Users::find($id);

        if ($user instanceof Users) {
            return response()->json([$user], 200);

        } else {
            return response()->json(['errors' => ['Not found user with given ID.']], 404);
        }
    }

    public function store(UserRequest $request)
    {
        $user = new Users();
        $user->name = $request->input('name');
        $user->last_name = $request->input('last_name');
        $user->password = $request->input('password');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->save();

        return response()->json($user, 201);

    }


    public function update($id, UserRequest $request)
    {
        $user = Users::find($id);
        if ($user instanceof Users) {
            $user->name = $request->input('name');
            $user->last_name = $request->input('last_name');
            $user->password = $request->input('password');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->address = $request->input('address');
            $user->save();
            return response()->json($user, 201);
        }
        else {
            return response()->json(['errors' => ['Not found user with given ID.']], 404);
        }
    }

    public function destroy($id)
    {
        $user = Users::find($id);
        if ($user instanceof Users) {
        $user->destroy($id);
        return response()->json(['message' => 'User ' .$id. ' deleted'], 200);
        } else {
            return response()->json(['errors' => ['Not found user with given ID.']], 404);

        }
    }
}
