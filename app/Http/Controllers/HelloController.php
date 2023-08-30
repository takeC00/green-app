<?php

namespace App\Http\Controllers;

use App\Facades\MyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{
    public function index()
    {
            $msg = 'get name people records';

            //$result = DB::table('people')->where('name','like','%'.$id.'%')->get();

            //whereRaw
            //SQLクエリーをパラメータで送られてきた$idと繋ぎ合わせてるので$idが不正な値でないかをチェックする必要がある
            //$result = DB::table('people')->whereRaw('name like "%'.$id.'%"')->get();

            //whereRaw(安全ver)
            //プレースホルダーでパラメータを組み込むように修正
            //$result = DB::table('people')->whereRaw('name like ?', ['%'.$id.'%'])->get();

            //最初のレコード
            $first = DB::table('people')->first();
            //最後のレコード
            $last = DB::table('people')->orderBy('id', 'desc')->first();
            $result = [$first, $last];


        $data = [
            'msg' => $msg,
            'data' => $result,
        ];
        return view('hello.index', $data);
    }

    public function other()
    {
        $data = [
            'name' => 'Taro',
            'mail' => 'taro@yamada',
            'tel' => '090-0000-0000'
        ];

        $query_str = http_build_query($data);
        $data['msg'] = $query_str;
        return redirect()->route('hello', $data);
    }
}
