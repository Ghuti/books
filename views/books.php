<?php $title = "Liste des livres" ?>
<?php ob_start(); ?>
<h1>LISTE DES LIVRES</h1>
<p>Bienvenue sur la page des livre</p>

<ul>
  <?php
    foreach ($books as $book) { //echo '<li>' .$book['title'].'<li>' ;
     ?>
      <li>
        <?php echo $book['title']; ?>
        <?php echo '<img src="' . $book['imageLink'] .'">'; ?> 
      </li>

     <?php
    }
  ?>
</ul>

<pre>
<?php var_dump($books); ?>
</pre>
<?php $content = ob_get_clean(); ?>

<?php require('public/index.php'); ?>
