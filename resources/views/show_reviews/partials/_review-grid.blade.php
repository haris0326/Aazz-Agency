@if($reviews->count())

    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-3">

        @foreach($reviews as $review)
            @include('show_reviews.partials._review-card', ['review' => $review])
        @endforeach

    </div>

@else

    <div class="rounded-2xl border border-slate-200 bg-white px-6 py-16 text-center">
        <i class="far fa-comment-dots mb-4 text-4xl text-slate-300"></i>

        <h3 class="text-lg font-bold text-slate-800">
            No reviews found
        </h3>

        <p class="mt-2 text-sm text-slate-500">
            Client reviews will appear here when available.
        </p>
    </div>

@endif