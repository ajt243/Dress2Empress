<?php if (is_user_logged_in()) { ?>
    <a href="<?php echo logout_url(); ?>" class="logout-button">Log Out</a>

<?php } else { ?>
    <h1>Login</h1>
    <?php echo login_form('/', $session_messages); ?>
<?php }  ?>
