
function ViewLoad(action, method = 'POST', params = '') {
    if (window.XMLHttpRequest) {
        connection = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        connection = new ActiveXObject("Microsoft.XMLHTTP");
    }

    if (action == 'listar' || action == undefined || action == 'undefined' || action == '')
        action = 'listar';

    connection.onreadystatechange = function () {
        var cont = document.getElementById('main');
        cont.innerHTML = connection.responseText;
    };

    connection.open(method, action.toLowerCase() + '.php');
    connection.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    connection.send(params);
}

function CleanCookies() {
    setCookieAction('vista', '', 0);
    setCookieAction('idSurvey', '', 0);

}

function setIdSurvey(value) {
    setCookieAction('idSurvey', value, 0);
    console.log(idSurvey);
}

function getIdSurvey() {
    getCookieAction('idSurvey');
}

function Redirection() {
    if (connection.readyState == 4) {
        let obj = JSON.parse(connection.responseText);
        alert(obj.msj);
        if (obj.error == false) {
            Breadcrumb('listar');
            ViewLoad('listar');
        }
    }
}

function setCookieAction(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "vista=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
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

function removeCookie(cname) {
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



// function getFactors(idSurvey){
//     if (window.XMLHttpRequest) {
//         connection = new XMLHttpRequest();
//     } else if (window.ActiveXObject) {
//         connection = new ActiveXObject("Microsoft.XMLHTTP");
//     }

//     connection.onreadystatechange = function () {
//         var cont = document.getElementById('main');
//         cont.innerHTML = connection.responseText;
//     };

//     connection.open(method,'factor.php');
//     connection.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
//     connection.send(params);
// }
