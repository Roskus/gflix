<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = 'content';

    public function getLatest($limit = 5)
    {
	    return Content::orderBy('created_at','DESC')->limit($limit)->get();
    }
}
