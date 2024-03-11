<?php
 session_start();
 /*unset($_SESSION['user_login']);
 header("location: ../index.php");
*/
 if (session_destroy()) {
        header("Location: ../index.php");
    }
?>