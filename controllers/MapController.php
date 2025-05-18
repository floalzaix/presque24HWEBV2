<?php

namespace Controllers;

use League\Plates\Engine;


/**
 * Class MainController pour gérer les actions dans home/search
 * @package Controllers
 */
class MapController {
    private $templates;

    /* Constructeur de la classe MainController */
    public function __construct() {
        $this->templates = new Engine(directory: 'views', fileExtension: "php");
    }  

    public function displayMap(){
        /* Affiche la vue de la page d'accueil */
        echo $this->templates->render('map', []);
    }
}