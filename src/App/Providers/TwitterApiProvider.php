<?php

namespace App\Providers;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Silex\Application;
use Silex\Api\BootableProviderInterface;
use Silex\Api\EventListenerProviderInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;

use TwitterAPIExchange;

class TwitterApiProvider implements 
                            ServiceProviderInterface, 
                            BootableProviderInterface
{
    public function register(Container $app)
    {
        $app['twitter'] = function($app) {
             return new TwitterAPIExchange($app["twitter.settings"]);
        };
    }

    public function boot(Application $app)
    {
        // do something
    }

    public function subscribe(Container $app, EventDispatcherInterface $dispatcher)
    {
        /*
        $dispatcher->addListener(KernelEvents::REQUEST, function(FilterResponseEvent $event) use ($app) {
            // do something
        }); */
    }
}