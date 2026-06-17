<?php
// FILE: app/Providers/AppServiceProvider.php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Use our custom pagination view
        Paginator::defaultView('vendor.pagination.simple-default');
        Paginator::defaultSimpleView('vendor.pagination.simple-default');
    }
}
