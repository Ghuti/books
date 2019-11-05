<?php $title = "Liste des livres" ?>
<?php ob_start(); ?>
<h1>LIST OF BOOKS</h1>



<ul style="list-style:none; margin-left:0; padding-left:0;">
  <div class="row text-center">
    <?php
      foreach ($books as $book) { //echo '<li>' .$book['title'].'<li>' ;
      ?>

      <li class="li-nop">
        <div class="card">
          <div class="card blups">
            <?php // echo '<img class="card-img" src="' . $book['imageLink'] .'">'; ?>
            <div class="card-body">
              <h5 class="card-title"><?php echo $book['title']; ?></h5>
            </div>
            <div class="card-footer">
              <a role="button" class="btn btn-primary btn-block" href="?action=book&id=<?php echo $book['id'];?>">learn more</a>
              <a role="button" class="btn btn-primary btn-block" href="<?php echo $book['link']; ?>">Add to the cart</a>
            </div>
          </div>
        </div>
      </li>
      <?php
    }
    ?>
  </div>
</ul>

<!--pre>
<?php// var_dump($books); ?>
</pre-->
<?php $content = ob_get_clean(); ?>

<?php require('public/index.php'); ?>
