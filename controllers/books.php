<?php
require('models/books.php');

function listBooks($page)
{
  global $limit;
  $bookTotal = countBooks();
  $pagesTotales = ceil($bookTotal/$limit);
  if ($page > $pagesTotales) {
    $page = 1;
  }
  $start = ($page-1)* $limit;

  $books = getBooks((string) $start);
  require('views/books.php');
}

function showBook($id)
{
  $book = getbook($id);
  //var_dump($book);
  require('views/book.php');
}
