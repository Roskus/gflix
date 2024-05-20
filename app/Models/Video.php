<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'video';

    protected $fillable = [
        'src',
        'lang',
        'path',
        'slug',
        'name',
        'description',
        'poster',
        'duration',
    ];

    public function content()
    {
        return $this->hasOne(Content::class, 'id', 'content_id');
    }
}
