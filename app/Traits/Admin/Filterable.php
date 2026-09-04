<?php

/**
 * Path: app/Traits/Admin/Filterable.php
 *
 * Reusable search + filter + sort + pagination logic for admin Index pages.
 * Use it in any admin controller instead of rewriting the same query building
 * code 20 times.
 *
 * ------------------------------------------------------------------
 * USAGE (inside e.g. CategoryController):
 *
 *     use App\Traits\Admin\Filterable;
 *
 *     class CategoryController extends Controller
 *     {
 *         use Filterable;
 *
 *         public function index(Request $request)
 *         {
 *             $categories = $this->applyFilters(
 *                 Category::query(),
 *                 $request,
 *                 searchable: ['name', 'slug'],
 *                 filters: ['status'],           // simple ->where('status', $value)
 *                 sortable: ['name', 'status', 'created_at'],
 *                 defaultSort: 'created_at',
 *                 defaultDirection: 'desc',
 *             )->paginate($request->integer('per_page', 15))->withQueryString();
 *
 *             return view('admin_panel.category.index', compact('categories'));
 *         }
 *     }
 * ------------------------------------------------------------------
 */

namespace App\Traits\Admin;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

trait Filterable
{
    /**
     * @param  Builder  $query
     * @param  Request  $request
     * @param  array<int,string>  $searchable  Columns eligible for the free-text search box
     * @param  array<int,string>  $filters     Simple equality filters, e.g. ['status', 'category_id']
     * @param  array<int,string>  $sortable    Whitelisted sortable columns (never trust request('sort') directly)
     */
    protected function applyFilters(
        Builder $query,
        Request $request,
        array $searchable = [],
        array $filters = [],
        array $sortable = ['created_at'],
        string $defaultSort = 'created_at',
        string $defaultDirection = 'desc'
    ): Builder {
        // ---- Search (case-insensitive, across all searchable columns) ----
        if ($request->filled('search') && !empty($searchable)) {
            $term = trim($request->string('search'));
            $query->where(function (Builder $q) use ($searchable, $term) {
                foreach ($searchable as $column) {
                    $q->orWhereRaw('LOWER(' . $column . ') LIKE ?', ['%' . mb_strtolower($term) . '%']);
                }
            });
        }

        // ---- Simple equality filters (status, category_id, etc.) ----
        foreach ($filters as $field) {
            if ($request->filled($field)) {
                $query->where($field, $request->input($field));
            }
        }

        // ---- Optional date range filter: ?date_from=&date_to= ----
        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date('date_from'));
        }
        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date('date_to'));
        }

        // ---- Sorting (whitelisted, defaults to newest first) ----
        $sort = $request->input('sort', $defaultSort);
        $direction = $request->input('direction', $defaultDirection);
        $direction = in_array(strtolower($direction), ['asc', 'desc']) ? $direction : $defaultDirection;

        if (!in_array($sort, $sortable, true)) {
            $sort = $defaultSort;
        }

        $query->orderBy($sort, $direction);

        return $query;
    }

    /**
     * Helper for bulk actions: comma-separated ids posted from the bulk form.
     * Usage: $ids = $this->parseBulkIds($request);
     */
    protected function parseBulkIds(Request $request, string $field = 'ids'): array
    {
        return array_filter(explode(',', (string) $request->input($field, '')));
    }
}