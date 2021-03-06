<?php

namespace App\Providers;

use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;

class AdminSectionsServiceProvider extends ServiceProvider
{

    /**
     * @var array
     */
    protected $sections = [
        \App\Description::class => 'App\Http\Sections\Descriptions',
        \App\Stop::class => 'App\Http\Sections\Stops',
        \App\Bus::class => 'App\Http\Sections\Buses',
        \App\Route::class => 'App\Http\Sections\Routes',
        \App\User::class => 'App\Http\Sections\Users',
        \App\City::class => 'App\Http\Sections\Cities',
        \App\Country::class => 'App\Http\Sections\Countries',
    ];

    /**
     * Register sections.
     *
     * @return void
     */
    public function boot(\SleepingOwl\Admin\Admin $admin)
    {
    	//

        parent::boot($admin);
    }
}
