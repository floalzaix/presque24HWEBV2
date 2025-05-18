<?php

namespace Views;

use Config\Config;

$this->layout("templates", ["title" => Config::get("title")]);

?>

<link rel="stylesheet" href="public/css/404.css">


<div class="err">
    <span class="err404">Erreur 404</span>
</div>