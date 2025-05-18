<?php

session_start();

require_once __DIR__."/vendor/autoload.php";
require_once("helpers/psr4_autoloader_class.php");

/*Instanciation de la classe Psr4AutoloaderClass*/
$loader = new \helpers\psr4AutoloaderClass(); /*Instantiation de la classe qui nous permettras de load nos classes*/
$loader->register();

/* ========== Ajout des Namespace dans notre loader ========== */
$loader->addNamespace('Helpers', '/helpers');
$loader->addNamespace('League\Plates', '/vendor/plates-3.6.0/src');
$loader->addNamespace('Controllers','/controllers');
$loader->addNamespace('Config', '/config');
$loader->addNamespace('Models', '/models');
$loader->addNamespace('Router', '/controllers/Router');
$loader->addNamespace('Route', '/controllers/Router/Route');

use \Router\Router;

try {
    $router = new Router(); /*Instanciation de la classe Router*/
    $router->routing($_GET,$_POST); /*Appel de la méthode routing de la classe Router avec les parametres get et post*/
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage(); /*On récupére une erreur et on la met en message*/
}
