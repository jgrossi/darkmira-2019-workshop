<?php

declare(strict_types=1);

namespace Acme\Api\Tests;

use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\ServerRequest;

trait MakesHttpRequestsTrait
{
    private $headers = [];

    public function withHeader(string $name, string $content): self
    {
        $this->headers += [$name => $content];

        return $this;
    }

    public function call(string $method, string $uri, array $data = []): ResponseInterface
    {
        $method = strtoupper($method);

        $request = new ServerRequest(
            $_SERVER,
            $_FILES,
            $uri,
            $method,
            'php://input',
            $this->headers,
            $_COOKIE,
            $method === 'GET' ? $data : [],
            $method === 'POST' || $method === 'PUT' ? $data : []
        );

        return $this->router->dispatch($request);
    }
}
