<?php

namespace App\Models;

/**
 * Base class for ajax reponses
 * Class ResponseClass
 * @package App\Models
 * @property array $errors
 * @property string $message
 * @property bool $success
 */

class ResponseClass
{
    public $errors = [];
    public $message;
    public $success = false;
}
