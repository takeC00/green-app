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

    public function index()
    {

        //URLを得る
        //Storage::url
        //ファイルサイズを得る
        //Storage::size
        //最終更新日時を得る
        //Storage::lastModified,

        $url = Storage::disk('public')->url($this->fname);
        $size = Storage::disk('public')->size($this->fname);
        $modified = Storage::disk('public')->lastModified($this->fname);
        $modified_time = date('y-m-d H:i:s', $modified);
        $sample_keys = ['url', 'size', 'modified'];
        $sample_meta = [$url, $size, $modified_time];
        $result = '<table><tr><th>' . implode('</th><th>',$sample_keys).'</th></tr>';
        $result .= '<tr><td>'.implode('</td><td>',$sample_meta).'</td></tr></table>';

        $sample_data = Storage::disk('public')->get($this->fname);

        $data = [
            'msg' => $result,
            'data' => explode(PHP_EOL, $sample_data)
        ];

        return view('hello.index', $data);
    }

    public function other(Request $request)
    {
        Storage::disk('local')->putFile('files', $request->file('file'));
        return redirect()->route('hello');
    }
}
