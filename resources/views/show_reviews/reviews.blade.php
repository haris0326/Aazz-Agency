@include('show_reviews.partials._home-slider', [
    'reviews' => $reviews ?? collect()
])