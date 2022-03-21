<?php

namespace App\Business;


class ImageUploader
{

    public static function upload($request,$imageKey,$path,$imagePrefix=''){


        $image = $request->file($imageKey);
        $imageName =$imagePrefix.time().'-'.rand(1,99999).'.'.$image->getClientOriginalExtension();
       $result =  $image->move(public_path('web/'.$path),$imageName);
        if ($result){
            return $imageName;
        }else{
            return false;
        }


    }



}
