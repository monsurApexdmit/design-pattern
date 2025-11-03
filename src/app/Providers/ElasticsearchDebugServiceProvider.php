<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;

class ElasticsearchDebugServiceProvider extends ServiceProvider
{
    public function boot()
    {
        try {
            // Log package discovery details
            $packagePath = base_path('vendor/matchish/laravel-scout-elasticsearch');
            $commandsPath = $packagePath . '/src/Console/Commands';

            Log::info('Scout Elasticsearch Package Debug', [
                'package_exists' => File::exists($packagePath),
                'commands_path_exists' => File::exists($commandsPath),
                'discovered_commands' => File::exists($commandsPath)
                    ? array_map('basename', File::files($commandsPath))
                    : 'No commands found',
                'scout_driver' => config('scout.driver'),
                'elasticsearch_hosts' => config('elasticsearch.connections.default.hosts'),
            ]);

            // Try to load specific command classes
            $commandClasses = [
                \Matchish\ScoutElasticSearch\Console\Commands\CreateIndexCommand::class,
                \Matchish\ScoutElasticSearch\Console\Commands\DeleteIndexCommand::class,
            ];

            foreach ($commandClasses as $commandClass) {
                Log::info("Checking command class: $commandClass", [
                    'class_exists' => class_exists($commandClass)
                ]);
            }
        } catch (\Exception $e) {
            Log::error('Scout Elasticsearch Debug Failed', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
        }
    }
}
