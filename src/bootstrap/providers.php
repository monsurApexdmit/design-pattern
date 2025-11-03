<?php

return [
    App\Providers\AppServiceProvider::class,
    Laravel\Scout\ScoutServiceProvider::class,
    Matchish\ScoutElasticSearch\ScoutElasticsearchServiceProvider::class,
    Matchish\ScoutElasticSearch\ElasticSearchServiceProvider::class,
    App\Providers\ElasticsearchServiceProvider::class,
    App\Providers\ElasticsearchDebugServiceProvider::class,

];
