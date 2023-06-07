<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin {
  /**
   * Handle an incoming request.
   *
   * @param  Closure $request
   * @param  Request $next
   */
  public function handle(Request $request, Closure $next): Response {
    if (!auth()->check() || !auth()->user()->is_admin) {
      abort(403);
    }

    return $next($request);
  }
}
