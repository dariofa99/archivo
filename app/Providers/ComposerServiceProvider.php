<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
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
        View::composer([
            'layouts.sidebar', 
            'content.archivo.index'          
             ],'App\Http\ViewComposers\SidebarComposer');

        View::composer([
                'content.users.user_edit',
                'content.users.users_list'           
                 ],'App\Http\ViewComposers\UsersComposer');     

    }
}
