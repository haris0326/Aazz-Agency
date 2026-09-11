<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

/**
 * Blocks comments that contain a link or a website address —
 * http(s):// links, www. links, and bare domain-looking text
 * like "mysite.com" or "example.pk".
 *
 * Intentionally strict: comment sections are a common spam
 * vector for people dropping their own website links.
 */
class NoUrlInText implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $value = (string) $value;

        // http://, https://, or www. followed by anything non-space
        $protocolOrWww = '/(https?:\/\/|www\.)\S+/i';

        // Bare domain-looking text, e.g. "mysite.com", "shop.example.pk"
        $bareDomain = '/\b[a-z0-9]([a-z0-9-]{0,61}[a-z0-9])?\.(com|net|org|io|co|info|biz|xyz|site|online|store|shop|me|dev|app|ai|us|uk|pk|in)\b/i';

        if (preg_match($protocolOrWww, $value) || preg_match($bareDomain, $value)) {
            $fail('Links or website URLs are not allowed in comments.');
        }
    }
}