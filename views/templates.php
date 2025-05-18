<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./public/css/teamplate.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->e($title)?></title>
</head>
<body>
    <header>
        <div class="header-flex">
            <h1><?= $this->e($title)?></h1>
            <nav class="navbar">
                <!-- Créaion des lien clicable qui modifierons l'URL avec une action pour le routeur-->
                <a href="index.php?action=map">Map</a>
                <a href="index.php?action=monstre">Monstre</a>
                <a href="index.php?action=broceliande">L’affaire de Broceliande</a>
                <a href="index.php?action=profil">Profil</a>
            </nav>
        </div>
    </header>
    <main id="contenu">
    <?= $this->section('content')?>
    </main>
</body>
</html>