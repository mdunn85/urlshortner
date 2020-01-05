<?php

namespace Tests\Unit;

use App\ShortUrlGenerator;
use Tests\TestCase;

class ShortUrlGeneratorTest extends TestCase
{
    public function testShortUrlGenerator()
    {
        $generatedArray = [];
        $urlArray = [
            "http://www.payasugym.com",
            "https://google.com",
            "https://www.facebook.com",
            "https://outlook.com",
        ];
        $paths = [
            "",
            "/",
            "/test",
            "/test/test",
            "/test/test/test"
        ];
        foreach ($urlArray as $url) {
            foreach ($paths as $path) {
                $short_url = ShortUrlGenerator::Generate($url . $path);
                $this->assertFalse(in_array($short_url, $generatedArray));
                $generatedArray[] = $short_url;
            }
        }
    }
}
