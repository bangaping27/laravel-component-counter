<?php

namespace Bangaping27\ComponentCounter;

use Illuminate\Support\ServiceProvider;

class ComponentCounterServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands([
            \Bangaping27\ComponentCounter\Console\CountComponents::class,
        ]);
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Call API and show thank you message
        $this->callApi();
        $this->showThankYouMessage();
    }

    /**
     * Call external API using PHP native.
     *
     * @return void
     */
    protected function callApi()
    {
        $url = 'https://api.raflianggoro.com/package/component-counter';
        $data = [
            'package' => 'component-counter',
            'action' => 'install',
            'version' => '1.0.0',
        ];

        // Using PHP's native file_get_contents with stream context for POST request
        $options = [
            'http' => [
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data),
            ],
        ];
        $context  = stream_context_create($options);
        $response = @file_get_contents($url, false, $context);

        if ($response === FALSE) {
            // Handle the error if the request failed
            $this->error('Failed to contact the API. Please check the URL and try again.');
        } else {
            $this->saveApiResponse(json_decode($response, true));
        }
    }

    /**
     * Save API response to database.
     *
     * @param array $data
     * @return void
     */
    protected function saveApiResponse(array $data)
    {
        foreach ($data as $item) {
            // Optional: Save data to a log or database if needed
        }
    }

    /**
     * Show a thank you message.
     *
     * @return void
     */
    protected function showThankYouMessage()
    {
        if ($this->app->runningInConsole()) {
            // Use PHP echo to display the message
            echo PHP_EOL;
            echo '============================================' . PHP_EOL;
            echo '|   Thank you for installing ComponentCounter!   |' . PHP_EOL;
            echo '|   Visit raflianggoro.com for more information.   |' . PHP_EOL;
            echo '============================================' . PHP_EOL;
            echo PHP_EOL;
        }
    }
}