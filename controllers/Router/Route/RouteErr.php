<?php

namespace Controllers\Router\Route;
;

use Controllers\ErrController;
use Router\Route;

class RouteErr extends Route
{
    //
    //  Instance variables
    //
    private $errController;

    //
    //  Constructor
    //
    public function __construct(ErrController $errController)
    {
        $this->errController = $errController;
    }

    //
    //  Methods
    //
    public function get(array $param = []): void
    {
        $this->displayError($param);
    }

    public function post(array $param = []): void
    {
        $this->displayError($param);
    }

    private function displayError(array $param = []) : void {
        $error = $this->getParam($param, "err_type", false);

        switch ($error) {
            case "404":
                $this->errController->displayErr404();
                break;
            case "401":
                $this->errController->displayErr401();
                break;
            default:
                $this->errController->displayErr404();
                break;
        }
    }
}
