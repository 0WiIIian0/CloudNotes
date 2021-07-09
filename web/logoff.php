<?php

include_once('../back-end/user/cookie.php');
session_destroy();
header('location: signup.php');

?>