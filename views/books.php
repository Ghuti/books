<?php $title = "Liste des livres" ?>
<?php ob_start(); ?>
<h1>LISTE DES LIVRES</h1>
<p>Bienvenue sur la page des livre</p>
<?php $content = ob_get_clean(); ?>

<?php require('public/index.php'); ?>
