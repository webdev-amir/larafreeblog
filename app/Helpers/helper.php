<?php

function getRouteKeyName(): string
{
    return 'slug';
}

function createUniqueSlug($title, $model)
{
    $slug = Str::slug($title);
    $model= ucfirst($model);
    $model = "App\Models\\{$model}";
    $count = $model::where('slug', 'LIKE', "{$slug}%")->count();
    return $count ? "{$slug}-{$count}" : $slug;
}

function pre($data, $die = true)
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
    if ($die) {
        die();
    }
}
