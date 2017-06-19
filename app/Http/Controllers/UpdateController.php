<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function update(Request $request) {

    	$user 		= \App\User::find(auth()->user()->id);
    	$profile	= new \App\Profile();

    	$profile = $profile->find(auth()->user()->id);

    	$user->update(['name'=>$request->input('name')]);

    	$profile->address = $request->input('address');
    	$profile->phone_number = $request->input('phone-number');
    	$profile->profile_url = 'N/A';
    	$profile->is_active = 'true';

    	if($request->file('picture')){

    		$imgName = auth()->user()->name.'_'. auth()->user()->email .'_'.auth()->user()->id.'.jpg';

    		$request->file('picture')->storeAs('public/images', $imgName);
    		$profile->profile_image_url	= 'images/'.$imgName;

    	}

    	$profile->save();

    	return redirect()->route('profile');
    }
}
