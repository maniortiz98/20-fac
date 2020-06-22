<?php
   include "../conexion.php"
?>
<!doctype html>
<html lang="en">
<link rel="stylesheet" href="css/style1.css">
  <head>
    <?php include "includes/scripts.php" ?>
    <title>Lista usuarios</title>
  </head>
  <body>
  <?php include "includes/header.php" ?>
    <div class="container">
        <h1>Lista de usuarios </h1>
     <a href="registro_usuario.php" class="btn_new">Crea usuario</a>
<br><br><br>
<div class="table-responsive">
            <table class="table table-bordered  table-responsive-xl">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Correo</th>
                <th scope="col">Usuario</th>
                <th scope="col">Rol</th>
                <th scope="col">Acciones</th>
                </tr>
            </thead>
            <?php           
            $query = mysqli_query($conection, "SELECT u.idusuario, u.nombre, u.correo, u.usuario, r.rol FROM usuario u INNER JOIN rol r ON u.rol = r.idrol WHERE estatus = 1" );
            $result = mysqli_num_rows($query);
            if($result > 0 ){
                while ($data = mysqli_fetch_array($query)){
            ?>
            <tbody>
                <tr>
                <th scope="row"><?php echo $data['idusuario']; ?></th>
                <td><?php echo $data['nombre']; ?></td>
                <td><?php echo $data['correo']; ?></td>
                <td><?php echo $data['usuario']; ?></td>
                <td><?php echo $data['rol']; ?></td>
                <td>
                    <a href="editar_usuario.php?id=<?php echo $data['idusuario']; ?>" class="link_edit">Editar </a>

                    <?php if($data['idusuario'] != 1){ ?>
                    |
                    <a href="eliminar_confirmar_usuario.php?id=<?php echo $data['idusuario']; ?>" class="link_delete">Eliminar</a>
                <?php } ?>
                </td>
                </tr>  
            </tbody>
            <?php
        }
            }
            ?>
            </table>
    </div>
    </div>
  <?php include "includes/footer.php" ?>
   </body>
</html>