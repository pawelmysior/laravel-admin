<?php

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

function attribute(string $name): string
{
    return ucfirst(__("validation.attributes.{$name}"));
}

function dictionary(string $name, string $valueColumn = 'name', string $keyColumn = 'id'): Collection
{
    $modelClass = 'App\\' . Str::studly(Str::singular($name));

    return $modelClass::get()->pluck($valueColumn, $keyColumn);
}
