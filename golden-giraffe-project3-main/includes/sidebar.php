<?php


$all = exec_sql_query(
  $db,
  "SELECT * FROM tags"
);

$all_tags = $all->fetchAll();



?>
<nav class="sidebar_consumer">

  <h1 class="preferences">PREFERENCES
    <!-- Source: https://fonts.google.com/icons?selected=Material+Symbols+Outlined:tune:FILL@0;wght@400;GRAD@0;opsz@24&icon.query=slide -->

    <span class="material-symbols-outlined">tune</span>
  </h1>
  <h2>Fiter By</h2>
  <?php foreach ($all_tags as $tag) { ?>

    <li class="sort_by"> <a href="/?<?php echo http_build_query(array('filter' => $tag["id"])); ?>"> <?php echo $tag["tag_name"] ?></a> </li>

  <?php } ?>

  <h3><a href="/"> Reset to ALL </a></h3>
</nav>
