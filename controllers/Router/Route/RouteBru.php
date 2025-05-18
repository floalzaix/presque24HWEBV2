<?php

namespace Controllers\Router\Route;
;

use Controllers\BruController;
use Router\Route;

class RouteBru extends Route
{
    //
    //  Instance variables
    //
    private $bruController;

    //
    //  Constructor
    //
    public function __construct(BruController $errController)
    {
        $this->bruController = $errController;
    }

    //
    //  Methods
    //
    public function get(array $param = []): void
    {
        $this->displayError();
    }

    public function post(array $param = []): void
    {
        $this->displayError();
    }

    private function displayError() : void {
        $this->bruController->displayBru();
    }
}
