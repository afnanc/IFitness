<?php
session_start();
$_SESSION = array();
session_destroy();
header("location: /CPS714/iFitness/");
exit;