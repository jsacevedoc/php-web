<?php

  require 'database.php';

  $message = '';

  if (!empty($_POST['nombre'])) {
    $sql = "INSERT INTO usuarios (nombre) VALUES (:nombre)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nombre', $_POST['nombre']);

    if ($stmt->execute()) {
      $message = 'Nuevo usuario creado';
    } else {
      $message = 'Hubo un error en la creación del usuario';
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Adicion</title>
  </head>
  <body>
    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>Añadir usuario</h1>

    <form action="adicion.php" method="POST">
      <input name="nombre" type="text" placeholder="Introduce tu nombre">
      <input type="submit" value="Enviar">
    </form>

  </body>
</html>