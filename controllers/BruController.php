<?php

namespace Controllers;

use League\Plates\Engine;

class BruController {
    //
    //  Instance variables
    //
    private Engine $template;
    
    //
    //  Constructor
    //
    public function __construct() {
        $this->template = new Engine("views");
    }

    //
    //  Methods
    //

    public function displayBru(): void {
        echo $this->template->render("bru", []);
    }
}