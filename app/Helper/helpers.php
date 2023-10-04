<?php

use Illuminate\Support\Facades\File;


function handleUpload($inputName, $model = null){
        try {
            if(request()->hasFile($inputName)){           
                if($model && File::exists(public_path($model->{$inputName}))){
                    File::delete(public_path($model->{$inputName}));
                }
                $file = request()->file($inputName);
                $fileName = rand().$file->getClientOriginalName();
                $file->move(public_path('/uploads'), $fileName);
    
                $filePath = "/uploads/".$fileName;
                return $filePath;           
             }
             

        }

        catch(\Exception $e){
           throw $e;
        }
}


// delete files

function deleteFileIfExist($filePath){
    try {
                  
            if(File::exists(public_path($filePath))){
                File::delete(public_path($filePath));
            }                      
         }
         
    catch(\Exception $e){
        throw $e;
     }

    }

    function getColor($index){
        $colors = ['#558bff', '#fecc90','#ff885e','#282828','#190844','#9dd3ff'];
    
        return $colors[$index % count($colors)];
    }
