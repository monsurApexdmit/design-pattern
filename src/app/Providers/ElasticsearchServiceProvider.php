<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Elastic\Elasticsearch\ClientBuilder;
use Elastic\Elasticsearch\Client;

class ElasticsearchServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(Client::class, function ($app) {
            $config = config('elasticsearch.connections.default');

            $clientBuilder = ClientBuilder::create();

            // Set hosts
            if (!empty($config['hosts'])) {
                $clientBuilder->setHosts($config['hosts']);
            }

            // Set basic authentication
            if (!empty($config['basicAuthentication']['username'])) {
                $clientBuilder->setBasicAuthentication(
                    $config['basicAuthentication']['username'],
                    $config['basicAuthentication']['password'] ?? ''
                );
            }

            return $clientBuilder->build();
        });
    }
}
