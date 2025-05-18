<?php

namespace Views;

use Config\Config;

$this->layout("templates", ["title" => Config::get("title")]);

?>

<link rel="stylesheet" href="public/css/auth.css">

<div class="auth_content">
    <form action="index.php?action=profil" method="POST">
        <input type="text" name="auth_login" id="auth_login" placeholder="Identifiant" />
        <input type="password" name="auth_pwd" id="auth_pwd" placeholder="Mot de passe" />
        <input type="submit" name="submit_button" id="submit_button" />
    </form>
</div>
