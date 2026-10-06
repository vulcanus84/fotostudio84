<?php
//Test
include('assets/php/main_functions.php');
$assetImageBase = __DIR__ . '/assets/img';
$webAssetImageBase = 'assets/img';

?>
<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Fotostudio84 in Schönenwerd – kreative Fotografie mit dem Auge fürs Detail">
    <title>Fotostudio84 | Fotostudio Schönenwerd</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header class="site-header">
    <a class="brand" href="#top" aria-label="Fotostudio84 Startseite">
        <img src="assets/img/studio84-logo.png" alt="Fotostudio84 Logo" loading="lazy">
    </a>
    <button class="menu-toggle" type="button" aria-label="Navigation öffnen" aria-expanded="false">
        <span></span><span></span>
    </button>
    <nav class="main-nav" aria-label="Hauptnavigation">
        <a href="#about">Über mich</a>
        <a href="#shootingdays">Shooting-Days</a>
        <a href="#studio">Studio</a>
        <a href="#portfolio">Portfolio</a>
        <a href="#contact">Kontakt</a>
    </nav>
</header>

<main id="top">

<?php
    include('hero.php');
    include('about.php');
    include('shootingDays.php');
    include('studio.php');
    include('portfolio.php');
    include('contact.php');
?>

</main>

<footer>
    <span>© <?= date('Y') ?> Fotostudio84</span>
    <span>Schönenwerd</span>
</footer>

<script src="assets/js/main.js"></script>
</body>
</html>
