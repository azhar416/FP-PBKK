<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function showProfile(){
        $user_id = Auth::user()->id;
        return view('dashboard.profile', [
            'user' => User::findOrFail($user_id),
        ]);
    }
}
