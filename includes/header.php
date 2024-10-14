<?php
require_once "includes/sessions.php";
$session_messages = array();
process_session_params($db, $session_messages);
?>


<header>
    <h1 class="title row">

        <div class="pastel-pink logo">D</div>
        <div class="pastel-blue logo">R</div>
        <div class="pastel-green logo">E</div>
        <div class="pastel-yellow logo">S</div>
        <div class="pastel-blue logo">S</div>
        <div class="logo2">2</div>
        <div class="pastel-pink logo">E</div>
        <div class="pastel-blue logo">M</div>
        <div class="pastel-green logo">P</div>
        <div class="pastel-yellow logo">R</div>
        <div class="pastel-pink logo">E</div>
        <div class="pastel-lavender logo">S</div>
        <div class="pastel-blue logo">S</div>

    </h1>
    <nav>
        <ul>
            <li class="row">
                <a class="row" href="/">
                    <div class="row">
                        <span class="material-symbols-outlined">Home</span>
                        <span class="menu_text">HOME</span>
                    </div>
                </a>
            </li>


            <?php if (is_user_logged_in()) { ?>
                <li class="row">
                    <a class="row" href="/profile">
                        <div class="row">
                            <span class="material-symbols-outlined">person</span>
                            <span class="menu_text">PROFILE</span>
                        </div>
                    </a>
                </li>

            <?php } ?>


            <li class="row">
                <a class="row" href="/insert">
                    <div class="row">
                        <span class="material-symbols-outlined">
                            add_circle
                        </span>
                        <span class="menu_text">CREATE</span>
                    </div>
                </a>
            </li>
        </ul>
    </nav>

</header>
