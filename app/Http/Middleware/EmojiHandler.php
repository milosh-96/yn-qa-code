<?php

namespace App\Http\Middleware;

use Closure;
use Spatie\Emoji\Emoji;

class EmojiHandler
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
        str_replace(":)",Emoji::CHARACTER_GRINNING_FACE,$request->getContent());
        return $next($request);
    }
}
