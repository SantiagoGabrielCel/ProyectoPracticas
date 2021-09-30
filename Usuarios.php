<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="cascada.css" rel="stylesheet" >
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    

    <title>Usuarios</title>
  </head>
  <body>
    <div class="container_fluid">
        <div class="row">
          <div class="col-12 bg-primary">
            <nav class="navbar navbar-light"> 
              <div class="container-fluid">
                <?php
                    $hoy = getdate();
                    echo '<h5 class="text-light">'.$hoy['weekday'].' '.$hoy['mday'].' '.$hoy['month'].' '.$hoy['year'].'</h5>';
            
                    
                ?>
                <h3>Tienda Administracion</h3>
                <div class="dropdown">
                    <a class="dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                      <img src="foto-perfil.jpg" class="perfil rounded-circle mr-2" >
                      <span class="bg-light">Tomas Peralta</span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                  </div>

              </div>
                
                
              </nav>
            </div>

        </div>
        

        <div class="row">
          <div class="d-flex col-lg-2 b bg-primary">
            <div class="sidebar_container">
              <nav class="menu">
                <ul>
                  <li>
                    <a href="*" class="d-block text-light p-3">Inicio</a>
                  </li>
                  <li>
                    
                    <a href="productos.php" class="d-block text-light active p-3">Productos</a>
                  </li>
                  <li>
                      <a href="pedidos.php" class="d-block text-light p-3">Pedidos</a>
                  </li>
                  <li>
                      <a href="Usuarios.php" class="d-block text-light p-3">Usuarios</a>
                  </li>
                  <li>
                      <a href="Roles.php" class="d-block text-light p-3">Roles</a>
                  </li>
                  
                </ul>
        
              </nav>
  
          
            </div>


        </div>
        <section class="col-lg-10">
          <h2 class="titulo">Usuarios</h2>
          <nav class="navbar menu navbar-light bg-light">
            <div class="container-fluid">
              
              <form class="d-flex">
                <label>Buscar Usuario:</label>
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                
              </form>
            </div>
          </nav>
          
          <table class="table table-bordered table-striped">
            <thead class="table-dark">
              <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Telefono</th>
                <th scope="col">Rol</th>
                <th scope="col">Estado</th>
                <th scope="col">Acciones</th>
                
              </tr>
            </thead>
            <tbody>
              <tr>
        
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>Otto</td>
                <td>@mdo</td>
                
                <td>
                  
                  <div class="btn-group btn-group-sm">
                    <button type="button" id="edit-product" class="btn btn-primary">Cambiar Rol</button>
                    <button type="button" id="edit-product" class="btn btn-primary">Eliminar Usuario</button>
                    
                    
                  </div>
                </td>
              </tr>
              
            </tbody>
          </table>
          <nav aria-label="...">
            <ul class="pagination">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item active" aria-current="page">
                <a class="page-link" href="#">2</a>
              </li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#">Next</a>
              </li>
            </ul>
          </nav>
        </div>
      </section>
      <div class="modal" id="mimodal" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="titulo-modal"></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="action_page.php" method="post">
              <div class="imgcontainer">
              <img src="foto-perfil.jpg" class="img-user d-flex rounded-circle mr-2" >
              </div>

              <div class="container">
              
              <div class="input-group mb-3">
                <span class="input-group-text" id="disabledTextInput" id="basic-addon1">Nombre</span>
                <input type="text" class="form-control" value="Tomas" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" disabled>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Apellido</span>
                <input type="text" class="form-control" value="Peralta" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" disabled>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Email</span>
                <input type="text" class="form-control" value="tomas_ezequiel@itbeltran.com" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" disabled>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Rol</span>
                <select class="form-select" aria-describedby="basic-addon1" aria-label="Default select example"><br>
                  <option selected>Cliente</option>
                  <option value="1">Administrador</option>
                  
                </select>
              </div>
                
              </div>
            </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
      
            
        
        

    </div>

    
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/crud.js"></script>
    
  </body>
</html>