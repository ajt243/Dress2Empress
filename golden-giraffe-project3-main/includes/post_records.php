<?php
$post_id = $record["posts.id"];

$res = exec_sql_query(
    $db,
    "SELECT * FROM post_tags INNER JOIN tags ON (tags.id = post_tags.tag_id) WHERE (post_id = $post_id);"
);

$tags = $res->fetchAll();

$file_url = '/public/uploads/posts/' . $record['posts.id'] . '.jpg';

?>

<li class="posts">
    <a class="post-link" href="/view?<?php echo http_build_query(array('id' => $post_id)); ?>">
        <div class="show_details">
            <!-- Source: https://www.pinterest.com/pin/329255422772489243/ -->
            <img class="small_img" alt="sample image" src="<?php echo htmlspecialchars($file_url); ?>">

            <div class="details">
                <div>More Details</div>
                <!-- Source: https://fonts.google.com/icons?selected=Material+Symbols+Outlined:info:FILL@0;wght@400;GRAD@0;opsz@24&icon.query=detail -->
                <span class="material-symbols-outlined">info</span>
            </div>


            <h3> <?php echo $record['title']; ?> </h3>

            <?php foreach ($tags as $tag) { ?>
                <h4 class="button <?php echo $tag["tag_name"]; ?>">
                    <?php echo $tag["tag_name"]; ?>
                </h4>
            <?php } ?>

        </div>
    </a>
</li>
