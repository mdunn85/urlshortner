<?php

namespace App;

use Illuminate\Support\Facades\Cache;

class ShortUrlGenerator
{
    /**
     * Generate and store unique url
     * @param string $url
     * @return string
     */
    public static function Generate(string $url): string
    {
        do {
            $short_url = self::GenerateUniqueString();
        } while (Cache::has($short_url));
        Cache::forever($short_url, $url);
        return $short_url;
    }

    /**
     * Get full url from cache
     * @param string $short_url
     * @return string|null
     */

    public static function Get(string $short_url): ?string
    {
        return Cache::get($short_url);
    }

    /**
     * Function to produce a random string 5 characters long
     * @return string
     */

    private static function GenerateUniqueString(): string
    {
        $returnString = "";
        $characterString = "abcdefghijklmnopqrstuvwxyz0123456789";
        $characterStringLength = strlen($characterString) - 1;
        for ($i = 0; $i < 6; $i++) {
            $randomNumber = rand(0, $characterStringLength);
            $returnString .= substr($characterString, $randomNumber, 1);
        }
        return $returnString;
    }
}
