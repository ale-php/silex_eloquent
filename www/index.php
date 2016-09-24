<?php
date_default_timezone_set('America/Sao_Paulo');

chdir(dirname(__DIR__));

use Silex\Application;
use Symfony\Component\HttpFundation\Request;
use Symfony\Component\HttpFundation\Response;
use Ecos\Model\Usuario;

require_once 'vendor/autoload.php';



$app = new Application();

$app->register(
    new \JG\Silex\Provider\CapsuleServiceProvider(),
    [
        'capsule.connections' => [
            'default' => [
                'driver'    => 'mysql',
                'host'      => 'localhost',
                'database'  => '',
                'username'  => '',
                'password'  => '',
            ]
        ]
    ]
);

// chama os controllers
$user = require('src/controllers/user.php');



//monta as rotas
$app->mount('/user',$user);

$app->get('/',function(){

    return json_encode(Usuario::all());
});


$app->run();



?>