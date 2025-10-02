<?php

namespace App\Filament\Resources\Pages\Schemas;

use App\Models\Page;
use Filament\Schemas\Schema;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

// Your custom wrapper components
use Filament\Schemas\Components\Section; // wrapper that proxies to Forms Section
use Filament\Schemas\Components\Form;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        /*if (! function_exists('normalize_builder_state')) {
            function normalize_builder_state($state): array
            {
                $attempts = 0;
                while (is_string($state) && $attempts < 3) {
                    $decoded = json_decode($state, true);
                    if (json_last_error() !== JSON_ERROR_NONE) {
                        break;
                    }
                    $state = $decoded;
                    $attempts++;
                }

                if ($state === null || $state === '' || ! is_array($state)) {
                    return [];
                }

                $items = [];
                foreach ($state as $item) {
                    if (is_string($item)) {
                        $d = json_decode($item, true);
                        if (json_last_error() === JSON_ERROR_NONE) {
                            $item = $d;
                        } else {
                            continue;
                        }
                    }
                    if (is_array($item) && array_key_exists('type', $item) && array_key_exists('data', $item)) {
                        $item['data'] = is_array($item['data']) ? $item['data'] : [];
                        $items[] = $item;
                    }
                }

                return array_values($items);
            }
        }*/

        function sanitize_content_state($state): array
        {
            // Decode JSON strings
            $i = 0;
            while (is_string($state) && $i < 3) {
                $decoded = json_decode($state, true);
                if (json_last_error() !== JSON_ERROR_NONE) break;
                $state = $decoded;
                $i++;
            }

            // Already a flat map? keep it.
            if (is_array($state) && $state && array_is_list(array_keys($state)) === false) {
                return $state;
            }

            // Already rows? convert to flat map.
            if (is_array($state) && $state && isset($state[0]['k'])) {
                $out = [];
                foreach ($state as $row) {
                    $k = trim((string) ($row['k'] ?? ''));
                    if ($k === '' || array_key_exists($k, $out)) continue;
                    $type = $row['t'] ?? 'text';
                    $val  = $type === 'area'
                        ? (string) ($row['v_area'] ?? '')
                        : (string) ($row['v_text'] ?? '');
                    $out[$k] = $val;
                }
                return $out;
            }

            // Unknown shape → don’t destroy data, just return [].
            return [];
        }

        return $schema->schema([
            Section::make('Basics')
                ->columns(3)
                ->schema([
                    TextInput::make('title')
                        ->label('Title')
                        ->required()
                        ->maxLength(150)
                        ->live(onBlur: true)
                        ->afterStateUpdated(function ($state, callable $set, callable $get) {
                            if (! $get('slug')) {
                                $set('slug', Str::slug($state ?? ''));
                            }
                        }),

                    TextInput::make('slug')
                        ->label('Slug')
                        ->required()
                        ->maxLength(160)
                        ->unique(Page::class, 'slug', ignoreRecord: true)
                        ->helperText('Used in the URL (e.g., /{slug}).'),

                    Select::make('template')
                        ->label('Template')
                        // ->options(fn() => array_combine(
                        //   array_keys(Page::TEMPLATE_MAP),
                        // array_keys(Page::TEMPLATE_MAP)
                        //))
                        ->options(fn() => Page::templateMap())
                        ->required()
                        ->native(false),
                ]),

            Section::make('Publish')
                ->columns(2)
                ->schema([
                    Toggle::make('is_published')
                        ->label('Published')
                        ->afterStateUpdated(function ($state, callable $set, callable $get) {
                            if ($state && ! $get('published_at')) {
                                $set('published_at', now());
                            }
                        }),

                    DateTimePicker::make('published_at')
                        ->label('Publish At')
                        ->seconds(false)
                        ->native(false),
                ]),

            Section::make('Meta Content')
                ->columnSpanFull()
                ->schema([
                    Section::make('Meta (SEO / Social)')
                        ->schema([
                            KeyValue::make('meta')
                                ->formatStateUsing(function ($state) {
                                    if ($state === null) return [];
                                    $i = 0;
                                    while (is_string($state) && $i < 3) {
                                        $decoded = json_decode($state, true);
                                        if (json_last_error() !== JSON_ERROR_NONE) break;
                                        $state = $decoded;
                                        $i++;
                                    }
                                    return is_array($state) ? $state : [];
                                })
                                ->reorderable()
                                ->deletable(),
                        ]),
                ])
                ->columns(1),

            /*    
            Section::make('Content')
                ->columnSpanFull()
                ->schema([

                    Repeater::make('content')
                        ->label('Content')
                        ->default([])
                        ->schema([

                            TextInput::make('k')
                                ->label('Key'),
                            TextInput::make('v_short')
                                ->label('Value'),
                            Textarea::make('v_long')
                                ->label('Value')
                                ->rows(4),
                        ])
                        ->formatStateUsing(function ($state) {
                            // tolerate JSON strings 
                            $i = 0;
                            while (is_string($state) && $i < 3) {
                                $decoded = json_decode($state, true);
                                if (json_last_error() !== JSON_ERROR_NONE) break;
                                $state = $decoded;
                                $i++;
                            }
                            if (! is_array($state)) return [];
                            // already rows? 
                            if (
                                $state && isset($state[0])
                                && is_array($state[0]) && array_key_exists('k', $state[0])
                            ) {
                                return $state;
                            } // flat map-> rows
                            $rows = [];
                            foreach ($state as $k => $v_short) {
                                $rows[] = [
                                    'k' => (string) $k,
                                    //'v' => is_string($v) ? $v : (is_scalar($v) ? (string) $v : json_encode($v)), 
                                    'v_short' => is_string($v_short) ? $v_short : (is_scalar($v_short) ? (string) $v_short : json_encode($v_short)),
                                ];
                            }
                            return $rows;
                            foreach ($state as $k => $v_long) {
                                $rows[] = ['k' => (string) $k, 'v_long' => is_string($v_long) ? $v_long : (is_scalar($v_long) ? (string) $v_long : json_encode($v_long)),];
                            }
                            return $rows;
                        }) // UI rows -> DB (flat map) — this is the key hook that works in your setup 
                        ->mutateDehydratedStateUsing(function ($state) {
                            $out = [];
                            foreach ($state ?? [] as $row) {
                                if (!is_array($row)) continue;
                                $k = trim((string)($row['k'] ?? ''));
                                if ($k === '' || isset($out[$k])) continue;
                                $short = isset($row['v_short']) ? (string)$row['v_short'] : '';
                                $long = isset($row['v_long']) ? (string)$row['v_long'] : '';
                                $val = $long !== '' ? $long : $short;
                                // prefer textarea if present 
                                $out[$k] = $val;
                            }
                            return $out;
                        })
                ])
            */
            Section::make('Content')
                ->columnSpanFull()
                ->schema([
                    Repeater::make('content')
                        ->label('Content')
                        ->default([])
                        ->schema([
                            // UI-only picker of the field ID
                            Select::make('field_picker')
                                ->label('Field')
                                ->options([
                                    'title-1'     => 'Title',
                                    'subtitle-1'  => 'Subtitle',
                                    'image-1'     => 'Image URL',
                                    'paragraph-1' => 'Paragraph',
                                ])
                                ->native(false)
                                ->live()
                                ->dehydrated(false)
                                ->afterStateUpdated(function (Set $set, $state) {
                                    if (!is_string($state) || $state === '') {
                                        return;
                                    }
                                    // put the selected key into the real key
                                    $set('k', $state);

                                    // pick input type per field (default 'text')
                                    $longFields = ['paragraph-1']; // add any keys that should use the textarea
                                    $set('t', in_array($state, $longFields, true) ? 'area' : 'text');

                                    // optional: clear both values when switching type to avoid stale content
                                    $set('v_short', null);
                                    $set('v_long',  null);
                                }),

                            // hidden/internal type flag: 'text' or 'area'
                            \Filament\Forms\Components\Hidden::make('t')
                                ->default('text'),

                            TextInput::make('k')
                                ->label('Key'),

                            // short value (shows when t === 'text')
                            TextInput::make('v_short')
                                ->label('Value')
                                ->visible(fn(Get $get) => ($get('t') ?? 'text') === 'text'),

                            // long value (shows when t === 'area')
                            Textarea::make('v_long')
                                ->label('Value (long)')
                                ->rows(4)
                                ->visible(fn(Get $get) => ($get('t') ?? 'text') === 'area'),
                        ])

                        // DB (flat) -> UI (rows)  [unchanged from your version]
                        ->formatStateUsing(function ($state) {
                            $i = 0;
                            while (is_string($state) && $i < 3) {
                                $decoded = json_decode($state, true);
                                if (json_last_error() !== JSON_ERROR_NONE) break;
                                $state = $decoded;
                                $i++;
                            }
                            if (! is_array($state)) return [];

                            if ($state && isset($state[0]) && is_array($state[0]) && array_key_exists('k', $state[0])) {
                                return $state;
                            }

                            $rows = [];
                            foreach ($state as $k => $v) {
                                $rows[] = [
                                    'k'       => (string) $k,
                                    't'       => 'text', // default when reconstructing
                                    'v_short' => is_string($v) ? $v : (is_scalar($v) ? (string) $v : json_encode($v)),
                                    'v_long'  => null,
                                ];
                            }
                            return $rows;
                        })

                        // UI rows -> DB (flat map). Prefer the visible field by t; fallback to your original rule.
                        ->mutateDehydratedStateUsing(function ($state) {
                            $out = [];
                            foreach (($state ?? []) as $row) {
                                if (! is_array($row)) continue;

                                $k = trim((string)($row['k'] ?? ''));
                                if ($k === '' || isset($out[$k])) continue;

                                $t     = (string)($row['t'] ?? 'text');
                                $short = isset($row['v_short']) ? (string)$row['v_short'] : '';
                                $long  = isset($row['v_long'])  ? (string)$row['v_long']  : '';

                                // choose by type; fallback keeps your old “prefer long if present” behavior
                                $val = $t === 'area' ? $long : $short;
                                if ($val === '') {
                                    $val = $long !== '' ? $long : $short;
                                }

                                $out[$k] = $val;
                            }
                            return $out;
                        }),
                ]),
        ]);
    }
}
