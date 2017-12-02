<?php

namespace App;

use Silex\Application;

class ServicesLoader
{
    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function bindServicesIntoContainer()
    {
        $this->app['tweets.service'] = function() {
            return new Services\TweetsService($this->app['twitter']);
        };
    }
}

