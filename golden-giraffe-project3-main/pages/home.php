<?php
require_once "includes/db.php";
$db = init_sqlite_db("db/site.sqlite", "db/init.sql");

$filter_param = $_GET['filter'] ?? NULL;

// Sorting
$sort_param = $_GET['sort'] ?? NULL;
$sql_order_clause = "";

if (in_array($sort_param, array("alpha"))) {
  if ($sort_param == 'alpha') {
    $sql_order_clause = "ORDER BY posts.title ASC;";
  }
}

if (in_array($filter_param, array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10))) {
  $sql_order_clause = "WHERE (tags.id = $filter_param);";
}



if (!$filter_param) {
  $sql_select_clause =  "SELECT posts.id AS 'posts.id',
  posts.title AS 'title',
  posts.description AS 'description'
  FROM posts
  GROUP BY posts.id ";
} else {
  $sql_select_clause =  "SELECT posts.id AS 'posts.id',
  posts.title AS 'title',
  posts.description AS 'description',
  tags.id AS 'tags.id',
  tags.tag_name AS 'tags_name'
  FROM post_tags
  INNER JOIN posts ON (posts.id = post_tags.post_id)
  INNER JOIN tags ON (tags.id = post_tags.tag_id)";
};



$sql_select_query = $sql_select_clause . $sql_order_clause . ';';
$result = exec_sql_query(
  $db,
  $sql_select_query

);
$records = $result->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Source:https://fonts.google.com/specimen/Comfortaa?query=Comfortaa&classification=Display&stylecount=2 -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">

  <!-- Source:https://fonts.google.com/specimen/Pinyon+Script-->
  <link href="https://fonts.googleapis.com/css2?family=Pinyon+Script&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

  <link rel="StyleSheet" type="text/css" href="public/styles/site.css" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>DRESS 2 EMPRESS- HOME</title>
</head>

<body>
  <?php include "includes/header.php" ?>
  
  <?php include "includes/login.php"?>

  <h1>TRENDING</h1>
  <div class="row">
    <h2 class="sortby">Sort By :
      <a class="a" href="/?<?php echo http_build_query(array('sort' => 'alpha')); ?>">Title |</a>
      <a class="a" href="/?<?php echo http_build_query(array('sort' => '')); ?>">Default</a>
    </h2>
  </div>

  <div class="row">
    <?php include "includes/sidebar.php" ?>

    <ul class="post_list">
      <?php foreach ($records as $record) {
        include "includes/post_records.php";
      } ?>
    </ul>
  </div>

</body>

</html>
