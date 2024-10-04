<?php
define("MAX_FILE_SIZE", 100000000);
$show_confirmation = false;
$upload_source = NULL;
$upload_file_name = NULL;
$upload_file_ext = NULL;


$feedback = array(
    'title' => 'hidden',
    'description' => 'hidden',
    'tags' => 'hidden'
);

$upload_feedback = array(
    "general_error" => false,
    "too_large" => false
);


$form_values = array(
    'title' => '',
    'description' => '',
    'tags' => ''

);

$sticky_values = array(
    'title' => '',
    'description' => '',
    'tags' => ''
);


$res = exec_sql_query(
    $db,
    "SELECT * FROM tags"
);

$tags = $res->fetchAll();


if (isset($_POST['request-info'])) {

    $tag_values = array();
    foreach ($tags as $tag) {
        $tag_values[$tag["id"]] = isset($_POST[$tag["tag_name"]]);
    };

    $upload_source = trim($_POST["source"]); // untrusted
    if ($upload_source == "") {
        $upload_source = NULL;
    }

    $form_values["title"] = ($_POST['title'] == "" ? NULL : trim($_POST['title']));
    $form_values["description"] = ($_POST['description'] == "" ? NULL : trim($_POST['description']));

    $upload = $_FILES["jpg-file"];


    $form_valid = true;

    if (!in_array("true", $tag_values)) {
        $form_valid = false;
        $feedback['tags'] = "";
    }

    if ($form_values['title'] == "") {
        $form_valid = false;
        $form_values['title'] = "";
        $feedback['title'] = "";
    }

    if ($form_values['description'] == "") {
        $form_valid = false;
        $form_values['description'] = "";
        $feedback['description'] = "";
    }
    if (!$upload["error"] == UPLOAD_ERR_OK) {
        $form_valid = false;
        if (($upload["error"] == UPLOAD_ERR_INI_SIZE) || ($upload["error"] == UPLOAD_ERR_FORM_SIZE)) {
            $upload_feedback["too_large"] = true;
        } else {
            $upload_feedback["general_error"] = true;
        }
    }

    if ($upload["error"] == UPLOAD_ERR_OK) {
        $upload_file_name = basename($upload["name"]);

        $upload_file_ext = strtolower(pathinfo($upload_file_name, PATHINFO_EXTENSION));

        if (!in_array($upload_file_ext, array("jpg"))) {
            $form_valid = false;
            $upload_feedback["general_error"] = true;
        }
    }

    if ($form_valid) {
        $show_confirmation = true;
        $result =
            exec_sql_query(
                $db,
                "INSERT INTO posts(title,description, img_source) VALUES (:title,:description, :source)",
                array(
                    ':title' => $form_values['title'],
                    ':description' => $form_values['description'],
                    ':source' =>  $upload_source
                )
            );

        $posts_id = $db->lastInsertId('id');
        $upload_storage_path = 'public/uploads/posts/' . $posts_id   . '.' . $upload_file_ext;

        if (move_uploaded_file($upload["tmp_name"], $upload_storage_path) == False) {
            error_log("Failed to permanently store the uploaded file on the file server. Please check that the server folder exists.");
        }

        foreach ($tag_values as $tag_id => $value) {
            if ($value) {
                $result2 =
                    exec_sql_query(
                        $db,
                        "INSERT INTO post_tags(post_id, tag_id) VALUES (:post_id, :tag_id)",
                        array(
                            ':post_id' => $posts_id,
                            ':tag_id' => $tag_id
                        )
                    );

                //   );
            } else {
                $sticky_values['title'] = htmlspecialchars($form_values['title']);
                $sticky_values['description'] = htmlspecialchars($form_values['description']);
                $sticky_values['tags'] = htmlspecialchars($form_values['tags']);
            }
        }
    }



    $record =  exec_sql_query(
        $db,
        "SELECT * FROM posts
    WHERE (posts.id = $posts_id)
    GROUP BY posts.id "

    )->fetchAll();
}
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
    <?php include "includes/login.php" ?>


    <h1>Create A New Post</h1>

    <?php if ($show_confirmation) { ?>
        <img class="view_img" alt="sample image" src="<?php echo htmlspecialchars($upload_storage_path); ?>">
        <h3> Your Post has been added to the homepage <3 </h3>
                <form class="noborder" action="/insert" method="get" novalidate>
                    <button id="request-submit" type="reload" name="request-reload">Create Another Post </button>
                </form>


            <?php } else { ?>

                <form class="col" action="/insert" method="post" class="row form" enctype="multipart/form-data" novalidate>
                    <div class="form_size">
                        <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_FILE_SIZE; ?>">

                        <?php if ($upload_feedback["too_large"]) { ?>
                            <p class="feedback">Unfortunately, the file you chose failed to upload because it was too big. Please select a file that is no larger than 10 MB.</p>
                        <?php } ?>

                        <?php if ($upload_feedback["general_error"]) { ?>
                            <p class="feedback">Oh No! Something went wrong. Please select an JPG file to upload.</p>
                        <?php } ?>
                    </div>

                    <div class="form_upload">
                        <label for="request-upload"> Upload JPG File:</label>
                        <input id="request-upload" type="file" name="jpg-file" accept=".jpg,image/jpg+xml">
                    </div>

                    <div class="form_source">
                        <label for="upload-source" class="optional">Source URL:</label>
                        <input id="upload-source" type="url" name="source" placeholder="URL where found. (optional)">
                    </div>


                    <div class="form_title">
                        <div id="feedback-classes" class="feedback <?php echo $feedback['title']; ?>"> Enter Valid Title </div>
                        <label for="request-title">Title</label>
                        <input type="text" id="request-title" value="<?php echo htmlspecialchars($sticky_values['title']); ?>" name="title">
                    </div>

                    <div class="form_description">
                        <div id="feedback-classes" class="feedback <?php echo $feedback['description']; ?>"> Enter Valid Description </div>
                        <label for="request-description">Description</label>
                        <textarea name="description" id="request-description"><?php echo htmlspecialchars($sticky_values['description']); ?></textarea>
                    </div>

                    <div class="form_tag cols">
                        <div id="feedback-classes" class="feedback <?php echo $feedback['tags']; ?>"> Select at least 1 Tag </div>
                        <label for="request-tag">Tags</label>
                        <div class="tag_cols">
                            <?php foreach ($tags as $tag) { ?>
                                <div>
                                    <input name="<?php echo $tag['tag_name']; ?>" id="request-tag" type="checkbox" value='<?php echo $tag['tag_name']; ?>'> <?php echo $tag['tag_name']; ?> </input>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                    <button id="request-submit" type="submit" name="request-info">
                        Publish Post </button>
                </form>

            <?php } ?>


</body>

</html>
