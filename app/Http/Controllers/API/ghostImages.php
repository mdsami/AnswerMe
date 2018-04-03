<?php

namespace AnswerMe\Http\Controllers\API;

use Illuminate\Http\Request;
use AnswerMe\Http\Controllers\Controller;
use AnswerMe\GhostImage;

class ghostImages extends Controller
{
  public function ghostImages(Request $request){
    $imagesall = GhostImage::all();
    $_images = [];
   $images=[];
   foreach ($imagesall as $image) 
        {
                 $_images['id']=$image->id;
                $_images['imgUrl']=asset($image->imgUrl);
                 array_push($images,$_images);
        	
        	
        }
  array_push($_images,$images) ;
    return response()->json(['status'=>200, 'images'=>$images]);
  }
}
