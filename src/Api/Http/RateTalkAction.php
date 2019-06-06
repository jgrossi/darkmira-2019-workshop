<?php

declare(strict_types=1);

namespace Acme\Api\Http;

use Acme\Domain\RateTalkCommand;
use Acme\Domain\RateTalkHandler;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;

final class RateTalkAction
{
    private $commandHandler;

    public function __construct(RateTalkHandler $handler)
    {
        $this->commandHandler = $handler;
    }

    public function __invoke(ServerRequestInterface $request, array $arguments): ResponseInterface
    {
        $params = $request->getParsedBody();

        $data = $this->commandHandler->handle(
            new RateTalkCommand(
                (int)$arguments['talkId'],
                (int)$params['userId'],
                (int)$params['grade']
            )
        );

        return new JsonResponse($data, 201);
    }
}
