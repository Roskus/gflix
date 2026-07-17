<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Content extends Model implements Sortable
{
    use SortableTrait;

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

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            if ($model->isDirty('cover') && $model->cover) {
                $model->cover = self::reorganizeImagePath($model->cover, $model->type, $model->year);
            }
        });
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

    public $sortable = [
        'order_column_name' => 'name',
        'sort_when_creating' => true,
    ];

    public function getCoverPathAttribute()
    {
        if (!$this->cover) {
            return null;
        }
        if (strpos($this->cover, '/') !== false) {
            return $this->cover;
        }
        return "images/{$this->cover}";
    }

    public function getWallpaperPathAttribute()
    {
        if (!$this->wallpaper) {
            return null;
        }
        if (strpos($this->wallpaper, '/') !== false) {
            return $this->wallpaper;
        }
        return "images/{$this->wallpaper}";
    }

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
