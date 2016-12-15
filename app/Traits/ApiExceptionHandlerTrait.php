<?php

namespace App\Traits;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait ApiExceptionHandlerTrait {

    /**
     *  Determines if request is an API call.
     *
     *  @param Request $request
     *  @return bool
     */
    protected function isApiCall(Request $request) {
        if ($request->is('api/*')) {
            return true;
        }
        return false;
    }

    /**
     * Get a JSON response based on the exception
     *
     * @param Request $request
     * @param Exception $exception
     * @return \Illuminate\Http\JsonResponse
     */
    protected function getJsonResponseForException(Exception $exception) {

        if ($exception instanceof ModelNotFoundException) {
            $message = 'Resource not found';
            $statusCode = 404;
            $errors = $exception->getMessage();
        } else if ($exception instanceof ValidationException) {

            if ($exception->response) {
                $message = $exception->response;
                $statusCode = 400;
            } else {
                $errors = $e->validator->errors()->getMessages();

                $message = $errors;
                $statusCode = 422;
            }

        } else {
            $message = 'Bad request';
            $statusCode = 400;
        }

        return response()->json(['message' => $message, 'error' => $exception->getMessage()], $statusCode);
        // return response()->json(['message' => $message, 'error' => $exception], $statusCode);
    }

}