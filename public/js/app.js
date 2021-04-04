
function createConnection() {
    if (window.XMLHttpRequest) {
        connection = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        connection = new ActiveXObject("Microsoft.XMLHTTP");
    }

    return connection;
}

function execute(connection, method, url, params = "") {
    connection.open(method, url, true);
    if (method != 'GET') {
        connection.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    }
    connection.send(params);
}


function toggle() {
    var menu = document.getElementById("nav-menu");
    if (menu.classList.contains("mostrar")) {
        menu.classList.remove("mostrar");
    }
    else {
        menu.classList.add("mostrar");
    }
}

function UpdateElement() {
    if (connection.readyState == 4) {
        let obj = JSON.parse(connection.responseText);
        return obj;
    }
}

function SaveUser(action, name, email, active, idrol, url, locate, iduser = null) {
    let backUrl = document.referrer;

    let connection = createConnection();

    connection.onreadystatechange = function () {
        if (connection.readyState == 4) {
            let obj = JSON.parse(connection.responseText);
            alert(obj.msj);
            if (obj.error == false) {
                if(locate != null)
                    location.href = locate;
            }
        }
    }

    let params = "action=" + action + "&name=" + name + "&email=" + email + "&active=" + active + "&idrol=" + idrol;

    if (iduser != null) params += "&iduser=" + iduser

    execute(connection, 'POST', url, params);
}




