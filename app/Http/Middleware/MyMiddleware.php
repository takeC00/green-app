<?php

namespace App\Http\Middleware;

use App\Facades\MyService;
use App\MyClasses\MyService as MyClassesMyService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // before
        $id = rand(0, count(MyService::alldata()));
        MyService::setId($id);
        $merge_data = [
            'id' => $id,
            'msg' => MyService::say(),
            'alldata' => MyService::alldata(),
        ];
        $request->merge($merge_data);

        $response = $next($request);

        // after
        $content = $response->content();
        $content .= '
            <style>
                body { background-color: #ggf; }
                p { font-size: 18px; }
                li{ color: red; font-weight: bold;}
            </style>
        ';
        $response->setContent($content);

        return $response;
    }
}
