/**
 Funcion del archivo: Archivo con las validaciones de la entrega ET2
 Autor: 1o9aa5
 Fecha: 26/10/18
 **/

/**Funcion que comprueba si el campo esta vacio**/
function comprobarVacio(campo) {
    //Obtenemos el valor que contiene el campo
    var valor = campo.value;
    //Comprobamos si el campo esta vacio devolvemos true y si no lo esta, false.
    if (valor == "") {

        error(campo);
        return true;
    } else {
        correcto(campo);
        return false;
    }

}
/**Funcion que comprueba si el campo es de tipo texto**/
function comprobarTexto(campo, size) {
    //Obtenemos el valor que contiene el campo
    var valor = campo.value;
    //Comprobamos que el campo no esta vacio y no supere el tamaÒo establecido
    if (valor.length > size || comprobarVacio(campo)) {
        error(campo);
        return false;
    } else {
        correcto(campo);
        return true;
    }

}

function comprobarExpresionRegular(campo, exprreg, size) {

    var valor = campo.value;

    if (comprobarTexto(campo, size) && exprreg.test(valor)) {
        correcto(campo);
        return true;
    } else {
        error(campo);
        return false;
    }
}


/**Funcion que comprueba si el campo es de tipo Alfabetico**/
function comprobarAlfabetico(campo, size) {

    //Comprobamos si el campo tiene almacenadas letras, que no sobrepase el limite y que no este vacio
    if (comprobarExpresionRegular(campo, /^([A-Z¡…Õ”⁄]{1}[a-zÒ·ÈÌÛ˙]+[\s]*)+$/, size)) {
        correcto(campo);
        return true;
    } else {
        error(campo);
        return false;
    }

}


/**Funcion que comprueba si el campo es un numero entero comprendido entre dos valores(valormenor,valormayor)**/
function comprobarEntero(campo, valormenor, valormayor) {
//Hacemos un parse a numero entero, si no era un entero este no lo parsea
    var valor = parseInt(campo.value);
    //Ahora comprobamos si es Integer, si esta dentro del rango de valores y si no esta el campo vacio
    if (isNaN(valor) || valor < valormenor || valor > valormayor || comprobarVacio(campo)) {
        error(campo);
        return false;
    }
    //Si valor es un Integer, esta entre los dos valores y no esta vacio valor es un entero valido
    else {
        correcto(campo);
        return true;
    }

}
//Funcion que comprueba si el contenido del input es un numero decimal
function comprobarReal(campo, numerodecimales, valormenor, valormayor) {
    //Obtenemos el valor que contiene el campo
    var valor = campo.value;
    //Comprobamos si el valor cumple o no la expresion regular de numero Real
    if (comprobarExpresionRegular(campo, !/^-?[0-9]+([,\.][0-9]*)?$/, campo.size) || valor < valormenor || valor > valormayor) {
        error(campo);
        return false;
    } else {
        correcto(campo);
        return true;
    }

}

/**Funcion que comprueba si el DNI existe y es correcto**/
function comprobarDNI(campo) {

    var valor = campo.value;
    var numero;
    var letr;
    var letra;


    //Comprobamos que el dni tiene el formato correcto y no esta vacio.
    if (comprobarExpresionRegular(campo, /^\d{8}[a-zA-Z]$/, 9)) {
        numero = valor.substr(0, valor.length - 1);
        letr = valor.substr(valor.length - 1, 1);
        numero = numero % 23;
        letra = 'TRWAGMYFPDXBNJZSQVHLCKET';
        letra = letra.substring(numero, numero + 1);
        if (letra != letr.toUpperCase()) {

            error(campo);
            return false;
        } else {

            correcto(campo);
            return true;
        }
    } else {
        error(campo);
        return false;
    }

}

/**Funcion que comprueba si el telefono existe y es correcto**/
function comprobarTelf(campo) {
    //Comprobamos que el campo tiene 9 digitos y comienza con +34 o 0034 o 34 
    if (comprobarExpresionRegular(campo, /^(\+34|0034|34)?[5|6|7|8|9][0-9]{8}$/, campo.size))
    {
        correcto(campo);
        return true;
    }
    //Si cumple la expresion regular y no esta vacio es un telefono valido
    else {
        error(campo);
        return false;
    }

}

/**Funcion que comprueba que el campo sea un email correcto**/
function comprobarEmail(campo) {
    //Comprobamos si el campo cumple la expresion regular y no esta vacio
    if (comprobarExpresionRegular(campo, /^[^@\s]+@[^@\.\s]+(\.[^@\.\s]+)+$/, campo.size)) {
        correcto(campo);
        return true;
    }
    //Si cumple la expresion regular y no esta vacio es un email valido
    else {
        error(campo);
        return false;
    }

}

/**Funcion de comprobar fecha**/
function comprobarFecha(campo) {

    if (comprobarExpresionRegular(campo, /^((0|1)\d{1})\/((0|1|2)\d{1})\/((19|20)\d{2})$/, campo.size)) {
        correcto(campo);
        return true;//devuelve true, si tiene el formato correcto la expresion regular
    } else {
        error(campo);
        return false;//devuelve false en caso de que este la expresion incorrecta o este vacio
    }
}

//Funcion que pinta el borde a rojo, si no es correcto.
function error(campo) {
    campo.style.borderColor = "red";
}
//Funcion que pinta el borde a verde, si es correcto.
function correcto(campo) {
    campo.style.borderColor = "green";
}


/**Funcion de comprobar vacio para que en el search no ponga los bordes en rojo si esta vacio algun campo**/

