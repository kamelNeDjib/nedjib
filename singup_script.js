var validation_one = false,
    validation_two = false,
    inpt = document.getElementsByTagName("INPUT"),
    lab = document.getElementsByTagName("LABEL"),
    error = document.getElementById("error_message"),
    error_box = document.getElementsByClassName("box_error")[0],
    correct = true;

function f_style() {
    let v = 0;
    for (let i = 0; i < inpt.length - 1; i++) {
        if (document.activeElement == inpt[i]) {
            inpt[5].checked = false;
            inpt[i].style.outline = "transparent";
            inpt[i].style.border = "solid 1px #0066ff";
            inpt[i].style.boxShadow = "0 0 0 5px #0066ff86";
        }
    }
}

function userNameError() {
    inpt[1].style.border = " solid 1px black";
    inpt[1].style.boxShadow = "none";
    let str = inpt[1].value;
    if (str.length) {
        lab[0].style.display = "none";
        for (let i = 0; i < str.length; i++) {
            if (!((str[i] >= "A" && str[i] <= "Z") || (str[i] >= "a" && str[i] <= "z"))) {
                correct = false;
                for (let i = 0; i < inpt.length; i++) {
                    if (i != 5) inpt[i].setAttribute("disabled", "");
                }
                error.innerText = "The Username Shoudn't Contains A Number Or A Special Character";
                error_box.style.display = "block";
                setTimeout(function() {
                    inpt[1].removeAttribute("disabled", "");
                    error_box.style.display = 'none';
                }, 7000);
                inpt[1].style.boxShadow = "0 0 0 5px rgba(255, 0, 0, 0.657)";
                inpt[1].style.border = "solid 1.5px red";
                return 0;
            } else {
                correct = true;
                for (let i = 1; i < inpt.length - 1; i++) {
                    inpt[i].removeAttribute("disabled", "");
                }
                inpt[1].style.boxShadow = "none";
                inpt[1].style.border = "solid 1px black";
            }
        }
    } else {
        for (let i = 0; i < inpt.length - 2; i++) {
            inpt[i].removeAttribute("disabled", "");
        }
        lab[0].style.display = "block";
        inpt[1].style.boxShadow = "none";
        inpt[1].style.border = "solid 1px black";
    }
}

function passwordError() {
    inpt[3].style.border = " solid 1px black";
    inpt[3].style.boxShadow = "none";
    let str = inpt[3].value
    if (str.length) {
        lab[2].style.display = "none";
        for (let i = 0; i < str.length; i++) {
            if (((str[i] >= "A" && str[i] <= "Z") || (str[i] >= "a" && str[i] <= "z")) || (str[i] >= "0" && str[i] <= "9")) {
                correct = true;
                inpt[3].style.boxShadow = "none";
                inpt[3].style.border = "solid 1px black";
                if ((str[i] >= "A" && str[i] <= "Z") || (str[i] >= "a" && str[i] <= "z")) {
                    validation_one = true;
                } else {
                    validation_two = true;
                }
            } else {
                correct = false;
                for (let i = 0; i < inpt.length; i++) {
                    if (i != 5) inpt[i].setAttribute("disabled", "");
                }
                error.innerText = "The Password Shoudn't Contains An Characters Specials";
                error_box.style.display = "block";
                setTimeout(function() {
                    inpt[3].removeAttribute("disabled", "");
                    error_box.style.display = 'none';
                }, 7000);
                inpt[3].style.boxShadow = "0 0 0 5px rgba(255, 0, 0, 0.657)";
                inpt[3].style.border = "solid 1.5px red";
                return 0;
            }
        }
        if (!(validation_one && validation_two)) {
            correct = false;
            for (let i = 0; i < inpt.length; i++) {
                if (i != 5) inpt[i].setAttribute("disabled", "");
            }
            error.innerText = "The Password Shoud Contains Letters And Numbers";
            error_box.style.display = "block";
            setTimeout(function() {
                inpt[3].removeAttribute("disabled", "");
                error_box.style.display = 'none';
            }, 7000);
            inpt[3].style.boxShadow = "0 0 0 5px rgba(255, 0, 0, 0.657)";
            inpt[3].style.border = "solid 1.5px red";
            return 0;
        } else {
            correct = true;
            for (let i = 0; i < inpt.length - 1; i++) {
                inpt[i].removeAttribute("disabled", "");
            }
        }
    } else {
        for (let i = 0; i < inpt.length - 2; i++) {
            inpt[i].removeAttribute("disabled", "");
        }
        lab[2].style.display = "block";
        inpt[2].style.boxShadow = "none";
        inpt[2].style.border = "solid 1px black";
    }
    validation_one = false;
    validation_two = false;
}

