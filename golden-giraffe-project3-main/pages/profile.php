<?php
require_once "includes/db.php";
require_once 'includes/sessions.php';

$db = init_sqlite_db("db/site.sqlite", "db/init.sql");
process_session_params($db, $session_messages);

if (is_user_logged_in()) {
    $tag_result = exec_sql_query($db, "SELECT * FROM tags;");
    $tags = $tag_result->fetchAll();

    $selected_tag = isset($_GET['tag']) ? $_GET['tag'] : null;

    $sql = "SELECT
    posts.id AS 'post_id',
    posts.title AS 'title',
    posts.description AS 'description',
    tags.tag_name AS 'tag_name'
FROM post_tags
INNER JOIN posts ON posts.id = post_tags.post_id
INNER JOIN tags ON tags.id = post_tags.tag_id";

    if ($selected_tag) {
        $sql .= " WHERE tags.tag_name = :tag_name";
        $params = array(':tag_name' => $selected_tag);
        $result = exec_sql_query($db, $sql, $params);
    } else {
        $result = exec_sql_query($db, $sql);
    }

    $records = $result->fetchAll();

    $posts_with_tags = [];
    foreach ($records as $record) {
        $post_id = $record['post_id'];
        if (!isset($posts_with_tags[$post_id])) {
            $posts_with_tags[$post_id] = [
                'title' => $record['title'],
                'description' => $record['description'],
                'tags' => []
            ];
        }
        $posts_with_tags[$post_id]['tags'][] = $record['tag_name'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pinyon+Script&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="StyleSheet" type="text/css" href="public/styles/site.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - DRESS 2 EMPRESS</title>
</head>

<body>
    <?php include "includes/header.php" ?>


    <?php if (is_user_logged_in()) { ?>
        <a href="<?php echo logout_url(); ?>" class="logout-button">Log Out</a>
        <div class="tags">
            Filter by Tag:
            <?php foreach ($tags as $tag) { ?>
                <a href="/profile?<?php echo http_build_query(['tag' => $tag['tag_name']]); ?>"><?php echo htmlspecialchars($tag['tag_name']); ?></a>
            <?php } ?>

        </div>
        <table class="post_table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Tags</th>
                    <th>Update</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($posts_with_tags as $post_id => $post) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($post['title']); ?></td>
                        <td><?php echo htmlspecialchars($post['description']); ?></td>
                        <td>
                            <?php
                            foreach ($post['tags'] as $tag) {
                                echo htmlspecialchars($tag) . "<br>";
                            }
                            ?>
                        </td>
                        <td>
                            <a href="/edit?<?php echo http_build_query(array('id' => $post_id)); ?>" class="edit-icon">
                                <span class="material-symbols-outlined">edit</span>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <?php echo login_form('/profile', $session_messages); ?>
        <p>Please login to view this page.</p>
    <?php } ?>
</body>

</html>
