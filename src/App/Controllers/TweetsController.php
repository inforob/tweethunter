<?php

namespace App\Controllers;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class TweetsController
{

    protected $tweetsService;

    public function __construct($service)
    {
        $this->tweetsService = $service;
    }

    public function getByScreenName( $screen_name )
    {
    	// get all tweets by screen_name depending of limit api (defaul 20)
        return new JsonResponse($this->tweetsService->getTweetsByUserScreenName( $screen_name));
    }


}
