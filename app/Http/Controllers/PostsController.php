<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SocialAccountService;
use Socialite;
use App\Post;
use App\Action;

class PostsController extends Controller
{
    	
	
	
	public function index()
		{
			
			$posts = Post::limit(4)->orderBy('week', 'DESC')->orderBy('action', 'asc')->get();
			
			return view('posts.index', compact('posts'));
		}
	public function about()
		{
			return view('posts.about');
		}
	public function actions()
		{
			$pageType = "Weekly Acts";
			$posts = Post::orderBy('week', 'DESC')->orderBy('action', 'asc')->take(4)->get();
			
			
			$count = Post::count();
			$skip = 4;
			$limit = $count - $skip; // the limit
			$archive = Post::orderBy('week', 'DESC')->orderBy('action', 'asc')->skip($skip)->take($limit)->get();
			// $archive = Post::orderBy('week', 'DESC')->orderBy('action', 'asc')->get();
			
			return view('posts.actions', compact('posts', 'archive'), ['title' => $pageType]);
		}
	public function show(Post $post)
		{
			$pageType = "Weekly Acts";
			$next = Post::where('id', '>', $post->id)->first();
			$previous = Post::where('id', '<', $post->id)->orderBy('id','desc')->first();
			
			if (\Auth::check()) {
				$user = \Auth::user()->id;
				$actions = Action::where('post_id', '=', $post->id)->where('user_id', '=', $user);
			}
			 
			
			return view('posts.show', compact('post', 'next', 'previous', 'actions'), ['title' => $pageType]);
		}
	public function create()
		{
			$pageType = "Publish a Post";
			return view('posts.create', ['title' => $pageType]);
		}
	public function store()
		{
			$this->validate(request(), [
				
				'title' => 'required',
				'body' => 'required'
				
				
			]);
			
			Post::create(request(['week', 'action', 'title', 'body', 'shortbody', 'image']));
			
			return redirect('/');
		}
	public function actionTaken()
		{
			
			Action::create(request(['post_id', 'user_id']));
			
			
			return \Redirect::back()->withStatus('Form submitted!');
		}
}
