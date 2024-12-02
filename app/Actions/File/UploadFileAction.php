<?php

namespace App\Actions\File;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadFileAction
{
    
    /**
     * Store an uploaded file in the "files" directory of the default disk
     *
     * @param  Request  $request
     * @return string
     */
    public function handle(Request $request) {
        return Storage::disk('public')->putFile('files', $request->file('file'));
    }
}