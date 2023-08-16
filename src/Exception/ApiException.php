<?php

declare(strict_types=1);

namespace App\Exception;

use Symfony\Component\HttpFoundation\JsonResponse;

class ApiException extends \Exception
{
    public function getJsonResponse(): JsonResponse
    {
        $body = [
            'code' => $this->getCode(),
            'message' => $this->getMessage(),
        ];

        return new JsonResponse($body, $this->getCode());
    }
}