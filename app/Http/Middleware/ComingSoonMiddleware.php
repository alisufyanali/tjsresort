<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ComingSoonMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Retrieve the setting from the database
        $setting = DB::table('settings')->first();
        
        // Check if the 'coming_soon_visible' column is set to 'yes'
        if ($setting && $setting->coming_soon_visible == 1) {
            // Redirect to the Coming Soon page
            return redirect()->route('coming');
        }

        return $next($request);
    }
}
