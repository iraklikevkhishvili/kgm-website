<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Image\Manipulations;

class Wine extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $fillable = [
        'slug',
        'name',
        'trademark',
        'color',
        'category',
        'making',
        'region',
        'appellation',
        'serving_temperature',
        'food_pairings',
        'acidity',
        'tannins',
        'closure',
        'volume',
        'bottle',
        'description_pdf',
        'description',
        'visual',
        'aroma',
        'taste',
        'abv',
        'grape_variety',
    ];

    protected $casts = [
        'grape_variety' => 'array',
        'abv' => 'decimal:2',
    ];

    // Optional: auto-include URLs when ->toArray() / API
    protected $appends = ['hero_url', 'gallery_urls'];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    protected static function booted(): void
    {
        static::creating(function (Wine $wine) {
            $wine->slug ??= static::makeUniqueSlug($wine);
        });

        // Keep URLs stable by default. If you DO want to regenerate, remove blank() guard.
        static::updating(function (Wine $wine) {
            if ($wine->isDirty(['trademark', 'name', 'making']) && blank($wine->slug)) {
                $wine->slug = static::makeUniqueSlug($wine);
            }
        });

        parent::booted();

        static::saved(function ($wine) {
            logger()->debug('Wine saved; hero count', [
                'media_count' => $wine->getMedia('hero')->count(),
            ]);
        });
    }

    protected static function makeUniqueSlug(Wine $wine): string
    {
        $base = Str::slug("{$wine->trademark}-{$wine->name}-{$wine->making}");
        $slug = $base;
        $i = 2;

        while (static::withoutTrashed()->where('slug', $slug)->exists()) {
            $slug = "{$base}-{$i}";
            $i++;
        }
        return $slug;
    }

    public function scopeFilter(Builder $q, array $f): Builder
    {
        return $q
            ->when(
                $f['q'] ?? null,
                fn($q, $v) =>
                $q->where(
                    fn($w) =>
                    $w->where('name', 'like', "%{$v}%")
                        ->orWhere('trademark', 'like', "%{$v}%")
                        ->orWhere('color', 'like', "%{$v}%")
                        ->orWhere('region', 'like', "%{$v}%")
                        ->orWhere('appellation', 'like', "%{$v}%")
                )
            )
            ->when($f['trademark'] ?? null, fn($q, $v) => $q->where('trademark', $v))
            ->when($f['color'] ?? null, fn($q, $v) => $q->where('color', $v))
            ->when($f['category'] ?? null, fn($q, $v) => $q->where('category', $v))
            ->when($f['making'] ?? null, fn($q, $v) => $q->where('making', $v));
    }

    /** Spatie media collections */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('hero')->singleFile();
    }


    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('web')
            ->format('webp')                 // doesn’t need Manipulations
            ->nonQueued()
            ->performOnCollections('hero');

        // Now add one line that uses the class:
        $this->addMediaConversion('crop-test')
            //->fit(Manipulations::FIT_CROP, 400, 400)
            ->nonQueued()
            ->performOnCollections('hero');
    }

    /** Convenience accessors */
    public function getHeroUrlAttribute(): ?string
    {
        $media = $this->getFirstMedia('hero');
        if (!$media) {
            return null;
        }

        // If bucket is public:
        return $media->getUrl('web') ?: $media->getUrl();

        // If bucket is private, use this instead:
        // return $media->getTemporaryUrl(now()->addMinutes(10), 'web') ?? $media->getTemporaryUrl(now()->addMinutes(10));
    }

    /** @return array<string> */
    public function getGalleryUrlsAttribute(): array
    {
        $urls = [];
        foreach ($this->getMedia('gallery') as $m) {
            $urls[] = $m->getUrl('thumb') ?: $m->getUrl();
            // For private buckets, use getTemporaryUrl(...)
        }
        return $urls;
    }
}
