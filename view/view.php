
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf8">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
  </head>
    <body>
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
      </button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="formulario">
        <label for="lname">Nombre:</label><br>
        <input type="text" id="nombre" name="lname"><br>
        <label for="fname">Precio:</label><br>
        <input type="text" id="precio" name="fname"><br>
        <label for="fname">Descripcion:</label><br>
        <input type="text" id="descripcion" name="fname"><br>
        <label for="lname">Categoria:</label><br>
        <input type="text" id="categoria" name="lname"><br>
        <button type="submit" class="btn btn-primary">Save changes</button>

      </form>
    

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<table class="table table-dark table-borderless">
          <thead>
            <tr class="bg-primary">
              <td>CODIGO</td>
              <td>NOMBRE</td>
              <td>PRECIO</td>
              <td>ID_CATEGORIA</td>
            </tr>

          </thead>
          <tbody>
            <?php
    
                foreach($matriz as $producto){
                    echo '<tr class="bg-primary">
                          <td>'.$producto["CODIGO"].'</td>
                          <td>'.$producto["nombre"].'</td>
                          <td>'.$producto["precio"].'</td>
						  <td>'.$producto["ID_CATEGORIA"].'</td>
                          <td>
                            <a  class="btn btn-warning" href="?c=cliente&a=Crud&id=<?php echo $r->id; ?>">Editar</a>
                         </td>
                        <td>
                             <a  class="btn btn-danger">Eliminar</a>
                        </td>';
                          
                    
                }
            ?>

          </tbody>
        </table>


        
        <script src="../bootstrap/js/bootstrap.min.js"></script>
        <script src="../js/jquery-3.6.0.min.js"></script>
        <script>
          
        </script>
    </body>
</html>