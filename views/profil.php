<?php

namespace Views;

use Config\Config;

$this->layout("templates", ["title" => Config::get("title")]);

?>

<div class="profil">
    <h1>Profil :</h1>
    <h3><?= $name ?></h3>
    <h3><?= $surname ?></h3>
    <h4><?= $status ?></h4>
</div>
