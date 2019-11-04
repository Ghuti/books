<?php
require('models/books.php');

function listBooks()
{
  $books = getBooks();
  require('views/books.php');
}

function showBook($id)
{
  $book = getbook($id);
  //var_dump($book);
  require('views/book.php');
}
