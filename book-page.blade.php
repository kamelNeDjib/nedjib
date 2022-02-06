<?php


?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <title> {{session('nomlivre') }}</title>
</head>
<style>
    .title {
        font-size: 30px;
        font-weight: bold;
    }
    
    .resume {
        font-size: 22px;
        line-height: 40px;
    }
    
    img {
        border-radius: 10px;
    }
    
    .text {
        font-weight: 500;
    }
    
    .info-bottom {
        line-height: 40px;
    }
    .tag {
        color: white;
        padding: 3px;
        width: 100px;
        border-radius: 5px;
    }
    
    .nbr-box-book {
        width: 200px;
        height: 200px;
        font-size: 40px;
        color: white;
        text-align: center;
        line-height: 200px;
        border-radius: 10px;
    }
    
    .info-right {
        display: grid;
        grid-template-columns: 1fr;
        grid-auto-rows: 2;
    }
    
    .info-right:nth-child(1) {
        grid-row: 1/2;
    }
    
    .info-right:nth-child(2) {
        grid-row: 2/3;
    }
    
    .box-info-txt .row {
        display: flex;
        flex-direction: column;
    }
    
    .rating {
        width: 200px;
    }
    
    .rating-point {
        width: 100%;
        height: 25px;
    }
    
    #rating-point-1 {
        width: 100%;
        height: 25px;
        background-color: rgb(255, 92, 92);
    }
    
    #rating-point-2 {
        width: 100%;
        height: 25px;
        background-color: rgb(251, 40, 40);
    }
    
    #rating-point-3 {
        width: 100%;
        height: 25px;
        background-color: rgb(233, 0, 0);
    }
    
    #rating-point-4 {
        width: 100%;
        height: 25px;
        background-color: rgb(184, 0, 0);
    }
    
    #rating-point-5 {
        width: 100%;
        height: 25px;
        background-color: rgb(136, 0, 0);
    }
    
    .book-nbr {
        width: 150px;
        height: 150px;
        background-color: rgb(0, 153, 255);
        border: 1px solid black;
        border-radius: 5px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    .book-box {
        display: flex;
        justify-content: space-around;
        align-items: center;
    }
    
    .book-nbr {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        font-size: 35px;
    }
    
    .rate-aria .col:nth-child(1) {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    
    #showRate,
    .f-box .btn {
        width: 50px;
        height: 25px;
        border: 2px solid rgb(0, 140, 255);
        border-radius: 3px;
    }
    
    #showRate:focus {
        outline: none;
        border: 2px solid rgb(0, 140, 255);
        box-shadow: 0 0 0 3px rgba(0, 140, 255, 0.596);
    }
    
    #customRange2:focus {
        outline: none;
        border: none;
    }
    
    .head-bar {
        border-top: 2px solid black;
        border-bottom: 2px solid black;
    }
    
    .my-comment {
        width: 90%;
        height: 80px;
        margin: 0 auto;
    }
    
    #comment {
        display: none;
        flex-direction: column;
        align-items: center;
    }
    
    .comment-box {
        border: solid 2px black;
        border-radius: 4px;
    }
    @media only screen and (max-width: 1200px) {
        .resume {
        font-size: 20px;
        line-height: 40px;
       }
    }
    @media only screen and (max-width: 992px) {
        .resume {
        font-size: 16px;
        line-height: 40px;
       }
    }
    @media only screen and (max-width: 768px) {
        .resume {
        font-size: 16px;
        line-height: 40px;
       }
    }
    @media only screen and (max-width: 576px) {
        .resume {
        font-size: 14px;
        line-height: 40px;
       }
    }
    @media only screen and (max-width: 400px) {
        .content {
            width: 100%;
            position: absolute;
            left: 100%;
            top: 0;
            transform: translate(-100%, 0);
        }
        img {
            width: 15px;
            height: 15px;
        }
        table {
            font-size: 8px;
        }
        .btn-danger,
        .btn-light {
            font-size: 8px;
        }
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a href="home_user" class="navbar-brand font-weight-bold text-dark">Library</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#dropdownItems" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon text-dark bg-primary" style="border-radius: 3px;"></span>
            </button>
            <div class="collapse navbar-collapse" id="dropdownItems">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ml-4">
                    <li class="nav-item">
                        <a class="nav-link mx-1 text-dark rounded bg-light my-lg-0 my-md-1 my-sm-1 my-1 text-center" aria-current="page" href="http://127.0.0.1:8000/home_user">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-1 active text-dark rounded bg-light my-lg-0 my-md-1 my-sm-1 my-1 text-center" href="">Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-1 text-dark active rounded bg-light my-lg-0 my-md-1 my-sm-1 my-1 text-center" href="http://127.0.0.1:8000/notifications">Notification
                       @if($notif_number>0) <span class="badge bg-danger text-white"> {{ $notif_number }}  </span> 
                        @endif
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-1 text-dark active rounded bg-light my-lg-0 my-md-1 my-sm-1 my-1 text-center" href="http://127.0.0.1:8000/help">Help</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link mx-1 active rounded text-dark bg-light my-lg-0 my-md-1 my-sm-1 my-1 text-center dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Contacts
                    </a>
                        <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item text-center" href="http://www.facebook.com" target="_blank">Facebook</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-center" href="http://www.twitter.com" target="_blank">Twitter</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-center" href="mailto:miniprojet20211@gmail.com" target="_blank">Gmail</a></li>
                        </ul>
                    </li>
                </ul>
                 <?php if(!(session('idclient'))): ?>
                  <ul class="navbar-nav ml-auto mb-2 mb-lg0">
                    <li class="nav-item mt-2 mb-2 mr-lg-3 ml-lg-3 ml-4"><a class="btn btn-danger me-3" href="http://127.0.0.1:8000/singup" role="button">SingUp</a></li>
                    <li class="nav-item mt-2 mb-2 mr-lg-3 ml-lg-3 ml-4"><a class="btn btn-primary me-3" href="http://127.0.0.1:8000/login" role="button">LogIn</a></li>
                  </ul>
                <?php endif; ?>

                <?php if((session('idclient'))) :?>
                   <ul class="navbar-nav ml-auto mb-2 mb-lg0">
                     <li class="nav-item mt-2 mb-2 mr-lg-3 ml-lg-3 ml-4"><a class="btn btn-danger me-3" href="http://127.0.0.1:8000/logout" role="button">Logout</a></li>
                   </ul>
                 <?php endif; ?>
            </div>
    </nav>
    <div class="container d-flex justify-content-center mt-4">
        <div class="row box-info-txt">
            <div class="col-lg-4 col-md-5 col-sm-12 info-right">
                <div class="col-lg-10 col-md-12 col-sm-7 col-7 mx-auto book-img"><img src="{{asset('images')}}/{{session('srcimg')}}" height="370px" width="100%"></div>
                <div class="col-lg-10 col-md-12 col-sm-7 col-7 mx-auto my-2">
                    <div class="text text-primary my-3 category">Category : <span class="tag bg-secondary"> <?php echo session('nomcategorie'); ?> </span></div>
                    <div class="text text-primary my-3 author"> Author : <span class="tag text-secondary"> <?php echo session('nom_auteur'); ?> </span></div>
                    <div class="text text-primary my-3 pages">Page : <span class="tag bg-secondary"> <?php echo session('Npages'); ?> </span></div>
                    <div class="text text-primary my-3 pages">Langue : <span class="tag bg-secondary"> <?php echo session('langue'); ?> </span></div>
                    @if(session('keyword'))
                    <div class="text text-primary my-3 pages">Keyword : <span class="tag bg-secondary"> <?php echo session('keyword'); ?> </span></div>
                    @endif
                    <div class="text text-primary my-3 pages">Published By : <span class="tag text-secondary"> <?php echo session('edition'); ?> </span></div>
                </div>
            </div>
            <div class="col-lg-7 col-md-6 col-sm-12 info-bottom">
                <div class="box">
                    <div class="title mb-3 text-center text-sm-center text-md-left text-lg-left "> <?php echo session('nomlivre'); ?> </div>
                    <div class="resume text-center text-sm-center text-md-left text-lg-left"> <?php echo session('resume_livre'); ?> </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container row d-flex justify-content-center m-auto px-0">
       <div class="col-lg-4 col-md-5 col-sm-12 col-12 d-flex justify-content-lg-start justify-content-md-start justify-content-sm-center justify-content-center px-0 my-sm-3 my-3">
       <?php if($Rating==0): ?> <h5 class="sccore text-lg-left text-md-left text-center text-sm-center text-success">Not rated yet</h5> <?php endif; ?>
        <?php if($Rating>0): ?>
            <div class="col-lg-10 col-md-10 col-sm-7 col-7 rating px-0">
            <h5 class="sccore text-lg-left text-md-left text-center text-sm-center text-success"> <?php if($Rating>0): ?> The Total is : <span> <?php echo $Rating;?></span>/5 <span>  <?php if(($Rating1+$Rating2+$Rating3+$Rating4+$Rating5)>0) { echo "( "; echo ($Rating1+$Rating2+$Rating3+$Rating4+$Rating5); echo " clients )"; } ?>   </span> <?php endif; ?>
                <div class="rating_number rating-box d-flex align-items-center"><span id="rating1" class="mr-2">1</span>
                    <div id="rating-point-1" class="rating_box rating-point my-1 five" style="width: <?php if($Rating>0){ echo $Rating1_percent;} ?>"></div><span class="ml-2"> <?php echo $Rating1_percent."%"; ?></span></div>
                <div class="rating_number rating-box d-flex align-items-center"><span class="mr-2">2</span>
                    <div id="rating-point-2" class="rating-point my-1 four" style="width: <?php if($Rating>0){ echo $Rating2_percent;} ?>"></div><span class="ml-2"> <?php echo $Rating2_percent."%"; ?></span></div>
                <div class="rating_number rating-box d-flex align-items-center"><span class="mr-2">3</span>
                    <div id="rating-point-3" class="rating-point my-1 three" style="width: <?php if($Rating>0){ echo $Rating3_percent;} ?>"></div><span class="ml-2"> <?php echo $Rating3_percent."%"; ?></span></div>
                <div class="rating_number rating-box d-flex align-items-center"><span class="mr-2">4</span>
                    <div id="rating-point-4" class="rating-point my-1 two" style="width: <?php if($Rating>0){ echo $Rating4_percent;} ?>"></div><span class="ml-2"> <?php echo $Rating4_percent."%"; ?></span></div>
                <div class="rating_number rating-box d-flex align-items-center"><span class="mr-2">5</span>
                    <div id="rating-point-5" class="rating-point my-1 one" style="width: <?php if($Rating>0){ echo $Rating5_percent;} ?>"></div><span class="ml-2"> <?php echo $Rating5_percent."%"; ?></span></div>
            </div>
        <?php endif; ?>
        </div>
        <div class="col-lg-7 col-md-6 col-sm-12 col-12 book-box">
            <div class="book-nbr valid my-sm-3 my-3"> <?php echo session('nombre_livrees_dispo'); ?>
                <div class="text-white" style="font-size: 20px;">Available Books</div>
            </div>
            <div class="book-nbr rent bg-danger my-sm-3 my-3"> <?php echo session('nombre_exemplaire') - session('nombre_livrees_dispo'); ?>
                <div class="text-white" style="font-size: 20px;">Rented Books</div>
            </div>
        </div>
    </div>
    <div class="container my-5 mx-auto rate-aria row d-flex d-flex justify-content-center px-0">
        <div class="col-lg-4 col-md-5 col-sm-12 col-12 mx-0 px-0 my-3">
            <div class="col-lg-10 col-md-10 col-sm-7 col-7 mx-lg-0 mx-md-0 mx-sm-auto mx-auto px-0">
            <?php if((session('idclient'))) : ?>
                <h5 class="text-lg-left text-md-left text-sm-center text-center font-weight-bold text-primary mx-2">Your Rate Is :</h5>
                <form action="" method="POST" class="f-box d-flex justify-content-center">
                                                           {{ csrf_field() }}

                    <input type="range" class="form-range" min="1" max="5" value="1" step="1" id="customRange2" onchange="fOne()">
                    <input name="rating" type="number" class="mx-2" min="1" max="5" value="1" step="1" id="showRate" onchange="fTwo()">
                <button class="btn btn-primary p-0 d-flex justify-content-center"  name ="send">Send</button></form>
                
            </div>
            <?php endif; ?>
        </div>
        <?php if((session('idclient'))) : ?>
        <div class="col-lg-7 col-md-6 d-flex justify-content-center col-sm-12" style="align-items: center;">
            <?php 
            if(!(session('is_rented')))
            {
                session()->put('is_rented',0);
            }
            ?>
            <?php if(session('nombre_livrees_dispo') && $did_rent==0): ?>
           <a href="{{session('codelivre')}}/{{$idclient}}"><button name="rent"  class="btn btn-primary d-flex justify-content-center m-3"  style="height: 35px;align-items: center;">Rent Book</button></a>
            <?php endif; ?>
            <?php  if((session('nombre_livrees_dispo') < session('nombre_exemplaire')) && $did_rent==1): ?>
         <a href="z/{{session('codelivre')}}/{{$idclient}}"><button name="return" class="btn btn-danger d-flex justify-content-center m-3" type="submit" style="height: 35px;align-items: center;">Return Book</button></a>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>
    </div>
    <div class="container box-comments my-4">
        <div class="head-bar p-2" style="line-height: 40px;">
            <img src="{{asset('images/comments.svg')}}" width="30px" height="40px"><span class="mx-2 font-weight-bold text-primary">Comments</span>
            <?php if((session('idclient'))): ?>
            <button id="write-comment" class="btn btn-danger font-weight-bold" style="float: right;" onclick="fThree()">Write a comment</button>
            <?php endif; ?>
        </div>
        <div class="comments">
            <form method="GET" id="comment" class="p-3" >
                <textarea name="comment" placeholder="write your opinion" class="my-comment p-2 m-1"></textarea>
                <button class="btn btn-primary" type="submit">Send</button>
            </form>
            <?php for($i=0;$i<sizeof($comment_content);$i++): ?>
            <div class="all_comments">
                <div class="comment-box my-4">
                    <div class="info m-2">
                        <span class="the_name font-weight-bold text-primary"> <?php echo $comment_owner[$i]; ?></span>
                        <span class="the_date" style="float: right;"> <?php echo $comment_date[$i]; ?> </span>
                    </div>
                    <hr>
                    <div class="text m-2">
                    <?php echo $comment_content[$i]; ?>
                    </div>
                </div>
            </div>
            <?php endfor; ?>
            <?php if(sizeof($comment_content)==0):?>
                <h4 class="mx-auto text-center p-5" style="color:red;"> Not commented yet </h4>
            <?php endif; ?>
        </div>
    </div>
    <footer class="text-center text-white mt-2 p-3 bg-dark">
        cpoyright &copy; 2021 Groupe  Houssem Nadjib 
    </footer>
    <script src="{{asset('java/bootstrap.bundle.min.js')}} "></script>
    <script>
        var ranger = document.getElementById("customRange2"),
            nbrBox = document.getElementById("showRate"),
            comment_dispaly = document.getElementById("comment"),
            toggle = 0;
        function fOne() {
            nbrBox.value = ranger.value;
        }
        function fTwo() {
            ranger.value = nbrBox.value;
        }
        function fThree() {
            if (toggle % 2 == 0) {
                comment_dispaly.style.display = "flex";
                toggle++;
            } else {
                comment_dispaly.style.display = "none";
                toggle++;
            }
        }
        function preback() { 
        window.history.forward();
        }
        setTimeout("preback()",0);
        window.onunload=function () { null };
    </script>
</body>

</html>