<?php namespace Sideclub\Slack;

use ThreadMeUp\Slack\Client;

class SlackWrapper {

    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getClient()
    {
        return $this->client;
    }

}