<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class ContentController
{
    public function detail(Request $request, string $url)
    {
        $content = Content::where('url', $url)->first();
        $video = $content->videos->first();
        $data['video'] = $video;
        $data['content'] = $content;
        return view('content', $data);
    }
}
