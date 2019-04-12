<?php

namespace DevWorkout\MultiSignup;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Exfriend\MultiSignup\MultiSignupClass
 */
class MultiSignupFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'multisignup';
    }
}