function comprobarVacioSearch(campo) {
    var valor = campo.value;
    if (valor == "") {
        campo.style.borderColor = "blue";
        return true;
    } else {
        correcto(campo);
        return false;
    }
}

/**Funcion que activa o desactiva el boton de enviar formulario en funcion de si estan correctos los campos o no**/
function validarAdd() {

    if (validarCamposAdd()) {//Si esta correcta la funcion validar campos, activa el boton de enviar formulario
        document.getElementById('insertar').disabled = false;

    }/**Si la funcion validarCampos() devuelve un false es que alguno de los campos del formulario
     esta mal cubierto entonces mantiene deshabilitado o si estaba habilitado se deshabilita el boton de submit**/
    else {
        document.getElementById('insertar').disabled = true;
    }
}
/**La funcion de validar campos, comprueba uno a uno que todos los campos esten correctos y que el conjunto de esas comprobaciones devuelva true si todos estan correctos, 
 * o false si algun elemento esta incorrecto**/
 
 /**Tanto el nombre como los apellidos tienen que empezar por letra mayuscula**/
function validarCamposAdd() {
    var nombre = document.getElementById("nombreadd");
    var usuario = document.getElementById("usuarioadd");
    var dni = document.getElementById("dniadd");
    var email = document.getElementById("emailadd");
    var apellido = document.getElementById("apellidoadd");
    var password = document.getElementById("passwordadd");
    var numero = document.getElementById("telefonoadd");
    var titulacion = document.getElementById("titulacionadd");
    var fecha = document.getElementById("fechaadd");

    return (comprobarAlfabetico(nombre, nombre.size) && comprobarTexto(usuario, usuario.size) && comprobarTelf(numero) &&
            comprobarDNI(dni) && comprobarEmail(email) && comprobarAlfabetico(apellido, apellido.size) && comprobarTexto(password, password.size)
            && comprobarTexto(titulacion, titulacion.size) && comprobarFecha(fecha));
}


/**Funcion que activa o desactiva el boton de enviar formulario en funcion de si estan correctos los campos o no**/
function validarEdit() {

    if (validarCamposEdit()) {//Si esta correcta la funcion validar campos, activa el boton de enviar formulario
        document.getElementById('editar').disabled = false;

    }/**Si la funcion validarCampos() devuelve un false es que alguno de los campos del formulario
     esta mal cubierto entonces mantiene deshabilitado o si estaba habilitado se deshabilita el boton de enviar formulario**/
    else {
        document.getElementById('editar').disabled = true;
    }
}

/**La funcion de validar campos, comprueba uno a uno que todos los campos esten correctos y que el conjunto de esas comprobaciones devuelva true si todos estan correctos, 
 * o false si algun elemento esta incorrecto**/
  /**Tanto el nombre como los apellidos tienen que empezar por letra mayuscula**/
function validarCamposEdit() {
    var nombre = document.getElementById("nombreedit");
    var dni = document.getElementById("dniedit");
    var email = document.getElementById("emailedit");
    var apellido = document.getElementById("apellidoedit");
    var password = document.getElementById("passwordedit");
    var numero = document.getElementById("telefonoedit");
    var titulacion = document.getElementById("titulacionedit");
    var fecha = document.getElementById("fechaedit");

    return (comprobarAlfabetico(nombre, nombre.size) && comprobarTelf(numero) && comprobarDNI(dni)
            && comprobarEmail(email) && comprobarAlfabetico(apellido, apellido.size) && comprobarTexto(password, password.size)
            && comprobarTexto(titulacion, titulacion.size) && comprobarFecha(fecha));

}


/**Funcion que activa o desactiva el boton de enviar formulario en funcion de si esta correcto algun campo**/
function validarSearch() {

    if (validarCamposSearch()) {//Si esta correcta la funcion validar campos, activa el boton de enviar formulario

        document.getElementById('buscar').disabled = false;

    }/**Si la funcion validarCampos() devuelve un false es que alguno de los campos del formulario
     esta mal cubierto entonces mantiene deshabilitado o si estaba habilitado se deshabilita el boton de enviar formulario**/
    else {

        document.getElementById('buscar').disabled = true;
    }
}

/**La funcion de validar campos, comprueba uno a uno que todos los campos esten correctos y que el conjunto de esas comprobaciones devuelva true si todos estan correctos, 
 * o false si algun elemento esta incorrecto**/
  /**Tanto el nombre como los apellidos tienen que empezar por letra mayuscula**/
function validarCamposSearch() {
    var nombre = document.getElementById("nombresearch");
    var usuario = document.getElementById("usuariosearch");
    var dni = document.getElementById("dnisearch");
    var email = document.getElementById("emailsearch");
    var apellido = document.getElementById("apellidosearch");
    var numero = document.getElementById("telefonosearch");
    var titulacion = document.getElementById("titulacionsearch");
    var fecha = document.getElementById("fechasearch");

    return(
            (comprobarAlfabetico(nombre, nombre.size) || comprobarVacioSearch(nombre)) &&
            (comprobarAlfabetico(apellido, apellido.size) || comprobarVacioSearch(apellido)) &&
            comprobarVacioSearch(email) &&
            (comprobarTexto(usuario, usuario.size) || comprobarVacioSearch(usuario)) &&
            comprobarVacioSearch(numero)) &&
            comprobarVacioSearch(dni) &&
            (comprobarFecha(fecha) || comprobarVacioSearch(fecha)) &&
            (comprobarTexto(titulacion, titulacion.size) || comprobarVacioSearch(titulacion));

}






