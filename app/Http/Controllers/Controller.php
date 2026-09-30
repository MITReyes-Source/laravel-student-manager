<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

abstract class Controller
{
    // NOTE: Laravel 11/13's default skeleton ships this class EMPTY.
    // You must add this trait yourself, or $this->authorize(...) will throw
    // an error ("Call to undefined method ... authorize()").
    use AuthorizesRequests;
}
