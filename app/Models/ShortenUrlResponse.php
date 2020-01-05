<?php

namespace App\Models;

/**
 * Response class for shorten url ajax request
 * Class ShortenUrlResponse
 * @package App\Models
 * @property string $url
 * @property string $short_url
 */

class ShortenUrlResponse extends ResponseClass
{
    public $url;
    public $short_url;
}
