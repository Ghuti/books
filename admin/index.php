<?php
  require_once('../utils/db.php');
  $db = dbConnect();

  //GET books
  $id = isset($_GET['id']) ? (int) $_GET['id'] : null;

  //ADD books
  $sql = "SELECT * FROM authors ORDER BY name";
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $author = $stmt->fetchAll(PDO::FETCH_ASSOC);

  if (isset($_POST['blurpus']))
  {
    $id = isset($post['id']) ? (int) $_POST['id']: null;

    $title = (string) $_POST['title'];
    $description = (string) $_POST['description'];
    $year = (string) $_POST['year'];
    $pages = (string) $_POST['pages'];
    $country = (string) $_POST['country'];
    $language = (string) $_POST['language'];
    $authorID = (string) $_POST['authorID'];
    $wikipedia = (string) $_POST['wikipedia'];

    if (strlen($title) > 255 ){
      $title = substr($title, 0 , 255);
    }
    if (!preg_match('/^(http|https):\/\/([a-z]{2})\.wikipedia\.org\/([a-zA-Z0-9-_\/%:]+)?/i', $wikipedia)){
      $wikipedia = '';
    }
    if ($id)
    {
      $stmt = $db->prepare('UPDATE books SET
        title = :title,
        description = :description,
        Year = :year,
        pages = :pages,
        country = :country,
        language = :language,
        author_id = :author_id,
        wikipedia_link = :wikipedia_link
        WHERE $id= :id
      ');
      $stmt->bindParam(':title', $title, PDO::PARAM_STR);
      $stmt->bindParam(':description', $description, PDO::PARAM_STR);
      $stmt->bindParam(':year', $year, PDO::PARAM_INT);
      $stmt->bindParam(':pages', $pages, PDO::PARAM_INT);
      $stmt->bindParam(':country', $country, PDO::PARAM_STR);
      $stmt->bindParam(':language', $language, PDO::PARAM_STR);
      $stmt->bindParam(':author_id', $authorID, PDO::PARAM_INT);
      $stmt->bindParam(':wikipedia_link', $wikipedia, PDO::PARAM_STR);
    }
    else
    {
      $stmt = $db->prepare('INSERT INTO
        `books` (
          `title`,
          `description`,
          `year`,
          `pages`,
          `country`,
          `language`,
          `author_id`,
          `wikipedia_link`
        )
        VALUES (
          :title,
          :description,
          :year,
          :pages,
          :country,
          :language,
          :author_id,
          :wikipedia_link
        )
      ');
    }

    $stmt->bindParam(':title', $title, PDO::PARAM_STR);
    $stmt->bindParam(':description', $description, PDO::PARAM_STR);
    $stmt->bindParam(':year', $year, PDO::PARAM_INT);
    $stmt->bindParam(':pages', $pages, PDO::PARAM_INT);
    $stmt->bindParam(':country', $country, PDO::PARAM_STR);
    $stmt->bindParam(':language', $language, PDO::PARAM_STR);
    $stmt->bindParam(':author_id', $authorID, PDO::PARAM_INT);
    $stmt->bindParam(':wikipedia_link', $wikipedia, PDO::PARAM_STR);


    $stmt->execute();

    if (!$id) {
      $id = $db->lastInsertId();
      header('Location:'.$_SERVER['REQUEST_URI'].'?id='. $id);
    }

    if($id)
    {
      $stmt = $db->prepare('SELECT * FROM books WHERE id=:id');
      $stmt->bindParam('id', $id, PDO::PARAM_INT);
      $stmt->execute();
      $book = $stmt->fetch(PDO::FETCH_ASSOC);
      //var_dump($book);
    }
  }
?>


<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ADMIN MOTHERF***ER</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </head>
  <body class="mt-3">
    <div class="container blup rtl">
      <h1><?php echo !isset($book) ? "Ajouter un livre" : "Editer :" . $book['title'] ; ?></h1>
      <form class="" action="./<?php echo isset($book) ? '?id=' . $book['id'] : ''; ?>" method="post">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="title">Title</label>
              <input name="title" value="<?php echo isset($book) ? $book['title']:''; ?>" maxlength="25" type="text" class="form-control" id="title" aria-describedby="titleHelp" placeholder="Enter title">
              <small id="titleHelp" class="form-text text-muted">Indiquer titre du livre (entre 0 et 25 caractére)</small>
            </div>
            <div class="form-group">
              <label for="authorID">author</label>
              <select name="authorID" class="form-control" id="authorID">
                <?php
                foreach ($author as $auths)
                {?>
                  <?php if (isset($book) && $book['author_id'] == $auths['id']) { ?>
                    <option selected="selected" value="<?php echo $auths['id']; ?>">
                      <?php echo $auths['name']; ?>
                    </option>
                  <?php } else { ?>
                    <option value="<?php echo $author['id']; ?>">
                      <?php echo $auths['name']; ?>
                    </option>
                  <?php } ?>

                  <!--
                  <?php //if(isset($book) && $book['author_id'] == $author['id'] ) { ?>
                  <option value="<?php// echo $auths['id']; ?>"><?php //echo $auths['name']; ?></option>
                -->
                <?php
                }
                ?>

              </select>
            </div>
            <div class="form-group">
              <label for="pages">pages</label>
              <input name="pages" value="<?php echo isset($book) ? $book['pages']:''; ?>" min="0" type="number" class="form-control" id="pages" >
            </div>
            <div class="form-group">
              <label for="year">Years</label>
              <input name="year" value="<?php echo isset($book) ? $book['year']:''; ?>" type="number" class="form-control" id="year" >
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="description">Description</label>
              <textarea name="description" class="form-control" id="description" placeholder="Required example textarea" >
                <?php echo isset($book) ? $book['description']:''; ?>
              </textarea>
            </div>
            <div class="form-group">
              <label for="wikipedia">Wikipédia link</label>
              <textarea name="wikipedia" class="form-control" id="wikipedia" placeholder="Required example textarea" >
              <?php echo isset($book) ? $book['wikipedia_link']:''; ?>
              </textarea>
            </div>
            <div class="form-group">
              <label for="country">country</label>
              <input name="country" value="<?php echo isset($book) ? $book['country']:''; ?>" maxlength="25" type="text" class="form-control" id="country" aria-describedby="countryHelp" placeholder="Enter country">
              <small id="countryHelp" class="form-text text-muted">Indiquer titre du livre (entre 0 et 25 caractére)</small>
            </div>
            <div class="form-group">
              <label for="language">Language</label>
              <input name="language" value="<?php echo isset($book) ? $book['language']:''; ?>" maxlength="25" type="text" class="form-control" id="language" aria-describedby="languageHelp" placeholder="Enter language">
              <small id="languageHelp" class="form-text text-muted">Indiquer titre du livre (entre 0 et 25 caractére)</small>
            </div>
          </div>
        </div>
        <div class="row">
          <input type="hidden" value="<?php echo isset($book) ? $book['id'] : ''; ?>" name="id" >
          <button name="blurpus" type="submit" class="btn rb-bg btn-lg btn-block">SUBMIT !</button>
        </div>
      </form>
    </div>
  </body>
  <style>
    .blup {
      background: #999999;
    }
    .mwat {
      margin-bottom: 1rem;
    }
    .rb-bg {
      animation: rb-bg 10s linear;
      animation-iteration-count: infinite;
    }

    @keyframes rb-bg {
      100%,0% {
        background: rgba(255, 0, 0, 1);
      }

      25% {
        background: rgba(0, 255, 255, 1);
      }

      50% {
        background: rgba(0, 0, 255, 1);
      }
      75% {
        background: rgba(0, 255, 0, 1);
      }

    }

    /*.rtl {
      animation: rtl 5s linear infinite;
    }

    @keyframes rtl {
      from{
        transform: rotate(0deg);
      }
      to{
        transform: rotate(360deg);
      }
    }*/
  </style>
</html>

<!--option <?php //echo (isset($book) && $book['author_id'] === $author['id']) ? 'selected' : ''; ?> value="<?php //echo $author['id']; ?>">
  <?php// echo $author['name']; ?>
 </option>
