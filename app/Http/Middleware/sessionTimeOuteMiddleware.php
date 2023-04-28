<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class sessionTimeOuteMiddleware
{

    private $maxIdleTime;

    public function __construct($maxIdleTime = 300){
        $this->maxIdleTime = $maxIdleTime;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $lastActivity = session()->get('last_activity');
        $currentTime = time();

        if ($lastActivity !== null && ($currentTime - $lastActivity) > $this->maxIdleTime) {
            session()->flush();
            return redirect('/login');
        }

        session()->put('last_activity', $currentTime);
        return $next($request);
    }
}
