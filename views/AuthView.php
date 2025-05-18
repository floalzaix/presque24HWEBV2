<?php

namespace Views;

use Config\Config;

$this->layout("templates", ["title" => Config::get("title")]);

?>

<link rel="stylesheet" href="public/css/auth.css">

<div class="auth_center">
    <div class="auth_content">
        <h1 class="title-login">Sign-in</h1>
        <form action="index.php?action=auth" method="POST">
            <input type="text" name="auth_login" id="auth_login" placeholder="Identifiant" />
            <input type="password" name="auth_pwd" id="auth_pwd" placeholder="Mot de passe" />
            <input type="submit" name="submit_button" id="submit_button" />
        </form>
        <div class="err_message"><?= $msg ?></div>
    </div>
</div>
