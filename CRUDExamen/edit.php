<?php
include("db.php");
$title = '';
$description= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM task WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $title = $row['nombre'];
    $$apellido = $row['apeliido'];
    $email = $row['email'];
    $telefono = $row['telefono'];
    $puesto = $row['puesto'];
    $ciudad = $row['ciudad'];
    $pais = $row['pais'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $nombre= $_POST['nombre'];
  $apellido = $_POST['apeliido'];
  $email = $_POST['email'];
  $telefono = $_POST['telefono'];
  $puesto = $_POST['puesto'];
  $ciudad = $_POST['ciudad'];
  $pais = $_POST['pais'];

  $query = "UPDATE usuarios set nombre = '$nombre', apellido = '$apellido', email = '$email', telefono = '$telefono', puesto = '$puesto', ciudad = '$ciudad', pais = '$pais' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Usuario actualizado correctamente';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="Actualizar nombre">
        </div>
        <div class="form-group">
          <input name="apellido" type="text" class="form-control" value="<?php echo $apellido; ?>" placeholder="Actualizar apellido">
        </div>
        <div class="form-group">
          <input name="email" type="text" class="form-control" value="<?php echo $email; ?>" placeholder="Actualizar Email">
        </div>
        <div class="form-group">
          <input name="telefono" type="text" class="form-control" value="<?php echo $telefono; ?>" placeholder="Actualizar telefono">
        </div>
        <div class="form-group">
          <input name="puesto" type="text" class="form-control" value="<?php echo $puesto; ?>" placeholder="Actualizar puesto">
        </div>
        <div class="form-group">
          <input name="ciudad" type="text" class="form-control" value="<?php echo $ciudad; ?>" placeholder="Actualizar ciudad">
        </div>
        <div class="form-group">
          <input name="pais" type="text" class="form-control" value="<?php echo $pais; ?>" placeholder="Actualizar pais">
        </div>
        <button class="btn-success" name="update">
          Actualizar
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>