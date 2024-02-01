<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class WatchController extends Controller
{
    public function player(Request $request, int $id)
    {
        $content = Content::find($id);
        $data['content'] = $content;
        return view('player', $data);
    }
}
