<?php

namespace App\Http\Controllers\Api;

use App\Models\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {

        // $users = User::Orderby('id', 'desc')->paginate();
        //  $users = User::all();
        // return view('users.index', compact('users'));

        $roles = Role::all();

        return $roles;
    }
}
