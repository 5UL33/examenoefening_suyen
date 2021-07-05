<?php
include "database.php";
$db = new Database();
$db->login($_POST['email'], $_POST['wachtwoord']);
