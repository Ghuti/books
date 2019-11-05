<?php

require_once('utils/db.php');



function countBooks()
{
  $db = dbConnect();
  $sql = "SELECT count(*) FROM books";
  $stmt = $db->prepare($sql);
  $stmt->execute();
  return $stmt->fetchColumn();
}

function getBooks()
{
  $limit = 20;
  $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
  $count = countBooks('');
  $offset = ($page -1) * $limit;
  $db = dbConnect();


  $stmt = $db->prepare('SELECT
    b.*, a.name AS author
    FROM books AS b
    LEFT JOIN authors AS a
    ON b.author_id = a.id
    LIMIT  :offsete, :limite
  ');

  $stmt->bindParam(':offsete', $offset);
  $stmt->bindParam(':limite', $limit);
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
