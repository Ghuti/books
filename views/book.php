<?php $title = $book['title'] ?>
<?php ob_start(); ?>

<?php echo $book['title'];?>
<?php echo '<img class="card-img" src="' . $book['image'] .'">'; ?>

<?php $content = ob_get_clean(); ?>
<?php require('public/index.php'); ?>
