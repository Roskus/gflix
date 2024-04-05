<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Content extends Model
{
    protected $table = 'content';

    protected $fillable = [
        'name',
        'category_id',
        'cover',
        'wallpaper',
        'description',
        'year',
        'trailer_url',
        'url',
        'type',
    ];
    public function getLatest($limit = 5)
    {
	    return Content::orderBy('created_at', 'DESC')->limit($limit)->get();
    }

    public function category(): HasOne
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function videos(): HasMany
    {
        return $this->hasMany(Video::class)->orderBy('name');
    }
}
