<?php

declare(strict_types=1);

namespace Acme\Api\Http;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;

final class HomeAction
{
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        return new JsonResponse([
            'success',
        ], 200);
    }
}
