
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