<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;
use App\Mail\Welcome;
use App\SocialAccountService;
use Socialite;



class RegistrationController extends Controller
{
	
    public function create()
		{
			if (\Auth::check())
		    {
		       return redirect()->to('/profile');
		    } else {
				$pageType = "Register";
				return view('registrations.create', ['title' => $pageType]);
			}
		}
		
	public function store()
		{
			
			// Validate the form
			
			$this->validate(request(), [

				'name' => 'required|max:255',
            	'email' => 'required|email|max:255|unique:users',
           		'password' => 'required|min:6|confirmed',
            	'zip' => 'required|max:15',
				
				
				]);
			
			// Create and save the user
			
			$user = User::create(request(['name', 'email', 'zip', 'password']));
			
			// Encrypt their password
			$password = $user->password;

			$user->forceFill([
            'password' => bcrypt($password),
        	])->save();

			// Sign them in
			
			auth()->login($user, true);
			
			// send a welcome email
			
			\Mail::to($user)->send(new Welcome($user));

			// Flash message

			session()->flash('message', 'Welcome');
			
			// Redirect to profile
			
			return redirect('/profile');


			
		}
		
		public function redirectToProvider()
	    {
	        return Socialite::driver('facebook')->redirect();
	    }

	    /**
	     * Obtain the user information from GitHub.
	     *
	     * @return Response
	     */
	    public function handleProviderCallback()
	    {
	    	// Check if the user exists in the database with facebook id

	        try {
	        	$socialUser = Socialite::driver('facebook')->user();
	        }

	        catch (\Exception $e) {
	        	return redirect('/');
	        }

	        $user = User::where('facebook_id', $socialUser->getId())->first();

	        // If not create a new user

	        if (!$user) {

	        $facebook_id = $socialUser->getId();
	        $name = $socialUser->getName();
	        $email = $socialUser->getEmail();
	        $password = Hash::make(str_random(8));
	        $picture='https://graph.facebook.com/'.$facebook_id.'/picture';

	        $user = User::create (['facebook_id' => $facebook_id, 'name' => $name, 'picture' => $picture, 'password' => $password, 'email' => $email]);



	        // send a welcome email

			\Mail::to($user)->send(new Welcome($user));

			// Flash message

			session()->flash('message', 'Welcome');
	        }

	        // log this user in to the application

	        auth()->login($user, true);

			// Redirect to profile
			
			return redirect('/profile');
	        // $user->token;
	    }
}
