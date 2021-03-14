<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FileRequest;
use App\Services\Interfaces\FileService;

class AdminUploadController extends Controller
{
    private $fileService;
    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function storeImage(FileRequest $request)
    {
        $file = $request->file('file');
        $folder = $request->input('folder');
        return $this->fileService->storeImage($file, $folder);
    }
}
