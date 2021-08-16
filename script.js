async function checkUserExists(login) {

    let url = "check_login.php";

    let data = new FormData();

    data.append("login", login);

    let response = await fetch(url, {
        method: "POST",
        body: data
    });

    if (response.ok) {
        let jsonErr = await response.json();
        if (jsonErr['error']) {
            document.getElementById("errors").innerHTML = jsonErr['error'];
        } else {
            document.getElementById("errors").innerHTML = "";
        }
    } else {
        console.log("error status "+response.status);
    }
}