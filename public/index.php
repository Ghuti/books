<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name='viewport' content="width=device-width">
        <title><?php echo $title ?></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/style.css">
        <link rel="icon" type="image/png" href="images/favicon.jpeg" />
    </head>

    <body>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/">Books</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?action=books">List of books</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>
      <!--nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white">
        <div class=container>
          <div class="row">
            <a class="navbar-brand" href="/"><h2 class="text-white">BOOKS</h2></a>
            <ul class="nav navbar-nav navbar-right">
              <li class="nav-item active">
                <a class="nav-link" href="/">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?action=books">List of books</a>
              </li>
            </ul>
            <form class="form-inline my-2 my-lg-0 navbar-right">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <a href="?action=book&id=<?php// echo $book['id']; ?>" class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</a>
            </form>
          </div>
        </div>
      </nav-->
      <div class="container">
        <?php echo $content ?>
      </div>

      <footer class="py-4 bg-dark text-white">
        <div class="container text-center">
          <small>Copyright &copy; Ghutilife</small>
        </div>
      </footer>
    </body>
</html>
