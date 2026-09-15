<?php

namespace App\Http\Controllers\locations\Concerns;

use Illuminate\Support\Str;

trait BulkSlugCreator
{
    /**
     * Turns "Lahore, Karachi , Islamabad" into
     * [['name' => 'Lahore', 'slug' => 'lahore'], ...] — deduplicated, trimmed.
     */
    protected function parseCommaSeparatedNames(string $input): array
    {
        $names = array_filter(array_map('trim', explode(',', $input)));
        $names = array_unique($names);

        return array_map(fn ($name) => [
            'name' => $name,
            'slug' => Str::slug($name),
        ], array_values($names));
    }
}