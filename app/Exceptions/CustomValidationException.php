<?php

namespace App\Exceptions;

use Exception;

class CustomValidationException extends Exception
{
    public function render($request): JsonResponse
    {
        return new JsonResponse([
            // This is the array that you will return in case of an error.
            // You can put whatever you want inside.
            'message' => 'There were some errors',
            'status' => false,
            'additionalThings' => 'Some additional things',
            'errors' => $this->validator->errors()->getMessages(),
        ], Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
