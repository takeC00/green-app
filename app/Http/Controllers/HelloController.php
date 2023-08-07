<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HelloController extends Controller
{
    private $fname;

    function __construct()
    {
        $this->fname = 'hello.txt';
    }

    public function index(Request $request)
    {
        $msg = 'please input text';
        $keys = [];
        $values = [];
        if($request->isMethod('post'))
        {
            $form = $request->all();
            $keys = array_keys($form);
            $values = array_values($form);
        }
        $data = [
            'msg' => $msg,
            'keys' => $keys,
            'values' => $values,
        ];

        return view('hello.index', $data);
    }
}
