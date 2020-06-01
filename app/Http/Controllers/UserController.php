<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; //AppのUserモデルファイルを呼び出せるようにする
use Intervention\Image\Facades\Image;

use App\Services\CheckExtensionServices;
use App\Services\FileUploadServices;
use App\Http\Requests\ProfileRequest;


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

        // idがあればshowメソッド
        // compact関数 与えられた文字列の配列から、その文字列がKey。文字列の一致する変数の値の配列を返す
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findorFail($id);
        return view('users.edit', compact('user'));
    }

    public function update($id, ProfileRequest $request)
    {

        $user = User::findorFail($id);

        if(!is_null($request['img_name'])){
            $imageFile = $request['img_name'];

            $list = FileUploadServices::fileUpload($imageFile);
            list($extension, $fileNameToStore, $fileData) = $list;

            $data_url = CheckExtensionServices::checkExtension($fileData, $extension);
            $image = Image::make($data_url);
            $image->resize(400,400)->save(storage_path() . '/app/public/images/' . $fileNameToStore );

            $user->img_name = $fileNameToStore;
        }


        $user->name = $request->name; //userテーブルのname = フォームに入力されたname
        $user->email = $request->email;
        $user->sex = $request->sex;
        $user->self_introduction = $request->self_introduction;

        $user->save(); //$userを保存

        return redirect('home'); 

    }
}
