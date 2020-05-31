<?php

namespace App\Services;

class fileUploadservices
{
    public  static function fileupload($imageFile){

        // getClientOriginalName()=拡張子を含んだファイル名の取得
        $fileNameWithExt = $imageFile->getClientOriginalName();
        // pathinfo()パスを返す optionでどの要素を返すか指定
        // 拡張子を除くファイル名取得
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        // getClientOriginalExtension()=拡張子の取得
        $extension = $imageFile->getClientOriginalExtension();

        // ファイル名と拡張子の結合(ファイル名 + 時間 + 拡張子)
        // time()は現在のタイムスタンプを返す
        $fileNameToStore = $fileName.'_'.time().'.'.$extension;

        // ここで画像ファイルの取得
        // file_get_contents(): ファイルの内容を全て文字列に読み込む
        // getRealPath()：アップロードしたファイルのパスを取得
        $fileData = file_get_contents($imageFile->getRealPath());

        $list = [$extension, $fileNameToStore, $fileData];

        return $list;
    }
}