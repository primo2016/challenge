<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersRolesController extends Controller
{
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);

        return back()->withFlash('Los roles han sido actualizados');
    }
}
