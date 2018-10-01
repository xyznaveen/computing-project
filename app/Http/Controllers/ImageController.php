<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function upload(Request $request) 
    {
        // check if photo was submitted or not
    	if ($request->file('photo')) {
    		
    		$ipath = 'public/images';

            // store the image on a specific location
    		$request->file('photo')->store($ipath);
    		
            // insert the path to the database.
    		$image = new \App\Image();
    		$image->user_id = auth()->user()->id;
    		$image->image_url = 'storage/images/' .$request->photo->hashName();
    		$image->save();

            // redirect back to the images list
    		return redirect()->route('il',[auth()->user()->id]);
    	}
    }

    public function list($id) 
    {

        // not used
    	$images = \App\Image::where('user_id','=',$id)->get();

    	return view('images', compact('images'));
    }
}
