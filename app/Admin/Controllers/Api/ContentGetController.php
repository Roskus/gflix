<?php

declare(strict_types=1);

namespace App\Admin\Controllers\Api;

use App\Models\Content;
use Illuminate\Support\Facades\Request;

class ContentGetController
{
    public function get(Request $request)
    {
        $query = $request::input('query');

        return Content::where('name', 'like', "%$query%")->limit(10)->get(['id', 'name as text']);
    }
}
