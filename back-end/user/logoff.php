<?php

session_start();
session_destroy();
header('location: ../../web/user.php');

?>