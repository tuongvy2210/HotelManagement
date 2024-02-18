<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $unorderedBookingCount = Booking::where('is_cancelled', 0)->doesntHave('order')->count();

            view()->share(['unorderedBookingCount' => $unorderedBookingCount]);

            return $next($request);
        });
    }
}
