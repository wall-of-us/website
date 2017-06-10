<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class SessionsController extends Controller
{
        
		public function __construct() {
			
			$this->middleware('guest', ['except' => 'destroy']);
			
		}
	
		public function create()
		{
			$pageType = "Log In";
			
			return view('sessions.create', ['title' => $pageType]);
			
		}

		
		
		public function store()
			{
				
				// Attempt to authenticate the user
				
				if (! auth()->attempt(request(['email', 'password']))) {
					
					return back()->withErrors([
						
						'message'  => 'Your email address or password is incorrect.'
						
						]);
			
				}
				
				return redirect('/profile');
			}
		
		
		public function destroy()
		{
			auth()->logout();
			
			return redirect()->home();
		}
}
