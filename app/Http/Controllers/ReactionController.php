<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// リレーションする際は紐づけるテーブルが全て必要なのかな...
use App\User;
use App\Reaction;
use App\Constants\Status;

use Log; //Logファサードを使えるように

class ReactionController extends Controller
{
    // Request:ただのクラス
    // $request:ブラウザを通してユーザーから送られてくる情報全て含んでいるオブジェクト,インスタンス
    // hoge(Request $request)はサービスプロバイダにより自動インスタンス化されたもの ありがとう
    public function create(Request $request){
        
        Log::debug($request); // POST通信で渡ってきた内容をログに出力するようにする(デバックバーにも出力可能)


        // POST通信で渡ってきた$requestをそれぞれ変数にセット
        $to_user_id = $request->to_user_id;
        $like_status = $request->reaction;
        $from_user_id = $request->from_user_id;

        if ($like_status === 'like'){
            $status = Status::LIKE;
        }else{
            $status = Status::DISLIKE;
        }

        $checkReaction = Reaction::where([
            ['to_user_id', $to_user_id],
            ['from_user_id', $from_user_id]
        ])->get();

        if($checkReaction->isEmpty()){

            $reaction = new Reaction();

            $reaction->to_user_id = $to_user_id;
            $reaction->from_user_id = $from_user_id;
            $reaction->status = $status; 

            $reaction->save();
        }
    }

}
