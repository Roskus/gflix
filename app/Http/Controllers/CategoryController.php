<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class CategoryController
{
    public function index(Request $request, string $type)
    {
        $contents = Content::where('type', $type)->get();
        $data['contents'] = $contents;
        return view('category', $data);
    }
}
