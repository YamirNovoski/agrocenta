function ValidSurvey() {
    // Verificamos el campo segun su id dentro del form
    if (IsEmptyField(FrmEnc.Nom.value)) {
        alert("El campo nombre no puede estar vacio.");
        return false;
    }
    if (IsEmptyField(FrmEnc.Ape.value)) {
        alert("El campo apellido no puede estar vacio.");
        return false;
    }
    if (! ValidateOneCheck(FrmEnc.Sexo) )
	{
		alert("Es necesario seleccionar una opcion en el sexo.");
		return false;
	}
    if (FrmEnc.Sel_Pais.value == 0) {
        alert("Es necesario seleccionar un pais.");
        return false;
    }
    if (! ValidateOneCheck(FrmEnc.Precio) )
    {
        alert("La pregunta 5 debe ser completada.");
        return false;
    }
    if (! ValidateOneCheck(FrmEnc.ProCal) )
    {
        alert("La pregunta 6 debe ser completada.");
        return false;
    }
    if (! ValidateOneCheck(FrmEnc.Produ) )
    {
        alert("Es necesario seleccionar una respuesta en la pregunta 7.");
        return false;
    }
    if (! ValidateOneCheck(FrmEnc.ProDif) )
    {
        alert("Gustariamos saber tu opinion sobre la dificultad para navegar en la seccion productos, pregunta 9.");
        return false;
    }
    if (FrmEnc.Sel_Pre.value == 0) {
        alert("La pregunta 10 necesita ser completada.");
        return false;
    }
    if (FrmEnc.Visita.value == 0) {
        alert("Es importante saber que tan seguido visitas nuestra pagina, responde la pregunta 11.");
        return false;
    }
    if (! ValidateOneCheck(FrmEnc.Recom) )
    {
        alert("Es necesario seleccionar una respuesta en la pregunta 12.");
        return false;
    }
    if(IsEmptyField(FrmEnc.Ext_com.value))
    {
        alert("Digite el comentario extra, si no tienes puedes digitar N/A");
        return false;
    }

    return true
}

// Valida que el campo no este vacio
function IsEmptyField(theValue) {
    return (theValue == null || theValue == "");
}

// Validacion de solo texto en los textbox
function SoloLetras(e) {
    key = e.keyCode || e.which;

    teclado = String.fromCharCode(key).toLowerCase();

    letras = " abdcefghijklmnopqrstuvwxyz";

    especiales = "8-27-38-46-164";

    teclado_especial = false;

    for (var i in especiales) {
        if (key == especiales[i]) {
            teclado_especial = true;
            break;
        }
    }

    if (letras.indexOf(teclado) == -1 && !teclado_especial) {
        return false;
    }
}

// Validacion de rbtn checked
function ValidateOneCheck(theSelector)
{
	var Seleccionado = false;
	for(i = 0; i < theSelector.length; i++)
	{
		if(theSelector[i].checked)
		{
			Seleccionado = true;
			break;
		}
	}
	return Seleccionado;
}

// Para validar solo numeros en el textbox
function solonumeros(e) {
 
    var key;
 
    if (window.event) // IE
    {
        key = e.keyCode;
    }
    else if (e.which) // Netscape/Firefox/Opera
    {
        key = e.which;
    }
 
    if (key < 48 || key > 57) {
        return false;
    }
 
    return true;
}
