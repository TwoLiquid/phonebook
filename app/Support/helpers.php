<?php

use Illuminate\Support\Str;

if (!function_exists('generateRandomString')) {

    /**
     * @param bool $letters
     * @param bool $uppercase
     * @param bool $numerals
     * @param int $length
     * @return string
     */
    function generateRandomString
    (
        $letters = true,
        $uppercase = true,
        $numerals = true,
        $length = 20
    ) {
        $characters = '';

        if ($letters) {
            $characters = 'abcdefghijklmnopqrstuvwxyz';
        }

        if ($uppercase) {
            $characters .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        }

        if ($numerals) {
            $characters .= '0123456789';
        }

        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }
}

if (! function_exists('starts_with')) {
    /**
     * Determine if a given string starts with a given substring.
     *
     * @param  string  $haystack
     * @param  string|array  $needles
     * @return bool
     */
    function starts_with($haystack, $needles)
    {
        return Str::startsWith($haystack, $needles);
    }
}

if (! function_exists('studly_case')) {
    /**
     * Convert a value to studly caps case.
     *
     * @param  string  $value
     * @return string
     */
    function studly_case($value)
    {
        return Str::studly($value);
    }
}
