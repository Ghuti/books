<?php

require_once('utils/db.php');

function getBooks()
{
  $db = dbConnect();

  $stmt = $db->prepare('SELECT
    b.*, a.name AS author
    FROM books AS b
    LEFT JOIN authors AS a
    ON b.author_id = a.id
  ');

  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
  /*
  $file = file_get_contents('json/books.json');
  $books = json_decode($file, true);
  return $books;*/
}

function getBook($id)
{
  $db = dbConnect();

  $stmt = $db->prepare('SELECT
    b.*, a.name AS author
    FROM books AS b
    LEFT JOIN authors AS a
    ON b.author_id = a.id
    WHERE b.id = :id
  ');

  $stmt->bindParam(':id', $id, PDO::PARAM_INT);

  $stmt->execute();

  return $stmt->fetch();
}
?>
