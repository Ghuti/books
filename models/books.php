<?php

require_once('utils/db.php');

$limit = 20;
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
  global $limit;
  $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
  $count = countBooks('');

  $offset = ($page -1) * $limit;
  $db = dbConnect();


  $stmt = $db->prepare('SELECT
    b.*, a.name AS author
    FROM books AS b
    LEFT JOIN authors AS a
    ON b.author_id = a.id
    LIMIT :offset  , :limit
  ');

  $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
  $stmt->bindParam(':limit', $limit,  PDO::PARAM_INT);
  $stmt->execute();

  return $stmt->fetchAll(PDO::FETCH_ASSOC);


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
