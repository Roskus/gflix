<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileDetailController extends Controller
{
    public function detail()
    {
        $user = User::find(Auth::user()->id);
        $data['user'] = $user;
        return view('profile', $data);
    }
}
