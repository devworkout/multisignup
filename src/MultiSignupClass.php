<?php

namespace DevWorkout\MultiSignup;

use DevWorkout\UserIps\Models\UserIP;

class MultiSignupClass
{
    /**
     * Create a new MultiSignup Instance.
     */
    public function __construct()
    {
        // constructor body
    }

    public function canSignUp( $request = null )
    {
        $request = $request ?? request();
        return !$this->ipReachedMaxSignups( $request->ip ) && !$this->hasNosignupCookie( $request );
    }

    public function hasNosignupCookie( $request = null )
    {
        $request = $request ?? request();
        return $request->cookie( 'nosignups', false );
    }

    public function ipReachedMaxSignups( $ip = null )
    {
        $ip = $ip ?? request()->ip();
        return ( UserIP::whereIp( $ip )->count() >= config( 'multisignup.max_signups_from_ip' ) );
    }

    public function setNosignupCookie()
    {
        cookie()->queue( cookie()->forever( 'nosignups', true ) );
    }
}
