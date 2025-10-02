<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;

class Spirit extends Model
{
    /** @use HasFactory<\Database\Factories\SpiritFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'slug',
        'name',
        'image_path',
        'trademark',
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
    ];
    protected $casts = [
        'gallery' => 'array',
        'grape_variety' => 'array',
        'abv' => 'decimal:2',
    ];
    protected $attributes = [
        'gallery' => '[]',
        'grape_variety' => '[]',
    ];
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
    protected static function makeUniqueSlug(Spirit $spirit): string
    {
        $base = Str::slug("{$spirit->trademark}-{$spirit->name}-{$spirit->making}");
        $slug = $base;
        $i = 2;

        // If you used the composite unique (slug, deleted_at) and want to
        // allow reusing slugs after soft-delete, use withoutTrashed():
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
                        ->orWhere('region', 'like', "%{$v}%")
                        ->orWhere('appellation', 'like', "%{$v}%")
                )
            )
            ->when($f['trademark'] ?? null, fn($q, $v) => $q->where('trademark', $v))
            ->when($f['making'] ?? null, fn($q, $v) => $q->where('making', $v));
    }
}
