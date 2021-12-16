
function login() {

    const url = "./module/common/actionModels/login.php";

    const data = new FormData();
    data.append('email', document.getElementById("email").value);
    data.append('password', document.getElementById("password").value);

    fetch(url, {
            method: 'POST',
            body: data
        })
        .then((resp) => resp.json())
        .then(function(data) {
            if(data.isSuccess){
                window.location.replace(data.url);
            }
            else{
                alert(data.message);
            }
        })
        .catch(function(err) {            
            console.log(err.message);
        });
}

function logout() {

    const url = "../../../module/common/actionModels/logout.php";

    const data = new FormData();
    // data.append('email', document.getElementById("email").value);
    // data.append('password', document.getElementById("password").value);

    fetch(url, {
        method: 'POST',
        body: data
    })
        .then((resp) => resp.json())
        .then(function (data) {
            if (data.isSuccess) {
                window.location.replace(data.url);
            }
        })
        .catch(function (err) {
            alert(err.message);
        });
}

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

function SavePassword(action, password, url, locate, iduser = null) {
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

    let params = "action=" + action + "&password=" + password;

    if (iduser != null) params += "&iduser=" + iduser

    execute(connection, 'POST', url, params);
}

function SessionReload(session,url){
    let connection = createConnection();
    execute(connection, 'POST', url, "name="+session);
}




