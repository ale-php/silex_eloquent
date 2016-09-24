<?php

use Ecos\Model\Usuario;

 // instancia o controller
$controller = $app['controllers_factory'];

$controller->get('/dados',function(){
    
    return Usuario::all();
    
});


return $controller;