<?php

namespace App\Media;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\PathGenerator\PathGenerator;

class KgmPathGenerator implements PathGenerator
{
    /** Counters for this request */
    private static int $callsGet = 0;
    private static int $callsConv = 0;
    private static int $callsResp = 0;
    private static bool $shutdownHookRegistered = false;

    /** Simple per-media caches */
    private static array $bucketCache = []; // [mediaId => 'wines']
    private static array $slugCache   = []; // [mediaId => 'annata-cabernet-classic']

    public function getPath(Media $media): string
    {
        self::bump('get');
        return $this->basePath($media);
    }

    public function getPathForConversions(Media $media): string
    {
        self::bump('conv');
        return $this->basePath($media) . 'conversions/';
    }

    public function getPathForResponsiveImages(Media $media): string
    {
        self::bump('resp');
        return $this->basePath($media) . 'responsive-images/';
    }

    /** ---------- internals ---------- */

    private function basePath(Media $media): string
    {
        $year   = now()->format('Y');
        $bucket = $this->bucketForModel($media);
        $slug   = $this->slugForModel($media);

        return "{$year}/{$bucket}/{$slug}/";
    }

    private function bucketForModel(Media $media): string
    {
        $key = $this->mediaKey($media);
        if (isset(self::$bucketCache[$key])) {
            return self::$bucketCache[$key];
        }

        $model  = $media->model;
        $bucket = 'misc';

        if ($model instanceof \App\Models\Wine || $media->collection_name === 'wines' || $media->collection_name === 'hero') {
            $bucket = 'wines';
        } elseif ($model instanceof \App\Models\Spirit || $media->collection_name === 'spirits') {
            $bucket = 'spirits';
        }

        return self::$bucketCache[$key] = $bucket;
    }

    private function slugForModel(Media $media): string
    {
        $key = $this->mediaKey($media);
        if (isset(self::$slugCache[$key])) {
            return self::$slugCache[$key];
        }

        $model  = $media->model;
        $pieces = [];

        foreach (['trademark', 'name', 'title'] as $attr) {
            if (isset($model->{$attr}) && is_string($model->{$attr}) && $model->{$attr} !== '') {
                $pieces[] = $model->{$attr};
            }
        }

        if (! empty($pieces)) {
            $slug = Str::slug(implode(' ', $pieces));
        } else {
            $fallbackId = method_exists($model, 'getKey') ? (string) $model->getKey() : (string) $media->model_id;
            $slug = Str::slug(class_basename($model)) . '-' . $fallbackId;
        }

        return self::$slugCache[$key] = $slug;
    }

    private function mediaKey(Media $media): string
    {
        return $media->id ? ('m' . $media->id) : ('o' . spl_object_id($media));
    }

    private static function bump(string $which): void
    {
        if (! self::$shutdownHookRegistered && self::loggingEnabled()) {
            self::$shutdownHookRegistered = true;

            // Single summary line at end of request
            register_shutdown_function(function () {
                Log::debug('KgmPathGenerator:summary', [
                    'getPath_calls'                    => self::$callsGet,
                    'getPathForConversions_calls'      => self::$callsConv,
                    'getPathForResponsiveImages_calls' => self::$callsResp,
                ]);
            });
        }

        match ($which) {
            'get'  => self::$callsGet++,
            'conv' => self::$callsConv++,
            'resp' => self::$callsResp++,
            default => null,
        };
    }

    private static function loggingEnabled(): bool
    {
        // opt-in via env to avoid any overhead in prod
        return filter_var(env('KGM_MEDIA_LOG', false), FILTER_VALIDATE_BOOLEAN);
    }
}
