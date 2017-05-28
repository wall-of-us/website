<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

use App\User;
use Auth;

class RepsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\Auth::check()) {
            $user = User::all();
            
            // pull represetivive data through HTTP
            $user_address = \Auth::user()->address;
            $user_city = \Auth::user()->city;
            $user_state = \Auth::user()->state;
            $user_zip = \Auth::user()->zip;
        }

        $response = \DB::table('senate')->get();
        //dd($response);
        $counter = 0;
        $reps = 'reps';
        
        return view('reps.reps', compact('user', 'response', 'counter', 'reps'));
        
    }

    public function all()
    {
        if (\Auth::check()) {
            $user = User::all();
            
            // pull represetivive data through HTTP
            $user_address = \Auth::user()->address;
            $user_city = \Auth::user()->city;
            $user_state = \Auth::user()->state;
            $user_zip = \Auth::user()->zip;
        }

        $response = \DB::table('house')->get();
        
        

        $counter = 0;
        $reps = 'house';
        
        return view('reps.reps', compact('user', 'response', 'counter', 'reps'));
        
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function rep($id)
    {
        if (\Auth::check()) {
            $user = User::all();
            
            // pull represetivive data through HTTP
            $user_address = \Auth::user()->address;
            $user_city = \Auth::user()->city;
            $user_state = \Auth::user()->state;
            $user_zip = \Auth::user()->zip;
        }

        $member = \DB::table('senate')->where('slug', '=', $id)->first();
        $role = "United States Senator";
        
        $crp_id = $member->crp_id;
        
        $client = new Client();

        if ($crp_id != '') {
        $funders = \DB::table('contributors')->where('cand_name', '=', $id)->get();
        } else {
        $funders = '';    
        }
        


        
        $counter = 0;

        $prop_id = $member->prop_id;

        $statements = \DB::table('statements')->where('prop_id', '=', $prop_id)->get();
        $positions = \DB::table('positions')->where('rep_id', '=', $prop_id)->get();
        //dd($statements);
        
        
        return view('reps.profile', compact('user', 'member', 'counter', 'funders', 'statements', 'positions', 'role'));
        
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function house($id)
    {
        if (\Auth::check()) {
            $user = User::all();
            
            // pull represetivive data through HTTP
            $user_address = \Auth::user()->address;
            $user_city = \Auth::user()->city;
            $user_state = \Auth::user()->state;
            $user_zip = \Auth::user()->zip;
        }

        $member = \DB::table('house')->where('slug', '=', $id)->first();
        $role = "House of Representitives";
        
        $crp_id = $member->crp_id;
        
        $funders = '';
        $counter = 0;

        $prop_id = $member->prop_id;

        $statements = \DB::table('statements')->where('prop_id', '=', $prop_id)->get();
        $positions = \DB::table('positions')->where('rep_id', '=', $prop_id)->get();
        
        
        
        return view('reps.profile', compact('user', 'member', 'counter', 'funders', 'statements', 'positions', 'role'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client = new Client();
        

        $res = $client->request('GET', 'https://api.propublica.org/congress/v1/115/house/members.json', ['headers' => ['X-API-Key' => 'fs7GLfE4863GiTsnS3qkw94uScKbrlmZ8GrNYbrJ']]);
        
        
        $response = $res->getBody();
        $response = json_decode($response, true);
        //dd($response);
        $counter = 0;
        
        
        foreach ($response['results'][0]['members'] as $member) {
            $members[] = [
                'prop_id'               =>      $member['id'],
                'crp_id'                =>      $member['crp_id'],
                'api_uri'               =>      $member['api_uri'],
                'first_name'            =>      $member['first_name'],
                'middle_name'           =>      $member['middle_name'],
                'last_name'             =>      $member['last_name'],
                'party'                 =>      $member['party'],
                'twitter_account'       =>      $member['twitter_account'],
                'facebook_account'      =>      $member['facebook_account'],
                'google_entity_id'      =>      $member['google_entity_id'],
                'url'                   =>      $member['url'],
                'contact_form'          =>      $member['contact_form'],
                'seniority'             =>      $member['seniority'],
                'next_election'         =>      $member['next_election'],
                'ocd_id'                =>      $member['ocd_id'],
                'office'                =>      $member['office'],
                'phone'                 =>      $member['phone'],
                'fax'                   =>      $member['fax'],
                'state'                 =>      $member['state'],

            ];
        }

        \DB::table('house')->insert($members);

        $message = "Database Updated!";
        
        return view('reps.create', compact('user', 'response', 'counter', 'message'));
    }

    public function create_contributors()
    {
        $client = new Client();
        

        $res = $client->request('GET', 'https://api.propublica.org/congress/v1/115/house/members.json', ['headers' => ['X-API-Key' => 'fs7GLfE4863GiTsnS3qkw94uScKbrlmZ8GrNYbrJ']]);
        
        
        $response = $res->getBody();
        $response = json_decode($response, true);
        //dd($response);
        $counter = 0;
        
        
        foreach ($response['results'][0]['members'] as $member) {
            $members[] = [
                'prop_id'               =>      $member['id'],
                'crp_id'                =>      $member['crp_id'],
                'api_uri'               =>      $member['api_uri'],
                'first_name'            =>      $member['first_name'],
                'middle_name'           =>      $member['middle_name'],
                'last_name'             =>      $member['last_name'],
                'party'                 =>      $member['party'],
                'twitter_account'       =>      $member['twitter_account'],
                'facebook_account'      =>      $member['facebook_account'],
                'google_entity_id'      =>      $member['google_entity_id'],
                'url'                   =>      $member['url'],
                'contact_form'          =>      $member['contact_form'],
                'seniority'             =>      $member['seniority'],
                'next_election'         =>      $member['next_election'],
                'ocd_id'                =>      $member['ocd_id'],
                'office'                =>      $member['office'],
                'phone'                 =>      $member['phone'],
                'fax'                   =>      $member['fax'],
                'state'                 =>      $member['state'],

            ];
        }

        \DB::table('house')->insert($members);

        $message = "Database Updated!";
        
        return view('reps.create', compact('user', 'response', 'counter', 'message'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function opensecreets($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
