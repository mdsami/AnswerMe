<?php

namespace AnswerMe\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Validator;

class Controller extends BaseController
{
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

// ----------------------------------------------------------------

    protected function shortenText($text, $target){
      $count = count(explode(' ', $text));
		  if($count > $target){
		      $newText = "";
			    $arrayText = [];
			    $arrayText = explode(' ', $text);
			    for($t = 0; $t < $target; $t++){
				        $newText .= $arrayText[$t]." ";
			    }
			    $text = $newText."...";
        }
		   return $text;
	  }

// ----------------------------------------------------------------

	protected function SaveFile($object_table, $cloName, $fileName, $path){
    if(request()->hasFile($fileName))
		{
			$file = request()->file($fileName);
			$filename = str_random(6).'_'.time().'.'.$file->getClientOriginalExtension();
			$file->move($path,$filename);
			$object_table->$cloName = $path.'/'.$filename;
		}
  }

// ----------------------------------------------------------------

	 protected function DeleteFile($filePath){
		 if(file_exists($filePath)){
			 unlink(public_path($filePath));
		 }
	 }
// ----------------------------------------------------------------

   protected function BF2a_Crypt($password){
     $salt = "$2a$"."10$1234567890123456789012";
     return crypt($password, $salt);
   }

// ----------------------------------------------------------------
    protected function sendSMS($phone, $msg){
    }
// ----------------------------------------------------------------
    protected function verCode(){
      //return rand(100000,999999);
      return 123456;
    }


}
