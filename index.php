<?php

session_start();

require_once __DIR__."/vendor/autoload.php";
require_once("helpers/psr4_autoloader_class.php");

use Router\Router;

/*Instanciation de la classe Psr4AutoloaderClass*/
$loader = new \helpers\psr4AutoloaderClass(); /*Instantiation de la classe qui nous permettras de load nos classes*/
$loader->register();

/* ========== Ajout des Namespace dans notre loader ========== */
$loader->addNamespace('Helpers', __DIR__ . '/Helpers');
$loader->addNamespace('League\Plates', __DIR__ . '/Vendor/plates-3.6.0/src');
$loader->addNamespace('Controllers',__DIR__.'/Controllers');
$loader->addNamespace('Config', __DIR__.'/Config');
$loader->addNamespace('Models', __DIR__.'/Models');
$loader->addNamespace('Router', __DIR__.'/Controllers/Router');
$loader->addNamespace('Route', __DIR__.'/Controllers/Router/Route');

try {
    $router = new Router(); /*Instanciation de la classe Router*/
    $router->routing($_GET,$_POST); /*Appel de la méthode routing de la classe Router avec les parametres get et post*/
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage(); /*On récupére une erreur et on la met en message*/ 
}
