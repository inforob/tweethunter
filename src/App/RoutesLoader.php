<?php

namespace App;

use Silex\Application;

class RoutesLoader
{
    private $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->instantiateControllers();

    }

    private function instantiateControllers()
    {
        $this->app['tweets.controller'] = function() {
            return new Controllers\TweetsController($this->app['tweets.service']);
        };
    }

    public function bindRoutesToControllers()
    {
        // controller factory
        $api = $this->app["controllers_factory"];
        // get tweets by screen_name
        $api->get('/tweets/{screen_name}', "tweets.controller:getByScreenName");
        // mount route
        $this->app->mount($this->app["api.endpoint"].'/'.$this->app["api.version"], $api);
    }
}

