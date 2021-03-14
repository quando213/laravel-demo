<?php


namespace App\Services\Eloquent;

use App\Services\Interfaces\FileService;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class FileServiceImp implements FileService
{
    public function storeImage($file, $folder)
    {
        $path = $folder.'/';
        if (!file_exists('images/upload/'.$path)) {
            mkdir('images/upload/'.$path, 666, true);
        }
        $filename = Str::random(10).'-'.round(microtime(true)).'.jpg';
        Image::make($file)->save('images/upload/'.$path.$filename);
        return [
            'name' => $filename,
            'image' => $path.$filename,
            'image_url' => url('images/upload/'.$path.$filename),
        ];
    }
}
