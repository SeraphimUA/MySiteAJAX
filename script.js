const ao = createAjaxObject();

function createAjaxObject() {
    var ao = null;
    try {
        ao = new XMLHttpRequest();
    }
    catch(e) {
        alert("AJAX not supported");
    }
    return ao;
}

function checkUserExists(login) {
    if (ao.readyState == 4 || ao.readyState == 0) {
        if(login) {
            ao.open("POST", "check_login.php", true);
            ao.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            ao.onreadystatechange = () => {
                if (ao.readyState == 4 && ao.status == 200) {
                    resp = ao.responseText;
                    document.getElementById("errors").innerHTML = resp;
                }
            }
            ao.send("login="+login);
        } else {
            document.getElementById("errors").innerHTML = "";
        }
    }
}