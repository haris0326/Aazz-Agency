
@if($reviews->hasPages())

    <div class="mt-12">
        {{ $reviews->links() }}
    </div>

@endif
