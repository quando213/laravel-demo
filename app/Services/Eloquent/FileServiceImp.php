<?php


namespace App\Services\Eloquent;

use App\Services\Interfaces\FileService;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class FileServiceImp implements FileService
{
    public function storeImage($image, $folder)
    {
        $path = $folder.'/';
        if (!file_exists('images/upload/'.$path)) {
            mkdir('images/upload/'.$path, 666, true);
        }
        $filename = Str::random(10).'-'.round(microtime(true)).'.jpg';
        Image::make($image)->save('images/upload/'.$path.$filename);
        return $path.$filename;
    }
}

// image save location
// foreign key constraint
// join in which step?
// ????????
