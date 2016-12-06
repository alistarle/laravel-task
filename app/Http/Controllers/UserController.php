<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Return list of all user
     *
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index(Request $request)
    {
        return User::all();
    }
}
