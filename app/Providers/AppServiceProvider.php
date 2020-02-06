<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use App\Model\SupportTickets;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $SupportTicketss = SupportTickets::where("seen",null)
            ->get();

        View::share('SupportTicketss',$SupportTicketss);
        if(is_null(session()->get('lang'))){
           session()->put('lang','ar');
       }

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
