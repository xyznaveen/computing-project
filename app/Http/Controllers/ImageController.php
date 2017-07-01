<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function upload(Request $request) 
    {
    	if ($request->file('photo')) {
    		
    		$ipath = 'public/images';

    		$request->file('photo')->store($ipath);
    		
    		$image = new \App\Image();
    		$image->user_id = auth()->user()->id;
    		$image->image_url = 'storage/images/' .$request->photo->hashName();
    		$image->save();

    		return redirect()->route('il',[auth()->user()->id]);
    	}
    }

    public function list($id) 
    {
    	$images = \App\Image::where('user_id','=',$id)->get();

    	return view('images', compact('images'));
    }
}
