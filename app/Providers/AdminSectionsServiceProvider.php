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
