<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'php_crud'
) or die(mysqli_erro($mysqli));

?>