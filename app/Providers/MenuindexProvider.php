<?php

namespace App\Providers;

use App\Http\View\Composser\Menuindex;
use App\Http\View\Composser\NavbarAdmin;
use App\Http\View\Composser\PricePack;
use Illuminate\Support\ServiceProvider;

class MenuindexProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        view()->composer([  'admin.layouts.table.txtalert' ], Menuindex::class);

        view()->composer([  'admin.layouts.navbar'
        , 'user.layouts.sidebar'  , 'admin.layouts.sidebar' ], NavbarAdmin::class);


        view()->composer([  'emails.layouts.header' ,  'emails.send-otp'   ], Menuindex::class);

        view()->composer([  'admin.Eform.card.pack'   ],  Menuindex::class);


     }
}
