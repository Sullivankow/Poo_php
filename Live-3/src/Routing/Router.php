<?php

namespace App\Routing;

class Router
{
    private string $controllerMethod;
    private string $controllerName;
    private ?int $parameter = null;

    public function __construct(private readonly string $requestMethod, string $uri)
    {
        if ('/' === $uri) {
            $uri = '/homepage/index';
        }

        $uriExploded = explode('/', $uri);
        array_shift($uriExploded);

        if (count($uriExploded) < 2) {
            throw new \Exception('Page not found');
        }

        $controllerName = 'App\Controller\\';
        $counter = 1;
        $uriLength = count($uriExploded);

        if (is_numeric($uriExploded[$uriLength - 1])) {
            $this->parameter = array_pop($uriExploded);
        }

        $this->controllerMethod = array_pop($uriExploded);
        $uriLength = count($uriExploded);

        foreach ($uriExploded as $uriPart) {
            if (!$uriPart) {
                continue;
            }

            $separator = '\\';
            if ($counter === $uriLength) {
                $separator = '';
            }

            $controllerName .= ucfirst($uriPart).$separator;

            $counter++;
        }

        if ('App\Controller\\' === $controllerName) {
            throw new \Exception('Page not found');
        }

        $this->controllerName = $controllerName;
    }

    public function render(): array
    {
        $controllerName = $this->controllerName.'Controller';
        $controller = new $controllerName();

        if ('GET' === $this->requestMethod) {
            if ($this->parameter) {
                $data = $controller->{$this->controllerMethod}($this->parameter);
            } else {
                $data = $controller->{$this->controllerMethod}();
            }
        } elseif ('POST' === $this->requestMethod) {

        }

        return $data;
    }
}