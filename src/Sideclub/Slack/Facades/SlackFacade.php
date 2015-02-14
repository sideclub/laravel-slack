<?php

namespace Sideclub\Slack\Facades;

use Illuminate\Support\Facades\Facade;

class SlackFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'slack';
    }
}