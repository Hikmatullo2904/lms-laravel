<?php

namespace App\Http\Controllers\API\V1;

use App\Actions\Lesson\CreateLessonAction;
use App\Actions\Lesson\GetLessonByIdAction;
use App\Actions\Lesson\UpdateLessonAction;
use App\Http\Requests\LessonRequest;
use App\Http\Resources\ApiResponse;
use App\Http\Resources\LessonResource;

class LessonController
{
    
    public function __construct(
        public CreateLessonAction $createLessonAction,
        public UpdateLessonAction $updateLessonAction,
        public GetLessonByIdAction $getLessonByIdAction
    ) {}

    

    /**
     * Store a newly created lesson in storage.
     *
     * @param \App\Http\Requests\LessonRequest $request The request containing the validated lesson data.
     * @return \App\Http\Resources\ApiResponse
     */
    public function create(LessonRequest $request) : ApiResponse {
        $this->createLessonAction->handle($request->validated());
        return new ApiResponse(null);
    }

    /**
     * Update the specified lesson in storage.
     *
     * @param int $id The ID of the lesson to update.
     * @param \App\Http\Requests\LessonRequest $request The request containing the validated lesson data.
     * @return \App\Http\Resources\ApiResponse
     */
    public function update(int $id, LessonRequest $request) : ApiResponse {
        $this->updateLessonAction->handle($id, $request->validated());
        return new ApiResponse(null);
    }

    public function getById(int $id) : LessonResource
    {
        return new LessonResource($this->getLessonByIdAction->handle($id));
    }
}
