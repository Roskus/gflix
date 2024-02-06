<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'video';

    public function content()
    {
        return $this->hasOne(Content::class, 'id', 'content_id');
    }
}
