$(document).ready(function(){
    $(obtener_registros());
    function obtener_registros(productos){
        $.ajax({
            url : 'crud-productos.php',
		    type : 'POST',
		    dataType : 'html',
		    data : { productos: productos },
		})

        .done(function(resultado){
            $("#tabla_resultado").html(resultado);
        })
    }

    $("#new-product").click(function(){
        $("#mimodal").modal("show");
        $("#titulo-modal").text("Nuevo Producto");
        $("#guardar").click(function(){
            var codigo=$("#fcodigo").val();
            var nombre=$("#fnombre").val();
            var precio=$("#fprecio").val();
            var stock=$("#fstock").val();
            var descripcion=$("#fdescripcion").val();
            var categoria=$("#fcategoria").val();
           

            $.ajax({
                url: 'new-product.php',
                data : { codigo: codigo , nombre: nombre, precio: precio, stock: stock, descripcion: descripcion, categoria: categoria },
                type : 'POST',
                
                success: function(data) {
                
                    if (data==="0") {
                    
                        alert("No se guardo el producto");
                        
                    }
                    else{
                    
                        alert("Se guardo el producto");
                        $(obtener_registros());
                    }
                }

            });
            

        
        });
            
            
            
              
      });
      $("#edit-product").click(function(){
        $("#mimodal").modal("show");
        $("#titulo-modal").text("Editar Producto");
        var codigo=$("#fcodigo").val();
        var nombre=$("#fnombre").val();
        var precio=$("#fprecio").val();
        var stock=$("#fstock").val();
        var descripcion=$("#fdescripcion").val();
        var categoria=$("#fcategoria").val();
        $.ajax({
            url: 'crud.php',
            data : { codigo: codigo , nombre: nombre, precio: precio, stock: stock, descripcion: descripcion, categoria: categoria },
            type : 'POST',
            beforeSend :function() {
                $('#log').val("Iniciando....");

            },
            /*success: function(data) {
                $('#log').val("Iniciar Sesion");
              
                if (data==="0") {
                  
                    $(location).attr('href','index.php');
                }
                else{
                  
                    $('#error_sesion').html("<div class='alert alert-danger' role='alert'>Usuario o contraseña incorrecta!!</div>");
                }
            }*/
        });
            
              
      });
      $("#new-rol").click(function(){
        $("#mimodal").modal("show");
        $("#titulo-modal").text("Nuevo Rol");
        var codigo=$("#fcodigo").val();
        var nombre=$("#fnombre").val();
        var precio=$("#fprecio").val();
        var stock=$("#fstock").val();
        var descripcion=$("#fdescripcion").val();
        var categoria=$("#fcategoria").val();
        $.ajax({
            url: 'crud.php',
            data : { codigo: codigo , nombre: nombre, precio: precio, stock: stock, descripcion: descripcion, categoria: categoria },
            type : 'POST',
            beforeSend :function() {
                $('#log').val("Iniciando....");

            },
            /*success: function(data) {
                $('#log').val("Iniciar Sesion");
              
                if (data==="0") {
                  
                    $(location).attr('href','index.php');
                }
                else{
                  
                    $('#error_sesion').html("<div class='alert alert-danger' role='alert'>Usuario o contraseña incorrecta!!</div>");
                }
            }*/
        });
            
              
      });
      
      
      
      
    });
        
    