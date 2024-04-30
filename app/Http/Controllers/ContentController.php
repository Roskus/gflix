<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ContentController
{
    public function detail(Request $request, string $url)
    {
        $content = Content::where('url', $url)->first();
        $video = $content->videos->first();
        $data['video'] = $video;
        $data['content'] = $content;

        View::share('title', $content->name);
        return view('content', $data);
    }
}
