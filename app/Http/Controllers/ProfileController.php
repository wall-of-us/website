<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\User;
use Auth;
use App\Post;
use Image;
use App\Action;

class ProfileController extends Controller
{
    public function index()
    {
    	$user = User::all();
        $posts = Post::orderBy('week', 'DESC')->orderBy('action', 'asc')->take(4)->get();
        $userid = \Auth::user()->id;
        $membersince = \Auth::user()->created_at;

        $actions = \DB::table('actions')->where('user_id', '=', $userid)->get();
        $action_count = $actions->count();   

        $one_week_ago = \Carbon\Carbon::now()->subWeeks(1);
        $newactions = \DB::table('actions')->where('user_id', '=', $userid)->where('created_at', '>=', $one_week_ago)->get();
        $newaction_count = $newactions->count();   
        
    	return view('sessions.profile', compact('user', 'posts', 'archive', 'action_count', 'newaction_count', 'membersince'));
    }
    public function show($id)
    {
    	$user = User::find($id);

        $actions = DB::table('actions')->where('user_id', '=', $userid)->get();
        $action_count = $actions->count();

    	return view('sessions.profile', compact('user', 'action_count'));
    }
    public function create()
    {
        $user = User::all();
        return view('sessions.edit', compact('user'));
    }

    public function store(Request $request)
    {

     
        // Validate the form
            
            $this->validate(request(), [

                'name' => 'required|max:255',
                'email' => 'required|email|max:255',
                'zip' => 'required|max:15',
                
                
                ]);

            

            $id = \Request::input('id');
            $name = \Request::input('name');
            $email = \Request::input('email');
            $phone = \Request::input('phone');
            $city = \Request::input('city');
            $state = \Request::input('state');
            $zip = \Request::input('zip');
            $filename = Auth::user()->picture;
            $facebook = \Request::input('facebook');
            $twitter = \Request::input('twitter');

            //Handle the user upload of avatar
        if($request->hasFile('picture')){
            $picture = $request->file('picture');
            $filename = time() . '.' . $picture->getClientOriginalExtension();
            Image::make($picture)->resize(300, 300)->save( public_path('/uploads/users/' . $filename ));


            $user = Auth::user();
            $user->picture = $filename;
       
            
        }



            
            // Create and save the user

            \DB::update('update users set name = ?, email = ?, phone = ?, city = ?, state = ?, zip = ?, picture = ?, facebook = ?, twitter = ? where id = ?',[$name, $email, $phone, $city, $state, $zip, $filename, $facebook, $twitter, $id]);


            $user = Auth::user();
            $user->save();
            //return view('sessions.profile', compact('user'));
            return redirect('/profile');
            

            
    }

    public function updatePicture(Request $request){

        //Handle the user upload of avatar
        if($request->hasFile('picture')){
            $picture = $request->file('picture');
            $filename = time() . '.' . $picture->getClientOriginalExtension();
            Image::make($picture)->resize(300, 300)->save( public_path('/uploads/users/' . $filename ));

            $user = Auth::user();
            $user->picture = $filename;
            $user->save();
        }

        return view('sessions.profile', compact('user'));
    }



}

    