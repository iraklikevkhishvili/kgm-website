<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class Page extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    protected $fillable = ['title', 'slug', 'template', 'is_published', 'published_at', 'content', 'meta'];
    protected $casts = [
        'content' => 'array',
        'meta' => 'array',
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    // Whitelist templates -> Blade views (prevents path traversal)
    public const TEMPLATE_MAP = [
        'home'   => 'pages.dynamic.home',    // resources/views/pages/dynamic/about.blade.php
        'about' => 'pages.dynamic.about',
        'story' => 'pages.dynamic.story',
        'company' => 'pages.dynamic.company',
        'team' => 'pages.dynamic.team',
        'export' => 'pages.dynamic.export',
        'winemaking' => 'pages.dynamic.winemaking',
        'winery' => 'pages.dynamic.winery',
        'vineyards' => 'pages.dynamic.vineyards',
        'awards' => 'pages.dynamic.awards',
        // add more as needed
    ];
    public static function templateMap(): array
    {
        $basePath = resource_path('views/pages/templates');
        $files = File::files($basePath);

        $map = [];

        foreach ($files as $file) {
            $filename = $file->getFilenameWithoutExtension(); // e.g. 'about'
            $name = Str::before($filename, '.blade');

            $viewPath = 'pages.templates.' . $name;

            $label = ucfirst(str_replace('-', ' ', $name));
            //$map[$name] = 'pages.dynamic.' . $name;
            $map[$viewPath] = $label;
        }

        return $map;
    }

    public function getViewPathAttribute(): string
    {
        return self::TEMPLATE_MAP[$this->template] ?? 'pages.dynamic.default';
    }

    public function scopePublished($q)
    {
        return $q->where('is_published', true)
            ->where(function ($q) {
                $q->whereNull('published_at')->orWhere('published_at', '<=', now());
            });
    }

    // Convenience helpers
    public function contentGet(string $key, $default = null)
    {
        return Arr::get($this->content ?? [], $key, $default);
    }

    protected static function booted()
    {
        static::saving(function ($model) {
            Log::debug('Page->content on saving', ['content' => $model->content]);
        });
    }
}
