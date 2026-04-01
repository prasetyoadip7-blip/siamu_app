<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        return view('profile.index', compact('user'));
    }

    public function update(Request $request)
    {

        $user = Auth::user();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->back()->with('success','Profile berhasil diperbarui');

    }

}