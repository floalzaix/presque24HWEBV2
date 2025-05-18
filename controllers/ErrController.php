<?php

namespace Controllers;

use League\Plates\Engine;

class ErrController {
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

    public function displayErr404(): void {
        echo $this->template->render("err404", []);
    }

    public function displayErr401(): void {
        echo $this->template->render("err401", []);
    }
}
