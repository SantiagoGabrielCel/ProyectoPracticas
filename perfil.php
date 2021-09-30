<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="cascada.css" rel="stylesheet" >
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <title>Hello, world!</title>
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
        <section class="centro col-lg-10">
            <div class="user d-flex flex-row justify-content-center alig-items-center">
                <img src="foto-perfil.jpg" class="img-user rounded-circle mr-2" >
                <h2></h2>
            </div>
            
            

          
          
      </section>
      
      
            
        
        

    </div>

    
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/crud.js"></script>
    
  </body>
</html>