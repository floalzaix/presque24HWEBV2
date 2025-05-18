<?php

namespace Views;

use Config\Config;

$this->layout("templates", ["title" => Config::get("title")]);

?>

<link rel="stylesheet" href="public/css/401.css">

<div class="err">
    <span class="err401">Erreur 401</span>
</div>
