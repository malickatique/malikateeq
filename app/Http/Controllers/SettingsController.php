<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Settings;
use App\User;
use File;
use Illuminate\Http\Request;

//For emails
// use Mail;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Settings::where('id', '>', '0')->first(); 
        $user = User::where('id', '>', '0')->first(); 
        return view('welcome')->with('settings', $settings)->with('user', $user);
        //
    }

    public function dashboard()
    {
        $settings = Settings::where('id', '>', '0')->first();
        $user = User::where('id', '>', '0')->first(); 
        return view('home')->with('settings', $settings)->with('user', $user);
        //
    }

    public function site_settings()
    {
        $settings = Settings::where('id', '>', '0')->first();
        $user = User::where('id', '>', '0')->first(); 
        return view('site-settings')->with('settings', $settings)->with('user', $user);
        //
    }

    public function profile_settings()
    {
        $settings = Settings::where('id', '>', '0')->first();
        $user = User::where('id', '>', '0')->first(); 
        return view('profile-settings')->with('settings', $settings)->with('user', $user);
        //
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function update_profile(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:3|max:50',
            'email' => 'email',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::where('id', '=', Auth::user()->id)->first();
        $request['password'] = Hash::make($request->password);
        $user->update($request->all());

        //Redirect to dashboard
        $settings = Settings::where('id', '>', '0')->first();
        $user = User::where('id', '>', '0')->first(); 
        return view('home')->with('settings', $settings)->with('user', $user);
        //
    }
    public function update_site(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|min:3|max:185',
            'name' => 'required|min:3|max:185',
            'description' => 'required|min:3|max:185',
            'one_liner' => 'required|min:3|max:185',
            'bg_image' => 'sometimes|image|mimes:jpg,png,jpeg,gif,svg',
            'favicon' => 'sometimes|image|mimes:jpg,png,jpeg,gif,svg'
        ]);

        $requestData = $request->all();


        $settings = Settings::where('id', '>', '0')->first(); 

        if( !empty($settings['bg_image']) && !empty($request['bg_image']) ){
            $image_path = ("images/").$settings['bg_image']; 
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
        }
        if(!empty($request['bg_image']))
        {
            //Background image
            $image = $request['bg_image'];
            $imagename = '0'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = ('images/');
            $image->move($destinationPath, $imagename);
            $requestData['bg_image'] = $imagename;
            
        }


        if(!empty($settings['favicon']) && $request['favicon']!="" ){
            $image_path = public_path("images/").$settings['favicon']; 
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
        }
        if(!empty($request['favicon']))
        {
            //Favicon image
            $image = $request['favicon'];
            $imagename = '1'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $imagename);
            $requestData['favicon'] = $imagename;
        }
        

        $settings->update($requestData);

        //Redirect to dashboard
        $settings = Settings::where('id', '>', '0')->first();
        $user = User::where('id', '>', '0')->first(); 
        return view('home')->with('settings', $settings)->with('user', $user);
        //
    }

    public function contact(Request $request)
    {
        // $this->validate($request,[
        //     'first_name' => 'required|min:3|max:185',
        //     'last_name' => 'required|min:3|max:185',
        //     'email' => 'required|email|min:3|max:185',
        //     'subject' => 'required|min:3|max:185',
        //     'message' => 'required|min:4|max:185'
        // ]);
        // $me = User::where('id', '=', '1')->first();
        Mail::send(['text'=> 'mail'], ['name', 'malik'], function($message){
            $message->to('malickateeq@gmail.com', 'Hacker')->subject('test mail');
            $message->from('malickateeq@gmail.com', 'From');
        });
        //
    }
    public function send()
    {
        // $this->validate($request,[
        //     'first_name' => 'required|min:3|max:185',
        //     'last_name' => 'required|min:3|max:185',
        //     'email' => 'required|email|min:3|max:185',
        //     'subject' => 'required|min:3|max:185',
        //     'message' => 'required|min:4|max:185'
        // ]);
        // $me = User::where('id', '=', '1')->first();
        Mail::send(['text'=> 'mail'], ['name', 'malik'], function($message){
            $message->to('malickateeq@gmail.com', 'Hacker')->subject('test mail');
            $message->from('malickateeq@gmail.com', 'From');
        });
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function show(Settings $settings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function edit(Settings $settings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Settings $settings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function destroy(Settings $settings)
    {
        //
    }
}
