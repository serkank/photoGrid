<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photo;

class AlbumController extends Controller
{
    Public function allPhoto()
    {
    	$photos = Photo::orderBy('sequence')->get();
    	if (isset($photos))
    	{
	    	return response()->json([
	    		'payload' => compact('photos'),
	    		'error' => false,
	    		'message' => 'All photo list'
	    	], 200);
	    }else{
	    	return response()->json([
	    		'payload' => null,
	    		'error' => true,
	    		'message' => 'No photo'
	    	], 403);
	    }
    }
}