function comfirmPasswordError() {
    inpt[4].style.border = " solid 1px black";
    inpt[4].style.boxShadow = "none";
    let str_01 = inpt[4].value,
        str_00 = inpt[3].value;

    if (str_01.length) {
        lab[3].style.display = "none";
        if (str_01.length != str_00.length) {
            correct = false;
            for (let i = 0; i < inpt.length; i++) {
                if (i != 5) inpt[i].setAttribute("disabled", "");
            }
            error.innerText = "The Password and the Confirm Password are not the same";
            error_box.style.display = "block";
            setTimeout(function() {
                inpt[4].removeAttribute("disabled", "");
                error_box.style.display = 'none';
            }, 7000);
            inpt[3].style.boxShadow = "0 0 0 5px rgba(255, 0, 0, 0.657)";
            inpt[3].style.border = "solid 1.5px red";
            return 0;
        }
        for (let i = 0; i < str_00.length; i++) {
            if (str_00[i] != str_01[i]) {
                correct = false;
                for (let i = 0; i < inpt.length; i++) {
                    if (i != 5) inpt[i].setAttribute("disabled", "");
                }
                error.innerText = "The Length of the Password and the Confirm Password are not equal";
                error_box.style.display = "block";
                setTimeout(function() {
                    inpt[4].removeAttribute("disabled", "");
                    error_box.style.display = 'none';
                }, 7000);
                inpt[4].style.boxShadow = "0 0 0 5px rgba(255, 0, 0, 0.657)";
                inpt[4].style.border = "solid 1.5px red";
                return 0;
            } else {
                correct = true;
                for (let i = 0; i < inpt.length - 1; i++) {
                    inpt[i].removeAttribute("disabled", "");
                }
                inpt[4].style.boxShadow = "none";
                inpt[4].style.border = "solid 1px black";
            }
        }
    } else {
        for (let i = 0; i < inpt.length - 2; i++) {
            inpt[i].removeAttribute("disabled", "");
        }
        lab[3].style.display = "block";
        inpt[4].style.boxShadow = "none";
        inpt[4].style.border = "solid 1px black";
    }
}


function emailError() {
    inpt[2].style.border = " solid 1px black";
    inpt[2].style.boxShadow = "none";
    let str = inpt[2].value,
        srch = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (str.length) {
        lab[1].style.display = "none";
        for (let i = 0; i < str.length; i++) {
            if (!srch.test(str)) {
                correct = false;
                for (let i = 0; i < inpt.length; i++) {
                    if (i != 4) inpt[i].setAttribute("disabled", "");
                }
                error.innerText = "The Form Of The Email is Wrong";
                error_box.style.display = "block";
                setTimeout(function() {
                    inpt[2].removeAttribute("disabled", "");
                    error_box.style.display = 'none';
                }, 7000);
                inpt[2].style.boxShadow = "0 0 0 5px rgba(255, 0, 0, 0.657)";
                inpt[2].style.border = "solid 1.5px red";
                return 0;
            } else {
                correct = true;
                for (let i = 0; i < inpt.length - 1; i++) {
                    inpt[i].removeAttribute("disabled", "");
                }
                inpt[2].style.boxShadow = "none";
                inpt[2].style.border = "solid 1px black";
            }
        }
    } else {
        for (let i = 0; i < inpt.length - 2; i++) {
            inpt[i].removeAttribute("disabled", "");
        }
        lab[1].style.display = "block";
        inpt[2].style.boxShadow = "none";
        inpt[2].style.border = "solid 1px black";
    }
}

function enter(event) {
    let index = 0;
    for (let i = 0; i < inpt.length - 1; i++) {
        if (document.activeElement == inpt[i]) {
            index = i;
        }
    }
    if (event.keyCode == 13) {
        event.preventDefault(true);
        for (let i = index; i < inpt.length - 1; i++) {
            console.log(i)
            if (i + 1 != inpt.length) {
                inpt[i + 1].focus();
                break;
            }
        }
    }
}

function check(event) {
    let v = 0;
    if (event.keyCode == 13 && document.activeElement == inpt[5]) {
        inpt[5].checked = true;
    }
    for (let i = 0; i < inpt.length - 2; i++) {
        if (inpt[i].value != 0) {
            v++;
        }
    }
    if (inpt[5].checked && v == 5 && correct) inpt[6].removeAttribute("disabled", "");
    inpt[6].focus();
    v = 0;
}

document.onclick = function() {
    let v = 0;
    for (let i = 0; i < inpt.length - 2; i++) {
        if (inpt[i].value != 0) {
            v++;
        }
    }
    if (inpt[5].checked && v == 5 && correct) inpt[6].removeAttribute("disabled", "");
    else inpt[6].setAttribute("disabled", "")
    v = 0;
}