<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CategoryController
{
    public function index(Request $request, string $type)
    {
        $contents = Content::where('type', $type)->get();
        $data['contents'] = $contents;

        View::share('title', ucfirst($type));
        return view('category', $data);
    }
}
