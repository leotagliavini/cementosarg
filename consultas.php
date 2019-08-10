<?php
session_start();

if ($_SESSION["id_user"] != session_id()) {
header("Location: index.php");
}
?>