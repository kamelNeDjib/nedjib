<?php
foreach($books as $book)
{
    $book_name[] = $book->nomlivre;  
}

?>   
   
   
   
   @extends('layouts.deashboard');
   @Section('content');



<style>
h2{
    transform:translate(300px);
}

</style>
   <div class="col-lg-9 col-11 row container-fluid bg-light mx-0 content p-0">
   <h2>Modify a Book</h2>
            <form class="box col-12 m-lg-2 m-md-2 m-sm-2 m-1 p-3" method="POST" enctype="multipart/form-data" action="/modify_book_fun">
            {{ csrf_field() }}
                <div class="all-txt row p-0">
                    <div class="box-txt col-lg-7 col-md-7 col-sm-7 col-10">
                       <h5> choose a book </h5> <br>
                        <select id="cars" name="book_selection">
                          <?php for($i=0;$i<sizeof($book_name);$i++):?>
                          <option value="<?php echo $book_name[$i]; ?>" name="book_select_option"> <?php echo $book_name[$i]; ?> </option>
                          <?php endfor; ?>
                        </select>
                        <div class="field-info my-3">
                            <label for="b-title" class="l-txt my-1 font-weight-bold">Book Title :</label>
                            <div class="inpt-box col-lg-8 col-md-9 col-sm-12 col-12 ">
                                <input type="text" id="b-title" name="book_name" class="col-12 box-txt-inputs my-1 px-2" onfocusout="textVerification(0)" onfocus="f_style(),changeValue()">
                                <div class="error p-0 col-12"></div>
                            </div>
                        </div>
                        <div class="field-info my-3">
                            <label for="m-author" class="l-txt my-1 font-weight-bold">The Main Author :</label>
                            <div class="inpt-box col-lg-8 col-md-9 col-sm-12 col-12">
                                <input type="text" id="m-author" name="author1" class="col-12 box-txt-inputs my-1 px-2" onfocusout="textVerification(1)" onfocus="f_style(),changeValue()">
                                <div class="error p-0 col-12"></div>
                            </div>
                        </div>
                        <div class="field-info my-3">
                            <label for="s-author" class="l-txt my-1 font-weight-bold">The Secondary Author :</label>
                            <div class="inpt-box col-lg-8 col-md-9 col-sm-12 col-12">
                                <input type="text" id="s-author" name="author2" class="col-12 box-txt-inputs my-1 px-2" onfocusout="textVerification(2)" onfocus="f_style(),changeValue()">
                                <div class="error p-0 col-12"></div>
                            </div>
                        </div>
                        <div class="field-info my-3">
                            <label for="s-author" class="l-txt my-1 font-weight-bold">The Publisher company :</label>
                            <div class="inpt-box col-lg-8 col-md-9 col-sm-12 col-12">
                                <input type="text" id="s-author" name="edition" class="col-12 box-txt-inputs my-1 px-2" onfocusout="textVerification(3)" onfocus="f_style(),changeValue()">
                                <div class="error p-0 col-12"></div>
                            </div>
                        </div>
                    </div>
                    <div class="img col-lg-4 col-md-4 col-sm-7 col-10">
                        <div class="file-upload mx-auto my-3">
                            <label for="b-title" class="my-1 font-weight-bold">Upload Your Image Here :</label>
                            <input type="file" title="uiy" class="upload-txt mx-3 my-1" name="image" id="file" onfocus="changeValue()" onchange="upload_img()">
                            <img src="{{asset('images/upload-img.svg')}}" id="myimg" class="rounded mx-3 my-2 p-4" height="350px">
                            <div class="error_file"></div>
                        </div>
                    </div>
                </div>
                <div class="radio-aria col-12 p-0">
                    <div class="col-12 box-c">
                        <div class="col-12 font-weight-bold row">Categories</div>
                        <div class="row col-12 mx-auto">
                            <div class="box col-lg-3 col-md-4 col-6 my-2">
                                <input class="form-check-input inpt-radio" type="radio" name="categorie" value="Sociologie" id="flexCheckDefault-1" onfocus="changeValue()">
                                <label class="form-check-label" for="flexCheckDefault-1">Sociologie</label>
                            </div>
                            <div class="box col-lg-3 col-md-4 col-6 my-2">
                                <input class="form-check-input inpt-radio" type="radio" name="categorie" value="medical" id="flexCheckDefault-2" onfocus="changeValue()">
                                <label class="form-check-label" for="flexCheckDefault-2">Medical</label>
                            </div>
                            <div class="box col-lg-3 col-md-4 col-6 my-2">
                                <input class="form-check-input inpt-radio" type="radio" name="categorie" value="philosophie" id="flexCheckDefault-3" onfocus="changeValue()">
                                <label class="form-check-label" for="flexCheckDefault-3">Philosophie</label>
                            </div>
                            <div class="box col-lg-3 col-md-4 col-6 my-2">
                                <input class="form-check-input inpt-radio" type="radio" name="categorie" value="physiques" id="flexCheckDefault-4" onfocus="changeValue()">
                                <label class="form-check-label" for="flexCheckDefault-4"> physic</label>
                            </div>
                            <div class="box col-lg-3 col-md-4 col-6 my-2">
                                <input class="form-check-input inpt-radio" type="radio" name="categorie" value="litterature" id="flexCheckDefault-5" onfocus="changeValue()">
                                <label class="form-check-label" for="flexCheckDefault-5">literature</label>
                            </div>
                            <div class="box col-lg-3 col-md-4 col-6 my-2">
                                <input class="form-check-input inpt-radio" type="radio" name="categorie" value="mathematiques" id="flexCheckDefault-6" onfocus="changeValue()">
                                <label class="form-check-label" for="flexCheckDefault-6">mathematics</label>
                            </div>
                            <div class="box col-lg-3 col-md-4 col-6 my-2">
                                <input class="form-check-input inpt-radio" type="radio" name="categorie" value="historique" id="flexCheckDefault-7" onfocus="changeValue()">
                                <label class="form-check-label" for="flexCheckDefault-7">historie</label>
                            </div>
                        </div>
                        <div class="col-12 error_radio">You Must Choose A Category</div>
                    </div>
                </div>
                <div class="col-12 row p-0">
                    <div class="field-info col-lg-4 col-md-4 col-sm-6 col-8 my-2">
                        <label for="s-author" class="my-1 font-weight-bold">The Number of Pages :</label>
                        <div class="inpt-box col-lg-8 col-md-8 col-sm-8 col-11">
                            <input type="number" name="pages_number" id="s-author" value="0" min="0" class="col-12 box-nbr-inputs my-1 px-2" onfocusout="nbr_f()" onfocus="f2_style(),changeValue()">
                            <div class="error_nbr">The Number Of The Book Page Shoudn't Be 0</div>
                        </div>
                    </div>
                    <div class="field-info col-lg-4 col-md-4 col-sm-6 col-8 my-2">
                        <label for="s-author" class="my-1 font-weight-bold">The Amount :</label>
                        <div class="inpt-box col-lg-8 col-md-8 col-sm-8 col-11">
                            <input type="number" name="amount" id="s-author" value="0" min="0" class="col-12 box-nbr-inputs my-1 px-2" onfocusout="nbr_f()" onfocus="f2_style(),changeValue()">
                            <div class="error_nbr">The Amount Shoudn't Be 0</div>
                        </div>
                    </div>
                </div>
                <div class="field-info col-lg-10 my-2 p-0">
                    <label for="s-author" class="my-1 font-weight-bold">Book Summary :</label>
                    <textarea name="summary" placeholder="write the summary here" rows="10" class="my-comment p-2 my-1" onfocus="changeValue()"></textarea>
                </div>
                <div class="box col-lg-6 col-md-6 col-12 my-2">
                    <input class="form-check-input" type="checkbox" name="category" id="checkboxV" onclick="verfier()">
                    <label class="form-check-label" for="checkboxV">Are Sure Of Your Information</label>
                </div>
                <input type="submit" class="btn col-lg-2 col-md-2 col-sm-3 col-5 btn-success send" disabled value="Send">
            </form>
        </div>
        
   
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

    @endsection