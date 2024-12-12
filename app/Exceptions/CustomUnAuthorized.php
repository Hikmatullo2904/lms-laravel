<?php

namespace App\Exceptions;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Exception;

class CustomUnAuthorized extends Exception
{
    protected $code = Response::HTTP_UNAUTHORIZED;

    protected $message = 'email or password is incorrect';

    public function __construct(string $message = null, int $code = null)
    {
        parent::__construct($message ?? $this->message, $code ?? $this->code);
    }

    /**
     * Render the exception as an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function render(Request $request) : Response
    {
        return response()->json([
            'success' => false,
            'message' => $this->getMessage(),
            'data' => null
        ], $this->getCode());
    }
}
