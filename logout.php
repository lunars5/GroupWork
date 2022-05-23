<!-- Stops the session to log user or admin out -->

<?php
    session_start();

    unset($_SESSION['admin']);
    unset($_SESSION['user']);

    echo '<p>logged out</p>'

?>