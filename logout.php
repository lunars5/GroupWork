<?php
    session_start();

    unset($_SESSION['admin']);
    unset($_SESSION['user']);

    echo '<p>logged out</p>'

?>