<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\UserRegistered' => [
            'App\Listeners\SendWelcomeEmail',
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        // 在每次尝试认证时触发...
        $events->listen('auth.attempt', function ($credentials, $remember, $login) {
            //
        });

        // 登录成功时触发...
        $events->listen('auth.login', function ($user, $remember) {
            //
        });

        // 注销时触发...
        $events->listen('auth.logout', function ($user) {
            //
        });
    }
}
