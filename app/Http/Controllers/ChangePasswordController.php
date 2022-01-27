<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class ChangePasswordController extends Controller
{
    public function changePassword(Request $request, User $user){

        $request->validate([
           'password' => ['required', 'string', 'confirmed']
        ]);

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('users.index')->with('message', 'Users password updated successfully');
    }
}
