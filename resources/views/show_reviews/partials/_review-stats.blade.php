<div class="grid grid-cols-2 gap-3 lg:grid-cols-4">

    <div class="rounded-2xl border border-slate-200 bg-white p-5">
        <p class="text-xs font-semibold text-slate-400">Total Reviews</p>
        <h3 class="mt-2 text-2xl font-black text-slate-900">
            {{ number_format($totalReviews) }}
        </h3>
    </div>

    <div class="rounded-2xl border border-slate-200 bg-white p-5">
        <p class="text-xs font-semibold text-slate-400">Average Rating</p>
        <h3 class="mt-2 text-2xl font-black text-slate-900">
            {{ number_format($averageRating, 1) }}
            <span class="text-sm text-amber-400">★</span>
        </h3>
    </div>

    <div class="rounded-2xl border border-slate-200 bg-white p-5">
        <p class="text-xs font-semibold text-slate-400">Five Star Reviews</p>
        <h3 class="mt-2 text-2xl font-black text-slate-900">
            {{ \App\Models\ServiceModel\ServiceReview::where('rating', 5)->count() }}
        </h3>
    </div>

    <div class="rounded-2xl border border-slate-200 bg-white p-5">
        <p class="text-xs font-semibold text-slate-400">Client Satisfaction</p>
        <h3 class="mt-2 text-2xl font-black text-emerald-600">
            {{ $totalReviews ? round(($averageRating / 5) * 100) : 0 }}%
        </h3>
    </div>

</div>