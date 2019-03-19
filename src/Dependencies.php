<?php declare(strict_types = 1);

$injector = new \Auryn\Injector;

/* Http\HttpRequest Object */
$injector->alias('Http\Request', 'Http\HttpRequest');
$injector->share('Http\HttpRequest');
$injector->define('Http\HttpRequest', [
    ':get' => $_GET,
    ':post' => $_POST,
    ':cookies' => $_COOKIE,
    ':files' => $_FILES,
    ':server' => $_SERVER,
]);

/* Http\HttpResponse Object */
$injector->alias('Http\Response', 'Http\HttpResponse');
$injector->share('Http\HttpResponse');

/* Finances\Template\MustacheRenderer Object */
$injector->alias('Finances\Template\Renderer', 'Finances\Template\MustacheRenderer');
$injector->define('Mustache_Engine', [
    ':options' => [
        'loader' => new Mustache_Loader_FilesystemLoader(dirname(__DIR__) . '/templates', [
            'extension' => '.html',
        ]),
    ],
]);

return $injector;