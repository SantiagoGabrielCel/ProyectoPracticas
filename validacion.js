function validar(){
	var usuario,contraseña;
	usuario=document.getElementById("usuario").value;
	contraseña=document.getElementById("contraseña").value;
	
	if (usuario=="" || contraseña==""){
		alert("Todos los campos son obligatorios");
		return false;
	}else if(usuario.length>14){
		alert("El nombre de usuario es demasiado largo");
		return false;
	}
}

function validarpelicula(){
	var titulo,anio,puntaje,duracion,genero,descripcion;
	titulo=document.getElementById("titulo").value;
	anio=document.getElementById("anio").value;
	puntaje=document.getElementById("puntaje").value;
	
	if (titulo=="" || anio=="" || puntaje=="" ){
		alert("Todos los campos son obligatorios");
		return false;
	}
}
