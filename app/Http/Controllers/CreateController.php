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

class CreateController extends Controller
{
    	

	public function create()
		{
			$pageType = "Post a new action";

			return view('create.create', ['title' => $pageType]);
		}
	public function update(Post $post)
		{
			$pageType = "Edit action";

			return view('create.update', compact('post'), ['title' => $pageType]);
		}
	public function admin()
		{
			$pageType = "Manage actions";
			$posts = Post::orderBy('week', 'DESC')->orderBy('action', 'asc')->paginate(8);

			return view('create.manage', compact('posts'), ['title' => $pageType]);
		}
	public function store(Request $request)
		{
			$this->validate(request(), [
				
				'title' => 'required',
				'slug' => 'required',
				'week' => 'required|date|date_format:Y-m-d|after:yesterday'
				
			]);


           //Handle the user upload of post image
       
            $picture = $request->file('picture');
            
            if ($picture) {
            $filename = time() . '.' . $picture->getClientOriginalExtension();

            Image::make($picture)->save( public_path('/uploads/posts/' . $filename ));
            \Storage::disk('s3')->put('/posts/' . $filename , file_get_contents($request->file('picture')),  'public'); 
			
            
            $image = $filename;
            } else {
            	$image = \Request::input('pic');
            	
            }

            $id = \Request::input('id');
            $week = \Request::input('week');
            $action = \Request::input('action');
            $title = \Request::input('title');
            $body = \Request::input('body');
            $shortbody = \Request::input('shortbody');
            $slug = \Request::input('slug');
            $cta = \Request::input('cta');
            $call = \Request::input('call');
            $script = \Request::input('script');
            $script_link = \Request::input('script_link');
            $code = \Request::input('code');
            $link = \Request::input('link');
        
            
        	if ($id == "")
        	{

        	\DB::table('posts')->insert(
			    ['week' => $week, 'action' => $action, 'title' => $title, 'body' => $body, 'shortbody' => $shortbody, 'image' => $image, 'slug' => $slug, 'cta' => $cta, 'call' => $call, 'script' => $script, 'script_link' => $script_link, 'code' => $code, 'link' => $link]
			);
			} else {

			\DB::table('posts')
            ->where('id', $id)
            ->update(['week' => $week, 'action' => $action, 'title' => $title, 'body' => $body, 'shortbody' => $shortbody, 'image' => $image, 'slug' => $slug, 'cta' => $cta, 'call' => $call, 'script' => $script, 'script_link' => $script_link, 'code' => $code, 'link' => $link]);
			}
			
			
			return redirect('/admin');
		}

		public function delete(Request $request)
		{

			$id = \Request::input('id');
			\DB::table('posts')->where('id', '=', $id)->delete();
			return redirect('/admin');
		}

}
