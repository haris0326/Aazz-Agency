{{--
    Path: resources/views/components/admin/table-footer.blade.php
    Usage: <x-admin.table-footer :paginator="$categories" />
    $paginator must be a LengthAwarePaginator (->paginate()) with ->appends(request()->query()) or ->withQueryString().
--}}
@props(['paginator'])

@if($paginator->total() > 0)
<div class="ap-table-footer">
    <div>
        Showing <strong>{{ $paginator->firstItem() }}</strong>–<strong>{{ $paginator->lastItem() }}</strong>
        of <strong>{{ $paginator->total() }}</strong> records
    </div>

    <div class="d-flex align-items-center gap-3">
        <form method="GET" class="d-flex align-items-center gap-2 mb-0">
            @foreach(request()->except(['per_page', 'page']) as $key => $value)
                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endforeach
            <label class="mb-0 small text-muted">Per page</label>
            <select name="per_page" class="form-select form-select-sm" style="width:auto;" onchange="this.form.submit()">
                @foreach([15, 30, 50, 100] as $option)
                    <option value="{{ $option }}" @selected(request('per_page', 15) == $option)>{{ $option }}</option>
                @endforeach
            </select>
        </form>

        {{ $paginator->onEachSide(1)->links('vendor.pagination.admin-theme') }}
    </div>
</div>
@endif