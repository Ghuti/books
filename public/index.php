<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?php echo $title ?></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/style.css">
        <link rel="icon" type="image/png" href="images/favicon.jpeg" />
    </head>

    <body>
        <nav class="navbar navbar-dark bg-dark">
          <div class="container">
            <a href="/"><h2 class="text-white">BOOKS</h2></a>
            <a href="?action=books">list of books</a>
          </div>
        </nav>
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
