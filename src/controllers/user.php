<?php

use Ecos\Model\Usuario;

 // instancia o controller
$controller = $app['controllers_factory'];
$view = $app['twig'];

$controller->get('/dados',function() use ($view){

    $data = Usuario::all();

    return $view->render('Profile.html.twig',['users'=>$data]);
    
});


return $controller;