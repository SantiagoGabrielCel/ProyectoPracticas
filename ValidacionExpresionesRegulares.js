function validarRegex(){
	var usuario,contraseña,sExpresion;
	usuario=document.getElementById("usuario").value;
	contraseña=document.getElementById("contraseña").value;


	 sExpresion =/^[a-zA-Z]+/
	
	if (usuario ==="" || contraseña ===""){
		alert("Todos los campos son obligatorios");
		return false;
	}else if(usuario.length>60){
		alert("El nombre de usuario es demasiado largo");
		return false;
	}
	//VALIDACION POR EXPRESION REGULAR //
	else if (!sExpresion.test(usuario)){
    	alert("No se permite numero")
    	return false;
  	}
}