<?php
  require_once('../utils/db.php');
  $db = dbConnect();
  $sql = "SELECT * FROM authors ORDER BY name";
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $author = $stmt->fetchAll(PDO::FETCH_ASSOC);

  var_dump($_POST);
  $title = (string) $_POST['title'];
  $description = (string) $_POST['description'];
  $year = (string) $_POST['year'];
  $pages = (string) $_POST['pages'];
  $country = (string) $_POST['country'];
  $language = (string) $_POST['title'];

  if (strlen($title) > 255 ){
    $title = substr($title, 0 , 255);
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
      <form class="" action="./" method="post">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="title">Title</label>
              <input name="title" maxlength="25" type="text" class="form-control" id="title" aria-describedby="titleHelp" placeholder="Enter title">
              <small id="titleHelp" class="form-text text-muted">Indiquer titre du livre (entre 0 et 25 caractére)</small>
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">author</label>
              <select class="form-control" id="exampleFormControlSelect1">
                <?php
                foreach ($author as $auths)
                {?>
                  <option value="<?php echo $auths['id']; ?>"><?php echo $auths['name']; ?></option>
                <?php
                }
                 ?>
                  <option></option>
              </select>
            </div>
            <div class="form-group">
              <label for="pages">pages</label>
              <input name="pages" min="0" type="number" class="form-control" id="pages" >
            </div>
            <div class="form-group">
              <label for="year">Years</label>
              <input name="year" type="number" class="form-control" id="year" >
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="description">Description</label>
              <textarea name="description" class="form-control" id="description" placeholder="Required example textarea" required></textarea>
            </div>
            <div class="form-group">
              <label for="wikipedia">Wikipédia link</label>
              <textarea name="wikipedia" class="form-control" id="wikipedia" placeholder="Required example textarea" required></textarea>
            </div>
            <div class="form-group">
              <label for="country">country</label>
              <input name="country" maxlength="25" type="text" class="form-control" id="country" aria-describedby="countryHelp" placeholder="Enter country">
              <small id="countryHelp" class="form-text text-muted">Indiquer titre du livre (entre 0 et 25 caractére)</small>
            </div>
            <div class="form-group">
              <label for="language">Language</label>
              <input name="language" maxlength="25" type="text" class="form-control" id="language" aria-describedby="languageHelp" placeholder="Enter language">
              <small id="languageHelp" class="form-text text-muted">Indiquer titre du livre (entre 0 et 25 caractére)</small>
            </div>
          </div>
        </div>
        <div class="row">
          <button type="submit" class="btn rb-bg btn-lg btn-block">SUBMIT !</button>
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
