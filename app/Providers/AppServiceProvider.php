<?php

namespace App\Providers;

use App\Models\MailingList;
use App\Observers\MailingListObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        MailingList::observe(MailingListObserver::class);
    }
}
