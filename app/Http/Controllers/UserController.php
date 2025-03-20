<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('home', ['users' => $users]);
    }
    public function store(Request $request){
        User::create($request->all());
        return redirect()->route('home')->with('success', 'User updated succesfully');

    }
    public function update(Request $request, $id){

        dump($request->all());
            $user = User::find($id);
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'age' => $request->age,
                'phone' => $request->phone,
                'city' => $request->city,
            ]);
            return redirect()->route('home')->with('success', 'User updated succesfully');
    }

    public function destroy($id){
        $user = User::find($id);
        // $user->delete();
        if ($user->delete()) {
            return redirect()->route('home')->with('success', 'User deleted successfully.');
        } else {
            return redirect()->route('home')->with('error', 'Failed to delete user.');
        }
    }
}

