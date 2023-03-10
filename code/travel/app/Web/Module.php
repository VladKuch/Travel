<?php

namespace App\Web;

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
        $loader->setNamespaces(
            [
                'App\Web\Controller' => APP_PATH . '/Web/controllers/',
                'App\Models'     => APP_PATH . '/Models/',
                'App\Web\View'       => APP_PATH . '/Web/views/',
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
                    'App\Web\Controller'
                );

                return $dispatcher;
            }
        );

        // Registering the view component
        $container->set(
            'view',
            function () {
                $view = new View();

                $view->setViewsDir(
                    APP_PATH . '/Web/views/'
                );
                
                $view->registerEngines(
                    [
                        '.volt' => 'voltService',
                    ]
                );
                
                return $view;
            }
        );
    }
}