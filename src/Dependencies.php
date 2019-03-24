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
$injector->alias('Finances\Template\Renderer', 'Finances\Template\TwigRenderer');
$injector->define('Mustache_Engine', [
    ':options' => [
        'loader' => new Mustache_Loader_FilesystemLoader(dirname(__DIR__) . '/templates', [
            'extension' => '.html',
        ]),
    ],
]);

/* Finances\Page\FilePageReader Object */
$injector->define('Finances\Page\FilePageReader', [
    ':pageFolder' => __DIR__ . '/../pages',
]);
$injector->alias('Finances\Page\PageReader', 'Finances\Page\FilePageReader');
$injector->share('Finances\Page\FilePageReader');

/* Finances\Template\Twig_Environment Object */
$twigEnvironmentFactory = function() use ($injector) {
    $loader = new Twig_Loader_Filesystem(dirname(__DIR__) . '/templates');
    $twig = new Twig_Environment($loader);
    return $twig;
};

$injector->delegate('Twig\Environment', $twigEnvironmentFactory);
//$injector->delegate('Twig_Environment', $twigEnvironmentFactory);

$injector->alias('Finances\Template\FrontendRenderer', 'Finances\Template\FrontendTwigRenderer');
$injector->alias('Finances\Menu\MenuReader', 'Finances\Menu\ArrayMenuReader');
$injector->share('Finances\Menu\ArrayMenuReader');

return $injector;