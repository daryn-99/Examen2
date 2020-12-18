<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-8">
  <div class="row">
    <div class="col-md-8">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="save_task.php" method="POST">
          <div class="form-group">
            <input type="text" name="nombre" class="form-control" placeholder="Nombre" autofocus>
          </div>
          <div class="form-group">
            <textarea name="apellido" rows="2" class="form-control" placeholder="Apellido"></textarea>
          </div>
          <div class="form-group">
            <textarea name="email" rows="2" class="form-control" placeholder="Email"></textarea>
          </div>
          <div class="form-group">
            <textarea name="telefono" rows="2" class="form-control" placeholder="Telefono"></textarea>
          </div>
          <div class="form-group">
            <textarea name="puesto" rows="2" class="form-control" placeholder="Puesto"></textarea>
          </div>
          <div class="form-group">
            <textarea name="ciudad" rows="2" class="form-control" placeholder="Ciudad"></textarea>
          </div>
          <div class="form-group">
            <textarea name="pais" rows="2" class="form-control" placeholder="Pais"></textarea>
          </div>
          <input type="submit" name="save_task" class="btn btn-success btn-block" value="Guardar">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Telefono</th>
            <th>Puesto</th>
            <th>Ciudad</th>
            <th>Pais</th>
            <th>Telefono</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM usuarios";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['apellido']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['telefono']; ?></td>
            <td><?php echo $row['puesto']; ?></td>
            <td><?php echo $row['ciudad']; ?></td>
            <td><?php echo $row['pais']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>