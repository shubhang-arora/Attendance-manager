<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Redirect;

class AuthNewController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        if(\Auth::check()){
            return Redirect::to('/');
        }else{
            return \Socialize::driver('google')->redirect();
        }

    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = \Socialize::driver('google')->user();
        if(strstr($user->email, '@') == '@snu.edu.in'){
            $avatar = $user->avatar;
            $user = User::firstOrCreate([
                'name' => $user->name,
                'email' => $user->email
            ]);
            if($user->avatar==''){
                $user->avatar = $avatar;
            }
            $id = $user->id;
            \Auth::loginUsingId($id);
            if(!$user->isVerified()){
                return redirect()->action('AuthNewController@verifyUser');
            }
            return Redirect::to('/');
        }else{
            return redirect('/')->with('message', 'Please use your SNU email id to login.');
        }
    }

    public function verifyUser(){
        $user = \Auth::user();
        if(!$user->isVerified()){
            return view('auth.verify');
        }else{
            return Redirect::to('/');
        }

    }

    public function verifyUserPost(Request $request)
    {
        $this->validate($request, ['phone_number'=>'required|min:10|numeric']);
        $user = \Auth::user();
        $user->number = $request->input('phone_number');
        $user->verified = '1';
        $user->save();
        return Redirect::intended('/');
    }

    public function logout(){
        \Auth::logout();
        return Redirect::to('/');
    }
}
