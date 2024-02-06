<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Video;
use Illuminate\Http\Request;

class WatchController extends Controller
{
    public function player(Request $request, int $id)
    {
        $video = Video::findOrFail($id);
        $data['video'] = $video;
        return view('player', $data);
    }
}
