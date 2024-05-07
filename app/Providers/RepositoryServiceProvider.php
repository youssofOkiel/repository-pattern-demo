<?php

namespace App\Providers;

use App\Repositories\Contracts\{TopicRepository, UserRepository};
use App\Repositories\Eloquent\{EloquentTopicRepository, EloquentUserRepository};
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $binds = [
            TopicRepository::class => EloquentTopicRepository::class,
            UserRepository::class => EloquentUserRepository::class
        ];

        foreach ($binds as $contract => $class ){
            $this->app->bind($contract, $class);
        }
    }
}
