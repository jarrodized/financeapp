<?php declare(strict_types = 1);

namespace Finances\Controllers;

use Http\Response;

class HomeController
{
    private $response;

    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    public function show()
    {
        $this->response->setContent('Hello World');
    }
}