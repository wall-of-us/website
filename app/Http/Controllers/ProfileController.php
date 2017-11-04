<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

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
        $zip = \Auth::user()->zip;

        if ($zip != "") {
        // pull represetivive data through HTTP
        $user_address = \Auth::user()->address;
        $user_city = \Auth::user()->city;
        $user_state = \Auth::user()->state;
        $user_zip = \Auth::user()->zip;
        $clean_address = str_replace(array('#','.'), '', $user_address);
        $clean_address = substr($clean_address, 0, strpos($clean_address, ','));
        
        $clean_city = str_replace(array('#','.'), '', $user_city);
        
            
        $url = "https://www.googleapis.com/civicinfo/v2/representatives?address=" . $clean_address . $clean_city . $user_state . $user_zip . "&includeOffices=true&key=". $_ENV['CIVIC_API_KEY'];
        
        $client = new Client();

        try {
        $response = $client->request('GET', $url);
        $response = json_decode($response->getBody(), true);
        } catch(\Exception $e) {
        //exception handling
        $response = "";
        }
        
        
        $zip = substr($user_zip, 0, 5);
        
        $getlocation = "http://ziptasticapi.com/" . $zip;
        
        $client = new Client();

        try {
        $location = $client->request('GET', $getlocation);
        $location = json_decode($location->getBody(), true);
      
        $city = $location['city'];
        $state = $location['state'];

        } catch(\Exception $e) {
        //exception handling
        $city = "";
        $state = "";
        }
        
        

        $governor = \DB::table('governors')->where('state', '=', $state)->orWhere('st', '=', $state)->first();
        if ($governor != "") {
        $governor_slug = $governor->slug;
        }
       
        if (isset($response['officials'][3]['name'])) {
        $positions = \DB::table('positions')->where('member', '=', $response['officials'][3]['name'])->get();
        $positions = json_decode($positions, true);
        } else {
        $positions = "";
        }
        
        //dd($positions);
        }
        
        $userid = \Auth::user()->id;
        $membersince = \Auth::user()->created_at->toDateTimeString();
       

        $actions = \DB::table('actions')->where('user_id', '=', $userid)->get();
        $action_count = $actions->count();   

        $one_week_ago = \Carbon\Carbon::now()->subWeeks(1);
        $newactions = \DB::table('actions')->where('user_id', '=', $userid)->where('created_at', '>=', '2017-08-20 12:00:00')->get();
        $newaction_count = $newactions->count(); 
        if ($newaction_count > '4')
        $newaction_count = '4';  
        $leftthisweek = 4 - $newaction_count;
        $counter = 0;
        
        return view('sessions.profile', compact('user', 'response', 'action_count', 'newaction_count', 'membersince', 'leftthisweek', 'positions', 'counter', 'profile_url', 'governor_slug'));
    
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
                
                
                
                ]);

            

            $id = \Request::input('id');
            $name = \Request::input('name');
            $email = \Request::input('email');
            $phone = \Request::input('phone');
            $address = \Request::input('address');
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
            \Storage::disk('s3')->put('/users/' . $filename , file_get_contents($request->file('picture')),  'public'); 

            $user = Auth::user();
            $user->picture = 'https://s3-us-west-1.amazonaws.com/wallofus/users/' . $filename;
            
        }



            
            // Create and save the user

            \DB::update('update users set name = ?, email = ?, phone = ?, address = ?, city = ?, state = ?, zip = ?, picture = ?, facebook = ?, twitter = ? where id = ?',[$name, $email, $phone, $address, $city, $state, $zip, $filename, $facebook, $twitter, $id]);


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
            $user->picture = '/uploads/users/' . $filename;
            $user->save();
        }

        return view('sessions.profile', compact('user'));
    }



}

    