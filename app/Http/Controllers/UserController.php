<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; //AppのUserモデルファイルを呼び出せるようにする

class UserController extends Controller
{
    /* 
    引数を$idとすることで users/show/3 のようにアクセスすると
    そのUserテーブルが引っ張ってこれる
    ーーーーーーーーーーーーーーーーーーーーーーーーーー
    Eloquent(エロクアント)
    モデルファイル::メソッド名(引数)
    これでDBの情報を簡単に取得可能
    ーーーーーーーーーーーーーーーーーーーーーーーーーー
    */

    public function show($id) 
    {
        $user = User::findorFail($id);        
        // dd($user);

        return view('users.show', compact('user'));
    }
}
