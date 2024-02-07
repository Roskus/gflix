<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Content extends Model
{
    protected $table = 'content';

    protected $fillable = [
        // Otros atributos asignables masivamente
        'type',
        ''
    ];
    public function getLatest($limit = 5)
    {
	    return Content::orderBy('created_at', 'DESC')->limit($limit)->get();
    }

    public function videos(): HasMany
    {
        return $this->hasMany(Video::class);
    }
}
