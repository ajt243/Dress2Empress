<?php
$display = $_GET['id'];

$result = exec_sql_query(
    $db,
    "SELECT * FROM posts WHERE (posts.id = :id) ",
    array(':id' => $display)

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

    <title>DRESS 2 EMPRESS</title>
</head>

<body>
    <?php include 'includes/header.php'; ?>
    <?php include "includes/login.php"?>

    <?php foreach ($records as $record) { ?>
        <?php
        $post_id = $record["id"];

        $res = exec_sql_query(
            $db,
            "SELECT * FROM post_tags INNER JOIN tags ON (tags.id = post_tags.tag_id) WHERE (post_id = $post_id);"
        );

        $tags = $res->fetchAll();
        $file_url = '/public/uploads/posts/' . $record['id'] . '.jpg';

        ?>



        <div class="row ">


            <!-- Source: https://www.pinterest.com/pin/329255422772489243/ -->
            <img class="view_img" alt="sample image" src="<?php echo htmlspecialchars($file_url); ?>">

            <div class="col view_title">
                <h1> <?php echo htmlspecialchars($record['title']); ?> </h1>
                <p> <?php echo htmlspecialchars($record['description']); ?></p>
                <div class="view_others">
                    <h2> View Others Like This</h2>
                    <?php foreach ($tags as $tag) { ?>
                        <a class="view_button <?php echo $tag["tag_name"]; ?>"><?php echo $tag["tag_name"]; ?></a>
                    <?php } ?>
                </div>
            </div>


        </div>

    <?php } ?>


</body>

</html>
