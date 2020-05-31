<?php

namespace App\Services;

class CheckExtensionServices
{
    public static function checkExtension($fileData, $extension) {
        // 文字列を小文字にする (引数と変数を同じにする)
        $extension = mb_strtolower($extension);

        // base64_encode()->エンコード(符号化、暗号化)するPHP関数
        if ($extension === 'jpg'){
            $data_url = 'data:image/jpg;base64,'. base64_encode($fileData);
          }
      
          if ($extension === 'jpeg'){
            $data_url = 'data:image/jpg;base64,'. base64_encode($fileData);
          }
      
          if ($extension === 'png'){
            $data_url = 'data:image/png;base64,'. base64_encode($fileData);
          }
      
          if ($extension === 'gif'){
            $data_url = 'data:image/gif;base64,'. base64_encode($fileData);
          }
      
          return $data_url;
       
    }
}

