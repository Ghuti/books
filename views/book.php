<?php $title = $book['title'] ?>
<?php ob_start(); ?>


<div class="row">
  <div class="col-4">
    <?php echo '<img class="card-img" src="' . $book['image'] .'">'; ?>
  </div>
  <div class="col-auto">
    <?php echo $book['title'];?>
    <br>
    <?php echo $book['author'];?>
    <br>
    <?php echo $book['pages'];?>
    <br>
    <?php echo $book['year'];?>
    <br>
    <?php echo $book['language'];?>
    <br>
    <?php echo $book['country'];?>
  </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('public/index.php'); ?>

<?php /* if($id)
{
  $stmt = $db->prepare('SELECT * FROM books WHERE id=:id');
  $stmt->bindParam('id', $id, PDO::PARAM_INT);
  $stmt->execute();
  $book = $stmt->fetch(PDO::FETCH_ASSOC);
  //var_dump($book);
} */?>
