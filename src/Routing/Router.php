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

    public function render(): ?array
    {
        $controllerName = $this->controllerName.'Controller';
        $controller = new $controllerName();

        if ('GET' === $this->requestMethod) {
            if ($this->parameter) {
                $data = $controller->{$this->controllerMethod}($this->parameter);
            } else {
                $data = $controller->{$this->controllerMethod}();
            }

            $data['success_message'] = $controller->getFlash('success_message');
            $data['error_message'] = $controller->getFlash('error_message');

            return $data;
        }

        if ('POST' === $this->requestMethod) {
            $postedData = $_POST;

            if ($this->parameter) {
                $controller->{$this->controllerMethod}($this->parameter, $postedData);
            } else {
                $controller->{$this->controllerMethod}($postedData);
            }

            if ($controller->getRedirectUri()) {
                header('Location: '.$controller->getRedirectUri());
            }
        }

        var_dump($_SERVER['REQUEST_METHOD']);
        throw new \Exception('HTTP method not allowed');
    }
}