<?php

namespace App\Admin;

use Phalcon\Autoload\Loader;
use Phalcon\Di\DiInterface;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\ModuleDefinitionInterface;
use Phalcon\Mvc\View;

class Module implements ModuleDefinitionInterface
{
    public function registerAutoloaders(
        DiInterface $container = null
    )
    {
        $loader = new Loader();

        $loader->setDirectories(
            [
                APP_PATH . '/Api/controllers/',
                APP_PATH . '/Models/',
                APP_PATH . '/Api/helpers/',
                APP_PATH . '/Api/plugins/',
            ]
        );
        
        $loader->setNamespaces(
            [
                'App\Api\Controller'  => APP_PATH . '/Api/controllers/',
                'App\Models'      => APP_PATH . '/Models/',
                'App\Api\Helpers'     => APP_PATH . '/Api/helpers/',
                'App\Api\Plugins'     => APP_PATH . '/Api/plugins/',
            ]
        );

        $loader->register();
    }

    public function registerServices(DiInterface $container)
    {
        // Registering a dispatcher
        $container->set(
            'dispatcher',
            function () {
                $dispatcher = new Dispatcher();
                $dispatcher->setDefaultNamespace(
                    'App\Api\Controller'
                );

                return $dispatcher;
            }
        );

        $container->set(
            'dispatcher',
            function () {
                $eventsManager = new \Phalcon\Events\Manager();
        
                $eventsManager->attach(
                    'dispatch:beforeExecuteRoute',
                    new \App\Api\Plugins\SecurityPlugin()
                );
        
                $containerspatcher = new \Phalcon\Mvc\Dispatcher();
        
                $containerspatcher->setEventsManager($eventsManager);
        
                return $containerspatcher;
            }
        );
    }
}