<?php

namespace App\Services;

class TweetsService
{

	private $twitterHandler ;

	public function __construct( $app ) {

		$this->twitterHandler = $app;
	}
    
    public function getTweetsByUserScreenName( $screen_name )
    {

		$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
		$getfield = '?screen_name='. trim(preg_replace('/-+/', '-', $screen_name));
		$requestMethod = 'GET';

		$dataRequest = $this->twitterHandler->setGetfield($getfield)
		    ->buildOauth($url, $requestMethod)
		    ->performRequest();


		return json_decode($dataRequest); 


    }

}
