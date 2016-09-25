<?php
date_default_timezone_set('America/Sao_Paulo');

chdir(dirname(__DIR__));

use Silex\Application;
use Symfony\Component\HttpFundation\Request;
use Symfony\Component\HttpFundation\Response;
use Ecos\Model\Usuario;

require_once 'vendor/autoload.php';



$app = new Application();

$app['debug'] = true;

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => 'src/views',
));

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

$app->register(new Silex\Provider\AssetServiceProvider(), array(

    'assets.named_packages' => array(
        'css' => array('version' => 'css2', 'base_path' => '/assets'),
        'images' => array('base_urls' => array('http://localhost')),
    ),
));

$view = $app['twig'];


// chama os controllers
$user = require('src/controllers/user.php');



//monta as rotas
$app->mount('/user',$user);

$app->get('/',function() use ($view){

    return $view->render('login.html.twig');
});


$app->run();



?>