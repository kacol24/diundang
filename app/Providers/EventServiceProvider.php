<?php

namespace App\Providers;

use App\Events\InvitationCreated;
use App\Events\InvitationUpdated;
use App\Listeners\GenerateQrInvitation;
use App\Models\Invitation;
use App\Observers\InvitationObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        InvitationCreated::class => [
            GenerateQrInvitation::class,
        ],

        InvitationUpdated::class => [
            GenerateQrInvitation::class
        ],
    ];

    protected $observers = [
        Invitation::class => [
            InvitationObserver::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
