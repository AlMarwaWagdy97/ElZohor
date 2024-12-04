<?php
namespace App\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

trait FileHandler {

    public function download_file($path = '' , $title  = '')
    {
        $arr = explode('.',$path);
        $mimetype = $arr[count($arr) - 1];
        return response()->download($path , $title . '.' . $mimetype);
    }
    
    public function upload_file($file , $path = '', $key ="")
    {
        $imageName = time(). $key .'.'.$file->extension();
        return "attachments" ."/" . $file->store($path ,'attachment');
    }
    
    public function delete_file($path = '' )
    {
        File::delete($path);
    }
    public function delete_dir($path = '' )
    {
        File::deleteDirectory($path);
    }
    public function loadArrayFromFile($path){
        return File::getRequire($path);
    }
    public function CopyFileContent($src , $target){
        if ($this->FileExists($src))
            File::copy($src , $target);
    }

    public function PutFileContent($path , $content){
        File::put($path , $content);
    }

    public function GetFileContent($path){
        return File::get($path);
    }

    public function FileExists($path){
        return File::exists($path);
    }
}
