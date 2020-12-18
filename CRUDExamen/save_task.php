<?php

include('db.php');

if (isset($_POST['save_task'])) {
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $email = $_POST['email'];
  $telefono = $_POST['telefono'];
  $puesto = $_POST['puesto'];
  $ciudad = $_POST['ciudad'];
  $pais = $_POST['pais'];
  $query = "INSERT INTO usuarios(nombre, apellido, email, telefono, puesto, ciudad, pais) VALUES ('$nombre', '$apellido', '$email', '$telefono', '$puesto', '$ciudad', '$pais')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Guardado';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}
