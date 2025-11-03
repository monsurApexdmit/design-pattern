<?php

return [
    'connections' => [
        'default' => [
            'hosts' => [
                env('ELASTICSEARCH_HOSTS', 'http://elasticsearch:9200')
            ],
        ],
    ],
    'default_connection' => 'default',
];
