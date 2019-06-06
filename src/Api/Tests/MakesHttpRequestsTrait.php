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
            $serverParams = [],
            $uploadedFiles = [],
            $uri,
            $method,
            $body = $method === 'POST' ? $data : [],
            $this->headers,
            $cookies = [],
            $queryParams = $method === 'GET' ? $data : [],
            $parsedBody = null
        );

        return $this->router->dispatch($request);
    }
}
