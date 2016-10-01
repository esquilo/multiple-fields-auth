<?php

namespace esquilo\MultipleFieldsAuth;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

trait MultipleFieldsAuth
{
    use AuthenticatesUsers;

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request) {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($lockedOut = $this->hasTooManyLoginAttempts($request))
        {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $this->attempts($request);

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        if (! $lockedOut)
        {
            $this->incrementLoginAttempts($request);
        }

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Handle login attemps with all usernameFields specified.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function attempts($request)
    {
        $credentials = $this->credentials($request);

        if(! property_exists($this, 'usernameFields'))
            $this->usernameFields[] = $this->username();

        foreach($this->usernameFields as $field)
        {
            $credentialsField = [
                $field => $credentials[$this->username()],
                'password' => $credentials['password']
            ];

            if ($this->guard()->attempt($credentialsField, $request->has('remember')))
                return $this->sendLoginResponse($request);
        }
    }
}
