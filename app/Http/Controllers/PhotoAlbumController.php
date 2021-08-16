<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Validator;

class PhotoAlbumController extends Controller
{
    const PAGINATION_LIMIT = 12;
    /**
     * Store new photo at local storege
     */
    public function setPhoto(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $imageName = time().'.'.$request->image->extension();  
     
        $request->image->move(public_path('images'), $imageName);
  
        $photo = new Photo();
        $photo->name = $imageName;
        $photo->tag = $request->linktag ?? null;
        $photo->save();
    
        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName); 
    }

    /**
     * List of photo archive 
     */
    public function getPhoto()
    {
    	$photos = [];
    	// read and send view in database photo list 
        $photos = Photo::orderBy('sequence','asc')->get();
        //paginate(self::PAGINATION_LIMIT);    
    	return view('Album.index', ['photos' => $photos]);
    }


    /**
     * Remove of selected photo
     */
    public function delPhoto(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'pid' => 'required|numeric',
        ]); 

        if($validator->fails())
        {
            return response()->json([
                'error' => true,
                'message' => 'validation error'
            ]);
        }

        $pid = $request->pid;

        $photo = Photo::where('id', $pid);
        if (isset($photo))
        {
            if ($photo->delete())
            {
                return response()->json([
                    'error' => false,
                    'message' => 'photo destroy is ok'
                ]);
            }else{
                return response()->json([
                    'error' => true,
                    'message' => 'photo not destroy'
                ]);
            }
        }else{
            return response()->json([
                'error' => true,
                'message' => 'photo not found'
            ]);
        }
    }

    /**
     * Update sequence value per image
     */
    public function sortPhoto(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'images' => 'required',
        ]); 

        if($validator->fails())
        {
            return response()->json([
                'error' => true,
                'message' => 'validation error'
            ]);
        }
        $stringData = "&".$request->images;
        $parse = explode("&image[]=", $stringData);
        foreach ($parse as $key => $value) {
            if(is_numeric($value))
            {
                $photo = Photo::where('id', $value)->first();
                $photo->sequence = $key;
                $photo->save();
            }
        }
    }
}
