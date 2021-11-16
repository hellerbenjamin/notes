<?php

namespace App\Http\Middleware;

use App\Services\NoteService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class NoteOwner
{

    public function __construct(private NoteService $noteService)
    {
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        /** If the extra database call is a performance concern, this can be process in the NoteService 
        *   and throw access errors at that point. I like to use this middleware approach as a starting
        *   point because it is so easy to add onto routes.
        */
        if ($this->noteService->isUserOwner($request->route('id'), Auth::user()->getAuthIdentifier())) {
            return $next($request);
        }

        throw new AccessDeniedHttpException('Permimssion denied');
    }
}
