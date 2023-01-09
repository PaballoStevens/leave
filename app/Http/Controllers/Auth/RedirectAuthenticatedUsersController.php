<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RedirectAuthenticatedUsersController extends Controller
{
    public function home()
    {
        if (auth()->user()->user_type == 'admin') {
            return redirect('/admin');
        }
        elseif(auth()->user()->user_type == 'Staff'){
            return redirect('/staff');
        }
       
        else{
            return auth()->logout();
        }
    }
}
