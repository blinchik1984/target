<?php

require_once  '../../vendor/autoload.php';

$locator = new \Symfony\Component\Config\FileLocator(array(__DIR__ . "/config"));

$container = new \Symfony\Component\DependencyInjection\ContainerBuilder();

$containerLoader = new \Symfony\Component\DependencyInjection\Loader\YamlFileLoader($container, $locator);
$containerLoader->load('services.yml');

$context = new \Symfony\Component\Routing\RequestContext();
$context->fromRequest(\Symfony\Component\HttpFoundation\Request::createFromGlobals());


\AdServer\Engine\Engine::run(
    $container,
    new \Symfony\Component\Routing\Router(
        new \Symfony\Component\Routing\Loader\YamlFileLoader($locator),
        'routes.yml',
        [],
        $context
    ),
    new \Symfony\Component\HttpKernel\Controller\ControllerResolver()
);