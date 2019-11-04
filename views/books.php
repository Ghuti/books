<?php $title = "Liste des livres" ?>
<?php ob_start(); ?>
<h1>LIST OF BOOKS</h1>

<ul style="list-style:none; margin-left:0; padding-left:0;">
  <div class="row">
    <?php
      foreach ($books as $book) { //echo '<li>' .$book['title'].'<li>' ;
      ?>

      <li class="li-nop">
        <div class="card-group">
          <div class="card blups">
            <?php echo '<img class="card-img img-nop" src="' . $book['imageLink'] .'">'; ?>
            <div class="card-body">
              <h5 class="card-title"><?php echo $book['title']; ?></h5>
              <p class="card-text">Author : <?php echo $book['author']; ?></p>
              <p class="card-text">country : <?php echo $book['country']; ?></p>
              <p class="card-text">language : <?php echo $book['language']; ?></p>
            </div>
            <div class="card-footer">
              <a role="button" class="btn btn-primary btn-block" href="<?php echo $book['link']; ?>">learn more</a>
            </div>
          </div>
        </div>



      </li>
     <?php
    }
  ?>
  </div>
</ul>

<pre>
<?php var_dump($books); ?>
</pre>
<?php $content = ob_get_clean(); ?>

<?php require('public/index.php'); ?>
