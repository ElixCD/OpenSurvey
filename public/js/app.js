function toggle() {
    var menu = document.getElementById("nav-menu");
    if (menu.classList.contains("mostrar")) {
        menu.classList.remove("mostrar");
    }
    else {
        menu.classList.add("mostrar");
    }
}