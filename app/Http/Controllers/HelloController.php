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
        $this->fname = 'sample.txt';
    }

    public function index()
    {
        $sample_msg = $this->fname;
        $sample_data = Storage::get($this->fname);
        $sample_data = explode(PHP_EOL, $sample_data);
        unset($sample_data[1]);
        $data = [
            'msg' => $sample_msg,
            'data' => $sample_data
        ];

        return view('hello.index', $data);
    }

    public function other($msg)
    {
        $data = Storage::get($this->fname) . PHP_EOL . $msg;
        Storage::put($this->fname, $data);
        return redirect()->route('hello');
    }
}
