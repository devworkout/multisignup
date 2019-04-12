<?php

namespace DevWorkout\MultiSignup\Http\Middleware;

use Closure;

class PreventMultipleSignups
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     *
     * @param $subject
     * @return mixed
     */
    public function handle( $request, Closure $next, $subject )
    {
        if ( auth()->user() )
        {
            return $next( $request );
        }

        if ( !MultiSignup::canSignUp( $request ) )
        {
            return abort( 403, 'A new account cannot be created. For assistance please contact support.' );
        }

        return $next( $request );
    }
}
