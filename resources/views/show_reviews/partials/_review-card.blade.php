@php
    $image = $review->user_image
        ? (
            filter_var($review->user_image, FILTER_VALIDATE_URL)
            ? $review->user_image
            : asset($review->user_image)
        )
        : 'https://ui-avatars.com/api/?name=' . urlencode($review->user_name ?? 'Client') . '&background=eff6ff&color=2563eb';
@endphp

<article
    class="group flex h-full flex-col rounded-2xl border border-slate-200/80 bg-white p-6 transition-all duration-300 hover:-translate-y-1 hover:border-blue-200 hover:shadow-xl hover:shadow-blue-900/5">

    <div class="mb-4 flex items-center justify-between">
        <div class="flex items-center gap-1 text-amber-400">
            @for($i = 1; $i <= 5; $i++)
                <i class="{{ $i <= ($review->rating ?? 0) ? 'fas' : 'far' }} fa-star text-xs"></i>
            @endfor
        </div>

        <span class="rounded-full bg-blue-50 px-3 py-1 text-[10px] font-bold uppercase tracking-wider text-blue-600">
            Verified Review
        </span>
    </div>

    <div class="mb-5 flex-1">
        <i class="fas fa-quote-left mb-3 text-xl text-blue-200"></i>

        <p class="review-description text-sm leading-7 text-slate-600">
            {{ $review->review_text }}
        </p>

        @if(strlen($review->review_text) > 230)
            <button type="button" class="review-read-more mt-2 text-xs font-bold text-blue-600 hover:text-teal-600">
                Read more
            </button>
        @endif
    </div>

    <div class="flex items-center gap-3 border-t border-slate-100 pt-4">
        <img src="{{ $image }}" alt="{{ $review->user_name }}" loading="lazy"
            class="h-11 w-11 rounded-xl border border-slate-100 object-cover">

        <div class="min-w-0 flex-1">
            <h3 class="truncate text-sm font-extrabold text-slate-900">
                {{ $review->user_name }}
            </h3>

            <p class="mt-1 truncate text-[11px] font-semibold text-slate-400">
                {{ $review->category->cat_title ?? 'AAZZ Agency Client' }}
            </p>
        </div>
    </div>

</article>