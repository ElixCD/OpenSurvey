
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

function QuestionList(idFactor, idcontainer) {
    window.fetch('/module/admin/surveys/questions/listar.php', {
        method: 'post',
        headers: {
            "Content-type": "application/x-www-form-urlencoded; charset=UTF-8"
        },
        body: 'idFactor=' + idFactor
    })
        .then(function (responseObj) {
            return responseObj.text();
        })
        .then(function (text) {
            document.getElementById(idcontainer).innerHTML = text;
        });
}

function RubricList(idFactor) {
    window.fetch('/module/admin/surveys/rubrics/listar.php', {
        method: 'post',
        headers: {
            "Content-type": "application/x-www-form-urlencoded; charset=UTF-8"
        },
        body: 'idFactor=' + idFactor
    })
        .then(function (responseObj) {
            return responseObj.json();
        });
}

function EnableComponents(trigger, componentsList) {
    let text = trigger.firstChild;

    array.forEach(element => {
        let element = document.getElementById('description');
        element.disabled = !element.disabled;
    });
}

function CleanCookies() {
    setCookie('vista', '', 0);
    setCookie('idSurvey', '', 0);
}

function setIdSurvey(value) {
    setCookie('idSurvey', value, 0);
}

function getIdSurvey() {
    return getCookie('idSurvey');
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

function UpdateElement() {
    if (connection.readyState == 4) {
        let obj = JSON.parse(connection.responseText);
        alert(obj.msj);
    }
}

function setCookie(cname, cvalue, exdays) {
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

jQuery.fn.multiselect = function () {
    $(this).each(function () {
        var checkboxes = $(this).find("input:checkbox");
        checkboxes.each(function () {
            var checkbox = $(this);
            // Highlight pre-selected checkboxes
            if (checkbox.prop("checked"))
                checkbox.parent().addClass("multiselect-on");

            // Highlight checkboxes that the user selects
            checkbox.click(function () {
                if (checkbox.prop("checked"))
                    checkbox.parent().addClass("multiselect-on");
                else
                    checkbox.parent().removeClass("multiselect-on");
            });
        });
    });
};

$(function () {
    $(".multiselect").multiselect();
});



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
