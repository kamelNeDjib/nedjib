<script>
        var inpt = document.getElementsByClassName("box-txt-inputs"),
            error = document.getElementsByClassName("error"),
            inpt_radio = document.getElementsByClassName("inpt-radio"),
            inpt_nbr = document.getElementsByClassName("box-nbr-inputs"),
            inpts = document.getElementsByTagName("INPUT"),
            summary = document.getElementsByTagName("TEXTAREA")[0],
            checkV = document.getElementById("checkboxV"),
            send = document.getElementsByClassName("send")[0],
            error_nbr = document.getElementsByClassName("error_nbr"),
            error_radio = document.getElementsByClassName("error_radio")[0],
            file = document.getElementById("file"),
            error_file = document.getElementsByClassName("error_file")[0],
            img = document.querySelector('#myimg');

     function f_style() {
            for (let i = 0; i < inpt.length; i++) {
                if (document.activeElement == inpt[i]) {
                    inpt[i].style.outline = "transparent";
                    inpt[i].style.border = "solid 1px #0066ff";
                    inpt[i].style.boxShadow = "0 0 0 5px #0066ff86";
                
                }
            }
        }

        function f2_style() {
            for (let i = 0; i < inpt_nbr.length; i++) {
                if (document.activeElement == inpt_nbr[i]) {
                    inpt_nbr[i].style.outline = "transparent";
                    inpt_nbr[i].style.border = "solid 1px #0066ff";
                    inpt_nbr[i].style.boxShadow = "0 0 0 5px #0066ff86";
                    return 0;
                }
            }
        }

        function nbr_f() {
            for (let i = 0; i < inpt_nbr.length; i++) {
                inpt_nbr[i].style.border = "solid 1px #0066ff";
                inpt_nbr[i].style.boxShadow = "none";
            }
        }

        function textVerification(index) {
            var v = 0;
            for (let i = 0; i < inpt.length; i++) {
                inpt[i].style.border = "solid 1px #0066ff";
                inpt[i].style.boxShadow = "none";
            }
            let str = inpt[index].value;
            if (str.length) {
                for (let i = 0; i < str.length; i++) {
                    if (!((str[i] >= "A" && str[i] <= "Z") || (str[i] == " ") || (str[i] >= "a" && str[i] <= "z") || (str[i] >= 1 && str[i] <= 9))) {
                        error[index].innerText = "This Information Shoudn't Contains A Special Character";
                        inpt[index].style.boxShadow = "0 0 0 5px rgba(255, 0, 0, 0.657)";
                        inpt[index].style.border = "solid 1.5px red";
                        for (let i = 0; i < inpts.length; i++) {
                            if (i != index) {
                                inpts[i].setAttribute("disabled", "");
                            }
                        }
                        summary.setAttribute("disabled", "");
                        return 0;
                    } else {
                        for (let i = 0; i < inpts.length - 1; i++) {
                            if (i != index) {
                                inpts[i].removeAttribute("disabled", "");
                            }
                        }
                        summary.removeAttribute("disabled", "");
                        error[index].innerText = "";
                        inpt[index].style.boxShadow = "none";
                        inpt[index].style.border = "solid 1.5px #0066ff";
                    }
                }
                if (!isNaN(parseFloat(str))) {
                    for (let i = 0; i < inpts.length; i++) {
                        if (i != index) {
                            inpts[i].setAttribute("disabled", "");
                        }
                    }
                    summary.setAttribute("disabled", "");
                    error[index].innerText = "This Information Shoudn't Contains Only Numbers And Begin With A Number";
                    inpt[index].style.boxShadow = "0 0 0 5px rgba(255, 0, 0, 0.657)";
                    inpt[index].style.border = "solid 1.5px red";
                }
            } else {
                for (let i = 0; i < inpts.length - 1; i++) {
                    if (i != index) {
                        inpts[i].removeAttribute("disabled", "");
                    }
                }
                summary.removeAttribute("disabled", "");
                error[index].innerText = "";
                inpt[index].style.boxShadow = "none";
                inpt[index].style.border = "solid 1.5px #0066ff";
            }
        }

        function verfier() {
            for (let i = 0; i < inpt.length; i++) {
                if (inpt[i].value != "") {
                    send.removeAttribute("disabled", "");
                    error[i].innerText = "";
                    inpt[i].style.boxShadow = "none";
                    inpt[i].style.border = "solid 1.5px #0066ff";
                } else {
                    if (i != 2) {
                        error[i].innerText = "This Information Shoudn't Be Empty";
                        inpt[i].style.boxShadow = "0 0 0 5px rgba(255, 0, 0, 0.657)";
                        inpt[i].style.border = "solid 1.5px red";
                        send.setAttribute("disabled", "");
                        return 0;
                    }
                }
            }
            for (let i = 0, j = 0; i < inpt_radio.length; i++) {
                if (inpt_radio[i].checked) {
                    for (let i = 0; i < inpt_radio.length; i++) {
                        inpt_radio[i].style.outline = "none";
                    }
                    send.removeAttribute("disabled", "");
                    error_radio.style.visibility = "hidden";
                    break;
                } else {
                    j++;
                }
                if (j == inpt_radio.length) {
                    for (let i = 0; i < inpt_radio.length; i++) {
                        inpt_radio[i].style.outline = "red solid 2px";
                    }
                    error_radio.style.visibility = "visible";
                    send.setAttribute("disabled", "");
                    return 0;
                }
            }
            for (let i = 0; i < inpt_nbr.length; i++) {
                if (inpt_nbr[i].value != 0) {
                    error_nbr[i].style.visibility = "hidden";
                    inpt_nbr[i].style.border = "solid 1.5px #0066ff";
                    send.removeAttribute("disabled", "");
                } else {
                    inpt_nbr[i].style.border = "solid 1.5px red";
                    error_nbr[i].style.visibility = "visible";
                    send.setAttribute("disabled", "");
                    return 0;
                }
            }
            if (summary.value == "") {
                summary.placeholder = "the summary is empty"
                summary.style.border = "solid 1.5px red";
                summary.style.boxShadow = "0 0 0 5px rgba(255, 0, 0, 0.657)";
                send.setAttribute("disabled", "");
                return 0;
            } else {
                send.removeAttribute("disabled", "");
                summary.placeholder = "write the summary here"
                summary.style.boxShadow = "none";
                summary.style.border = "solid 1.5px #0066ff";
            }
            if (file.files.length == 0) {
                error_file.innerText = "No File Selected";
                img.style.border = "solid 1.5px red";
                send.setAttribute("disabled", "");
                return 0;
            } else {
                img.style.border = "solid 1.5px #0066ff";
                send.removeAttribute("disabled", "");
            }
            if (checkV.checked) send.removeAttribute("disabled", "");
            else send.setAttribute("disabled", "");
        }

        function changeValue() {
            checkV.checked = false
            send.setAttribute("disabled", "");
        }

        function isFileImage(file) {
            return file.files[0]['type'].split('/')[0] === 'image';
        }

        function upload_img() {
            if (isFileImage(file)) {
                error_file.innerText = "";
                img.style.border = "solid 1.5px #0066ff";
                checkV.removeAttribute("disabled", "");
                return 1;
            } else {
                img.style.border = "solid 1.5px red";
                error_file.innerText = "The file Uploaded Is Not An Image";
                checkV.setAttribute("disabled", "");
                return 0;
            }
        }
        window.addEventListener('load', function() {
            document.querySelector('input[type="file"]').addEventListener('change', function() {
                if (file.files && file.files[0]) {
                    img.onload = () => {
                        if (isFileImage(file)) {
                            URL.revokeObjectURL(img.src);
                            img.setAttribute("class", "mx-3 my-2 p-0");
                        }
                    }
                    if (isFileImage(file))
                        img.src = URL.createObjectURL(file.files[0]);
                }
            });
        });
    </script>
