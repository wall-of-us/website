<?php

namespace App\Http\Controllers;

use App\User;

use App\Mail\Welcome;
use App\SocialAccountService;
use Socialite;



class RegistrationController extends Controller
{
    public function create()
		{
			$pageType = "Register";
			return view('registrations.create', ['title' => $pageType]);
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
			

			// Sign them in
			
			auth()->login($user, true);
			
			// send a welcome email
			
			\Mail::to($user)->send(new Welcome($user));

			// Flash message

			session()->flash('message', 'Welcome');
			
			// Redirect to the homepage
			
			return redirect()->home();
			
		}
		
		public function redirect()
		    {
		        return Socialite::driver('facebook')->redirect();   
		    }   

	    public function callback(SocialAccountService $service)
	    {
	        $user = $service->createOrGetUser(Socialite::driver('facebook')->user());


	        $user = User::create(request(['name', 'email', 'zip', 'password']));

	        auth()->login($user);

	        return redirect()->to('/home');
	    }
}
