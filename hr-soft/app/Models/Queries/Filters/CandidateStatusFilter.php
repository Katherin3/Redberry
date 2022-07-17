<?php

namespace App\Models\Queries\Filters;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class CandidateStatusFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $property): void
    {
        $query->whereHas('status', function($q) use($value) {
            $q->where('name', $value);
        });
    }
}
