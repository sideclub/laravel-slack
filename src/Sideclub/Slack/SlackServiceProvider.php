<?php namespace Sideclub\Slack;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;
use ThreadMeUp\Slack\Client;

class SlackServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('sideclub/slack');
    }

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        $this->app['slack'] = $this->app->share(function($app)
        {
            $config = [
                'token' => Config::get('slack::token'),
                'team' => Config::get('slack::team'),
                'username' => Config::get('slack::username'),
                'icon' => 'ICON', // Auto detects if it's an icon_url or icon_emoji
                'parse' => '', // __construct function in Client.php calls for the parse parameter
            ];

            $slackClient = new Client($config);

            return new SlackWrapper($slackClient);
        });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('slack');
	}

}
