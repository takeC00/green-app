<?php

namespace App\Http\Controllers;

use App\Facades\MyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{
    public function index($id = -1)
    {
        if($id >= 0)
        {
            $msg = 'get ID <= ' . $id;
            $result = DB::table('people')->where('id', '<=', $id)->get();
        }
        else
        {
            $msg = 'get people records.';
            $result = DB::table('people')->get();
        }
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
