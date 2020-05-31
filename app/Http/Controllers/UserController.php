<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /* 
    引数を$idとすることで users/show/3 のようにアクセスすると
    そのUserテーブルが引っ張ってこれる
    */

    public function show($id) 
    {
        return view('users.show');
    }
}
