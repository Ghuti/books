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
                  echo '<img class="card-img " src="' . $book['image'] .'">';
                }
                else
                {
                  echo '<img class="what" src="public/images/books/Error.png">' ;
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
  <div>
    <nav aria-label="Navigation">
      <ul class="pagination ustify-content-center mt-5">
      <?php if ($page === 1) {?>
        <li class="page-item disabled ">
          <span class="page-link">Précedent</span>
        </li>
      <?php }else {?>
        <li class="page-item">
          <a class="page-link" href="?action=books&page=<?php echo $_GET['page']-1;?>">Précédent</a>
        </li>

      <?php } ?>

        <?php for ($i=1; $i <= $pagesTotales ; $i++) {
          if ($i === $page) {
            echo "<li class='page-item disabled'><a class='page-link' href=''>".$i."</a></li>";
          }else {
            echo "<li class='page-item '><a class='page-link' href='?action=books&page=".$i."'>".$i."</a></li>";
          }
        } ?>

        <?php if ($page >= $pagesTotales) {?>
          <li class="page-item disabled ">
            <span class="page-link">Suivant</span>
          </li>
        <?php }else {?>
          <li class="page-item">
            <a class="page-link" href="?action=books&page=<?php echo $_GET['page']+1;?>">Suivant</a>
          </li>

        <?php } ?>
      </ul>
    </nav>
  </div>


<!--pre>
<?php// var_dump($books); ?>
</pre-->
<?php $content = ob_get_clean(); ?>

<?php require('public/index.php'); ?>
<!-- echo '<img class="card-img" src="' . file_exists($book['image']) ? $book['image'] : "".'">'; -->
