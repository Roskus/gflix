<?php

namespace App\Admin\Controllers\Api;

use Illuminate\Support\Facades\Request;
use App\Models\Content;

class ContentGetController
{
    public function get(Request $request)
    {
        $query = $request::input("query");
        return Content::where('name', 'like', "%$query%")->limit(10)->get(['id', 'name as text']);
    }
}
