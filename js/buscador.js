$(obtener_registros());

function obtener_registros(producto)
{
	$.ajax({
		url : 'productos.php',
		type : 'POST',
		dataType : 'html',
		data : {producto: producto},
		})

	.done(function(resultado){
		$("#tabla_resultado").html(resultado);
	})
}

$(document).on('keyup', '#buscar_producto', function()
{
	var valorBusqueda=$(this).val();
	if (valorBusqueda!="")
	{
		obtener_registros(valorBusqueda);
	}
	else
		{
			obtener_registros();
		}
});
