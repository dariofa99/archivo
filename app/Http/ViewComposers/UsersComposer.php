<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Dependencia;
use App\Role;

class UsersComposer
{
    

    public function __construct()
    {
       
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $dependencias = Dependencia::pluck('nombre','id');
        $roles = Role::pluck('display_name','id');
       	
		
		
        $view->with(['dependencias'=>$dependencias])
        ->with(['roles'=>$roles]); 
             
       
    }
}