<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\SocialAccountService;
use Socialite;
use App\Post;
use App\Action;
use Cviebrock\EloquentSluggable\Sluggable;
use App\User;
use Image;

class PostsController extends Controller
{
    	
	
	
	public function index()
		{
			
			$posts = Post::limit(4)->orderBy('week', 'DESC')->orderBy('action', 'asc')->where('week', '<=', date('Y-m-d'))->get();
			
			return view('posts.index', compact('posts'));
		}
	public function about()
		{
			$post = 'About';
			return view('posts.about', compact('post'));
		}
	
	public function privacy()
		{
			$post = 'Privacy';
			return view('posts.privacy', compact('post'));
		}

	public function ceos()
		{
			$post = 'CEOs';
			return view('actions.ceo', compact('post'));
		}
	public function actions()
		{
			$pageType = "Weekly Acts";
			$posts = Post::orderBy('week', 'DESC')->orderBy('action', 'asc')->take(4)->where('week', '<=', date('Y-m-d'))->get();
			$url = \Request::url();
			
			$count = Post::count();
			$skip = 4;
			$limit = $count - $skip; // the limit
			$archive = Post::orderBy('week', 'DESC')->orderBy('action', 'asc')->skip($skip)->take($limit)->get();
			// $archive = Post::orderBy('week', 'DESC')->orderBy('action', 'asc')->get();

		
       
			
			return view('posts.actions', compact('posts', 'archive', 'url'), ['title' => $pageType]);
		}
	public function archive()
		{
			$pageType = "Weekly Acts";
			$posts = Post::orderBy('week', 'DESC')->orderBy('action', 'asc')->where('week', '<=', date('Y-m-d'))->get();
			$url = \Request::url();
			
			$count = Post::count();
			$skip = 4;
			$limit = $count - $skip; // the limit
     		$counter = 0;

			$archive = Post::orderBy('week', 'DESC')->orderBy('action', 'asc')->skip($skip)->take($limit)->get();
			// $archive = Post::orderBy('week', 'DESC')->orderBy('action', 'asc')->get();
			
			return view('posts.archive', compact('posts', 'archive', 'counter', 'url'), ['title' => $pageType]);
		}
	public function show(Post $post)
		{
			$pageType = "Weekly Acts";
			$url = \Request::url();
			
			if (\Auth::check()) {
				$user = \Auth::user()->id;
				$actions = Action::where('post_id', '=', $post->id)->where('user_id', '=', $user);
			}
			
			$next = Post::where('action', '>', $post->action)->where('week', '=', $post->week)->first();
			$previous = Post::where('action', '<', $post->action)->where('week', '=', $post->week)->orderBy('action','desc')->first();

			if (\Auth::check()) {
			
	        	$zip = \Auth::user()->zip;
				if ($zip != "") {
		        // pull represetivive data through HTTP
		        $user_address = \Auth::user()->address;
		        $user_city = \Auth::user()->city;
		        $user_state = \Auth::user()->state;
		        $user_zip = \Auth::user()->zip;
		        $clean_address = str_replace(array('#','.'), '', $user_address);
		        
		        //first find out who there reps are
		        $url = "https://www.googleapis.com/civicinfo/v2/representatives?address=" . $clean_address . $user_city . $user_state . $user_zip . "&levels=country&roles=legislatorUpperBody&key=". $_ENV['CIVIC_API_KEY'];
		        $client = new Client();
		        try {
		        $response = $client->request('GET', $url);
		        $response = json_decode($response->getBody(), true);
		        } catch(\Exception $e) {
		        //exception handling
		        $response = "";
		        }
		        
		        //dd($response);
		        //then set the variables
		        if (isset($response['officials'])) {
		        $senator_1 = str_slug($response['officials'][0]['name']);
		        $senator_1 = \DB::table('senate')->where('slug', '=', $senator_1)->first();
		        $statement_1 = \DB::table('statements')->where('prop_id', '=', $senator_1->prop_id)->where('issue', '=', 'Russia')->first();
		        $position_1 = \DB::table('positions')->where('rep_id', '=', $senator_1->prop_id)->first();

		        //dd($statement_1);
		        $senator_2 = str_slug($response['officials'][1]['name']);
		        $senator_2 = \DB::table('senate')->where('slug', '=', $senator_2)->first();
		        $statement_2 = \DB::table('statements')->where('prop_id', '=', $senator_2->prop_id)->first();
        		$position_2 = \DB::table('positions')->where('rep_id', '=', $senator_2->prop_id)->where('issue', '=', 'Russia')->first();
        		$position_3 = \DB::table('positions')->where('rep_id', '=', $senator_1->prop_id)->where('issue', '=', 'Health Care')->first();
        		$position_4 = \DB::table('positions')->where('rep_id', '=', $senator_2->prop_id)->where('issue', '=', 'Health Care')->first();
        		$position_5 = \DB::table('positions')->where('rep_id', '=', $senator_1->prop_id)->where('issue', '=', 'Charlottesville')->first();
        		$position_6 = \DB::table('positions')->where('rep_id', '=', $senator_2->prop_id)->where('issue', '=', 'Charlottesville')->first();
        		$position_7 = \DB::table('positions')->where('rep_id', '=', $senator_1->prop_id)->where('issue', '=', 'ACA')->first();
        		$position_8 = \DB::table('positions')->where('rep_id', '=', $senator_2->prop_id)->where('issue', '=', 'ACA')->first();
				//dd($statement_2);

				$call_script_1 = 'I want to thank Senator ';
				$call_script_2 = ' for their leadership on insisting that the DOJ appoints a Special Counsel to investigate the Trump Administration&#8217;s ties to Russia. Will they commit to stopping all senate business, including blocking all judicial and DOJ nominees until such a special counsel is appointed? This is now a matter of protecting our democracy and our national security.';

				$call_script_3 = 'I want to thank Senator ';
				$call_script_4 = 'for supporting a special investigation to get to the bottom of the Trump Administration&#8217;s ties to Russia.  I am calling to ask the Senator to go further and publicly ask the DOJ to appoint a Special Counsel.  I understand that the decision to appoint a Special Counsel rests with the DOJ, but the Senate can stop all its business as well as block all judicial and DOJ nominees until such a Special Counsel is appointed. Will they commit to doing that? This is now a matter of protecting our democracy and our national security.';

				$call_script_5 = 'I want to thank Senator ';
				$call_script_6 = 'for raising concerns in response to Trump&#8217;s firing of Comey.  I am calling to ask the Senator to go further and do the following: <br><br>1) Support an Independent Investigation. Bipartisan senators including John McCain have been advocating for this for months. In light of Donald Trump&#8217;s interference with an active FBI investigation I hope that they join these leaders in the Senate.<br><br>2) Publicly ask the DOJ to appoint a Special Counsel.  I understand that decision to appoint rests with the DOJ, but the senate can stop all senate business as well as block all judicial and DOJ nominees until such a special counsel is appointed. Will they commit to doing that? This is now a matter of protecting our democracy and national security.';

				$call_script_7 = 'I am calling to express my deep disappointment in Senator ';
				$call_script_8 = ' for their response to Trump&#8217;s firing of FBI Director Comey. His/her refusal to support an impartial investigation into Russian interference into our elections is compromising our democracy and our national security. We will be sure to share his/her failure to protect our country from foreign interference widely.';

				$call_script_9 = 'I am calling to express my deep disappointment in Senator ';
				$call_script_10 = ' for his/her lack of response to Trump&#8217;s firing of FBI Director Comey. Their lack of response on this key issue reflects how little they cares about our democratic values. Is the Senator planning on making a statement soon? As his/her constituent, I am calling to ask him/her to:<br><br>1) Support an Independent Investigation. Bipartisan senators including John McCain have been advocating for this for months. In light of Donald Trump&#8217;s interference with an active FBI investigation I hope that the Senator joins these leaders in the Senate.<br><br>2) Publicly ask the DOJ to appoint a Special Counsel.  I understand that decision to appoint rests with the DOJ, but the senate can stop all senate business as well as block all judicial and DOJ nominees until such a special counsel is appointed. Will they commit to doing that? This is now a matter of protecting our democracy and national security. When will they respond to this constitutional crisis?';
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
		        $positions = \DB::table('governors_positions')->where('slug', '=', $governor_slug)->where('issue', '=', 'climate')->first();
		        $positions_health = \DB::table('governors_positions')->where('slug', '=', $governor_slug)->where('issue', '=', 'Health Care')->first();
			    
		        }
			    if ($state != "") {
			    	$positions_voting = \DB::table('electionintegrity')->where('state', '=', $state)->orWhere('st', '=', $state)->first();
			    }
			    if ($state != "") {
			    	$ags = \DB::table('ags')->where('state', '=', $state)->orWhere('st', '=', $state)->first();
			    }
			    
			    //dd($positions);
			    $url3 = "https://www.googleapis.com/civicinfo/v2/representatives?address=" . $clean_address . $user_city . $user_state . $user_zip . "&levels=country&roles=legislatorLowerBody&key=". $_ENV['CIVIC_API_KEY'];
		        $client = new Client();

		        try {
		        $response3 = $client->request('GET', $url3);
		        $response3 = json_decode($response3->getBody(), true);
		        } catch(\Exception $e) {
		        //exception handling
		        $response3 = "";
		        }

		        
		        
		        //then set the variables
		        if (isset($response3['officials'])) {
		        $rep = $response3['officials'][0]['name'];
		        $rep_phone = $response3['officials'][0]['phones'][0];
		        $rep_slug = str_slug($response3['officials'][0]['name']);
		        
			    }
			    }
			  }
		       
			
			return view('posts.show', compact('post', 'next', 'previous', 'actions', 'url', 'response', 'id', 'statement_1', 'statement_2', 'position_1', 'position_2', 'position_3', 'position_4', 'position_5', 'senator_1', 'senator_2', 'call_script_1', 'call_script_2', 'call_script_3', 'call_script_4', 'call_script_5', 'position_6', 'position_7', 'position_8', 'call_script_6', 'call_script_7', 'call_script_8', 'call_script_9', 'call_script_10', 'governor', 'positions_health', 'positions_voting', 'governor_phone', 'rep', 'rep_phone', 'rep_slug', 'positions', 'state', 'ags'), ['title' => $pageType]);
		}

	
	public function actionTaken()
		{
			
   	  Action::create(request(['post_id', 'user_id']));
      $msg = "<button class='btn btn-cta btn-cta-taken' disabled><i class='fa fa-check' style='color:#12464d'></i> I Took Action</button><br /><br/>Nice work <img src='https://emojipedia-us.s3.amazonaws.com/cache/b6/11/b6110b7ec0d06a12d27b3dc0d7d39a3e.png' height='20'> you added another brick to the wall! <img src='https://emojipedia-us.s3.amazonaws.com/cache/bf/9c/bf9cbf38f5a612850be7a519a8f0ff1a.png' height='20'> Tell the world:";
      return response()->json([
            'msg'=> $msg
          ], 200);
   
		}
}
