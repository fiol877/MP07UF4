/* 
 * XMLHttpRequest es un objeto JavaScript que fue diseñado por Microsoft y 
 * adoptado por Mozilla, Apple y Google. 
 * 
 * Actualmente es un estándar de la W3C. 
 * 
 * Proporciona una forma fácil de obtener información de una URL sin tener 
 * que recargar la página completa. 
 * 
 * Una página web puede actualizar sólo una parte de la página sin interrumpir 
 * lo que el usuario está haciendo. XMLHttpRequest es ampliamente usado en la 
 * programación AJAX.
 * 
 * A pesar de su nombre, XMLHttpRequest puede ser usado para recibir cualquier 
 * tipo de dato, no solo XML, y admite otros formatos además de HTTP  
 * (incluyendo file y ftp).
 * 
 * XMLHttpRequest soporta tanto comunicaciones síncronas como asíncronas.
 * 
 * No deberias usar XMLHttpRequests síncronas porque, dada la naturaleza 
 * inherentemente asíncrona del intercambio de datos en las redes, 
 * hay multiples formas en que la memoria y eventos se puedan perder usando 
 * solicitudes síncronas.
 * 
 * Asynch call
 */
function showEstadistiques(value) {
    var xmlhttp = new XMLHttpRequest();
    /*
     * Una función del objeto JavaScript que se llama cuando el atributo 
     * readyState cambia. 
     * El callback se llama desde la interfaz del usuario.
     * 
     * @returns {undefined}
     */
    xmlhttp.onreadystatechange = function () {
        getResponse(this);
    };
    xmlhttp.open("GET", "getestadistiques.php?modalitat=" + value, true);
    xmlhttp.send();
}

function getResponse($response) {
    /*
     * readyState = 4 COMPLETED, La operacioón esta terminada.
     * status = 200 OK.
     * responseText La respuesta al pedido como texto, o null si el pedido no 
     * fue exitoso o todavía no se envió. Sólo lectura.
     */
    if ($response.readyState == 4 && $response.status == 200) {
        document.getElementById("taula_estadistiques_id").innerHTML = $response.responseText;
    }
}


function manteniment(me) {
    var xmlhttp = new XMLHttpRequest();
    /* var url = "mantenimentTaula.php?opcio=" + me.parentNode.id;
    console.log(url); */
    var idM = 'idM=' + me.parentNode.id;

    xmlhttp.onreadystatechange = function () {
        getResponse(this);
    };

    xmlhttp.open("POST", "mantenimentTaula.php?opcio=" + me.innerHTML, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(idM);
}

 function editar(id){
    var xmlhttp = new XMLHttpRequest();
    
    var idE = 'idE='+id;
    var nivellE = 'nivellE=' + document.getElementById("nivellE").value;
    var modalidadE = 'modalidadE=' + document.getElementById("modalidadE").value;
    var data_partida = 'data_partida=' + document.getElementById("data_partida").value;
    var intents = 'intents=' + document.getElementById("intents").value;

    var variables = idE + '&'+ nivellE +'&' + modalidadE + '&' + data_partida + '&' + intents;

    xmlhttp.onreadystatechange = function () {
        getResponse(this);
    };

    xmlhttp.open("POST", "classes/EstadistiquesEditar.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(variables);
}

