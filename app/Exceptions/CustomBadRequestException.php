<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class CustomBadRequestException extends Exception
{
    protected $code = Response::HTTP_BAD_REQUEST;

    protected $message = 'bad request';

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
