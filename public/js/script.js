





function Rtl() {
    var body = document.body;
    var x = document.getElementById("rtl");
    if (x.innerHTML === "Rtl") {
        x.innerHTML = "Ltr";
        body.style.direction = "ltr";
    } else {
        x.innerHTML = "Rtl";
        body.style.direction = "rtl";

    }
}

//dark mode
function DarkMode() {
    var body = document.body;
    var x = document.getElementById("dark");
    if (x.innerHTML === "Dark-Mode") {
        x.innerHTML = "White-Mode";
    } else {
        x.innerHTML = "Dark-Mode";
    }
    body.classList.toggle("bg-dark");
    body.classList.toggle("text-light");
}

//show and hide password
function ShowAndHidePassword() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
};

//show and hide password
function ShowAndHideRegisterPassword() {
    var x = document.getElementById("password");
    var y = document.getElementById("password-confirm");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
    if (y.type === "password") {
        y.type = "text";
    } else {
        y.type = "password";
    }
}
