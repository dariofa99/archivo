<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Referencia;

class SidebarComposer
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
        $tipos_est = Referencia::where(['categoria'=>'tipo_estado','tabla'=>'archivos'])->paginate(5);
       	
		$tipos_doc = Referencia::where(['categoria'=>'tipo_documento','tabla'=>'archivos'])->paginate(5);
       	
		
		$view->with(['tipos_doc'=>$tipos_doc])
             ->with(['tipos_est'=>$tipos_est]); 
             
       
    }
}