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
        'content_id',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            if ($model->isDirty('poster') && $model->poster) {
                $content = $model->content;
                if ($content) {
                    $model->poster = self::reorganizeImagePath($model->poster, $content->type, $content->year);
                }
            }
        });
    }

    public function content()
    {
        return $this->hasOne(Content::class, 'id', 'content_id');
    }

    public function getPosterPathAttribute()
    {
        if (!$this->poster) {
            return null;
        }
        if (strpos($this->poster, '/') !== false) {
            return $this->poster;
        }
        return "images/{$this->poster}";
    }

    private static function reorganizeImagePath($filename, $type, $year)
    {
        if (strpos($filename, '/') !== false) {
            return $filename;
        }

        $source = storage_path("app/public/images/{$filename}");
        $year = $year ?? date('Y');
        $targetDir = storage_path("app/public/images/{$type}/{$year}");
        $target = "{$targetDir}/{$filename}";

        if (file_exists($source)) {
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0755, true);
            }
            rename($source, $target);
        }

        return "images/{$type}/{$year}/{$filename}";
    }
}
