<?php

namespace App\Http\Controllers\API\V1;

use App\Actions\File\UploadFileAction;
use App\Exceptions\CustomBadRequestException;
use App\Http\Resources\ApiResponse;
use Illuminate\Http\Request;

class FileController
{

    public function __construct(
        protected UploadFileAction $uploadFileAction
    ) {}

    /*
     * @param  Request  $request
     * @return string
     */
    public function upload(Request $request) {
        if($request->hasFile('file')) {
            return new ApiResponse($this->uploadFileAction->handle($request));
        }else{
            throw new CustomBadRequestException('File not found');
        }
    }
}
