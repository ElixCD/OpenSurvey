
function ViewLoad(action,method = 'POST', params = '') {
    // De esta forma se obtiene la instancia del objeto XMLHttpRequest
    if (window.XMLHttpRequest) {
        connection = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        connection = new ActiveXObject("Microsoft.XMLHTTP");
    }

    if (action == 'listar' || action == undefined  || action == 'undefined' || action == '' )
        action = 'listar';

    // Preparando la función de respuesta
    // connection.onreadystatechange = response;
    connection.onreadystatechange = function () {
        var cont = document.getElementById('main');
        cont.innerHTML = connection.responseText;
    };

    // Realizando la petición HTTP con método POST
    connection.open(method, action.toLowerCase() + '.php');
    connection.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    connection.send(params);
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

