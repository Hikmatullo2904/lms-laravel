<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomBadRequestException extends Exception
{
    protected $code = Response::HTTP_BAD_REQUEST;

    protected $message = 'bad request';

    public function __construct(string $message = null, int $code = null)
    {
        parent::__construct($message ?? $this->message, $code ?? $this->code);
    }

    /**
     * Render the exception as an HTTP response.
     *
     * @param \Illuminate\Http\Request $request The incoming request.
     * @return \Symfony\Component\HttpFoundation\Response The HTTP response in JSON format.
     */
    public function render(Request $request): Response
    {
        return response()->json([
            'success' => false,
            'message' => $this->getMessage(),
            'data' => null
        ], $this->getCode());
    }
}
