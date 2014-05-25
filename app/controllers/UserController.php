<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function login()
	{
		return View::make('user.login');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function auth()
	{
        try
        {
            // Login credentials
            $credentials = Input::only(array('email', 'password'));

            // Authenticate the user
            $user = Sentry::authenticate($credentials, false);
            
            Sentry::login($user);
            
            return Redirect::intended(URL::route('user.dashboard'));
            
        }
        catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
        {
            $error = 'Login field is required.';
        }
        catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
        {
            $error = 'Password field is required.';
        }
        catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
        {
            $error = 'Wrong password, try again.';
        }
        catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            $error = 'User was not found.';
        }
        catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
        {
            $error = 'User is not activated.';
        }

        // The following is only required if the throttling is enabled
        catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
        {
            $error = 'User is suspended.';
        }
        catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
        {
            $error = 'User is banned.';
        }
        catch(Exception $e)
        {
            $error = 'Something went wrong.';
        }
        
        return Redirect::route('user.login')->withError($error);
	}

	/**
	 * Display the specified resource.
	 *
	 * @return Response
	 */
	public function dashboard()
	{
        return View::make('user.dashboard');
	}
    
	/**
	 * Display the specified resource.
	 *
	 * @return Response
	 */
	public function register()
	{
        return View::make('user.register');
	}
    
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function logout()
	{
        Sentry::logout();
		return Redirect::route('home')->withSuccess('You are now logged out');
	}

}
