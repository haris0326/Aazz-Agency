
@php
    if (!function_exists('reviewImageUrl')) {
        function reviewImageUrl($image, $name = 'Client')
        {
            if (!$image) {
                return 'https://ui-avatars.com/api/?name=' .
                    urlencode($name) .
                    '&background=2563eb&color=ffffff&size=128';
            }

            if (filter_var($image, FILTER_VALIDATE_URL)) {
                return $image;
            }

            return asset(ltrim($image, '/'));
        }
    }
@endphp
