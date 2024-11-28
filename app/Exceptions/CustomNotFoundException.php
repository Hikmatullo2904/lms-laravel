<?php

namespace App\Exceptions;

use Exception;

class CustomNotFoundException extends Exception
{
    protected $code = Response::HTTP_NOT_FOUND;

    protected $message = 'not found';

    public function __construct(string $message = null, int $code = null)
    {
        parent::__construct($message ?? $this->message, $code ?? $this->code);
    }

    public function render($request)
    {
        return response()->json([
            'success' => false,
            'message' => $this->getMessage(),
            'data' => null
        ], $this->getCode());
    }
}
