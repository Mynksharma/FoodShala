<?php
require 'includes/common.php';
session_unset();
session_destroy();
header("Location:index.php");
?>