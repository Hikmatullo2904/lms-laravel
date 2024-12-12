<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomAccessDeniedException extends Exception
{
    protected $code = 403;

    protected $message = 'Access Denied';

    /**
     * CustomAccessDeniedException constructor.
     *
     * @param string|null $message Custom error message.
     * @param int|null $code HTTP status code.
     */
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
