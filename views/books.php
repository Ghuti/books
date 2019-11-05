<?php $title = "Liste des livres" ?>
<?php ob_start(); ?>
<h1>LIST OF BOOKS</h1>



  <div class="row">
    <?php
      foreach ($books as $book) { //echo '<li>' .$book['title'].'<li>' ;
      ?>
        <div class=" col-sm-6 col-md-4 col-xl-3 nop">
          <div class="card what">
            <div class="card-body">
              <?php
                if(file_exists($book['image']))
                {
                  echo '<img class="card-img" src="' . $book['image'] .'">';
                }
                else
                {
                  echo '<img class="what" src="https://media.giphy.com/media/14SGx6CtrLrj7dvOa3/giphy.gif">' ;
                }
                ?>
              <hr>
              <h5 class="card-title"><?php echo $book['title']; ?></h5>
            </div>
            <div class="card-footer">
              <a role="button" class="btn btn-primary btn-block" href="?action=book&id=<?php echo $book['id'];?>">learn more</a>
              <a role="button" class="btn btn-primary btn-block" href="<?php echo $book['link']; ?>">Add to the cart</a>
            </div>
          </div>
        </div>
      <?php
    }
    ?>
  </div>

<!--pre>
<?php// var_dump($books); ?>
</pre-->
<?php $content = ob_get_clean(); ?>

<?php require('public/index.php'); ?>
