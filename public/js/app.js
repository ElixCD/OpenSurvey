
function CargaVista(action) {
    // De esta forma se obtiene la instancia del objeto XMLHttpRequest
    if (window.XMLHttpRequest) {
        connection = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        connection = new ActiveXObject("Microsoft.XMLHTTP");
    }

    // Preparando la función de respuesta
    // connection.onreadystatechange = response;
    connection.onreadystatechange = function () {
        var cont = document.getElementById('main');
        cont.innerHTML = connection.responseText;
    };

    // Realizando la petición HTTP con método POST
    connection.open('POST', action.toLowerCase() + '.php');
    connection.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    connection.send();
}

