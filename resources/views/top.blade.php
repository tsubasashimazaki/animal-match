<!-- layoutファイルの読み込み -->
@extends('layouts.app')

@section('content')<!-- それぞれのファイル内容ここから -->
<div class="loginPage">
  <div class="container">
    <div class="loginPage_contents">
    <h1 class="h3 loginPage_contents_title">わんにゃん広場</h1>
    <div class="btn loginPage_contents_btn"><a class="text-white" href="{{ route('login') }}">メールアドレスでログインする</a></div>
    </div>
  </div>
</div>
@endsection<!-- ここまで -->