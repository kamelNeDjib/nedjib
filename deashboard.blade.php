<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
   <title>Document</title>
</head>
<style>
    html,
    body,
    .all {
        height: 100%;
        margin: 0;
    }
    
    .all {
        position: relative;
    }
    
    body {
        overflow-y: scroll;
    }
    
    .sidebar {
        height: 100%;
        display: flex;
        flex-direction: column;
        text-align: center;
        background-color: #212529;
        color: white;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
    }
    
    .title {
        display: flex;
        justify-content: center;
        align-items: flex-start;
    }
    
    
    
    .menu li {
        text-align: center;
        list-style: none;
    }
    
    .footer {
        display: flex;
        justify-content: center;
        align-items: flex-end;
    }
    
    .menu li {
        text-align: center;
    }
    
    .menu li a {
        position: relative;
        border: none;
    }
    
    .menu .btn {
        width: 300px;
    }
    
    .content {
        position: absolute;
        right: 0;
        top: 0;
    }
    
    .box-nbr-inputs,
    .box-txt-inputs {
        outline: none;
        border: 1px solid #0066ff;
        border-radius: 3px;
        height: 30px;
    }
    
    .box-nbr-inputs:focus {
        outline: none;
        border: 1px solid #0066ff;
        box-shadow: 0 0 0 5px #0066ff86;
    }
    
    .inpt-box {
        position: relative;
    }
    
    .error,
    .error_nbr,
    .error_radio,
    .error_file {
        text-align: center;
        text-align-last: center;
        z-index: 1;
        height: 20px;
        font-size: 12px;
        color: red;
    }
    
    .error_nbr,
    .error_radio {
        visibility: hidden;
    }
    
    .error_radio,
    .error_file {
        text-align-last: start;
        text-align: start;
    }
    
    textarea {
        border: 1px solid #0066ff;
        border-radius: 3px;
    }
    
    textarea:focus {
        outline: none;
        border: 1px solid #0066ff;
        box-shadow: 0 0 0 5px #0066ff86;
    }
    
    .field-info {
        position: relative;
        display: flex;
        flex-direction: column;
    }
    
    #myimg {
        border: 1px solid #0066ff;
        outline: none;
        width: 250px;
    }
    
    .upload-txt {
        font-size: 15px;
        width: 270px;
    }
    
    @media only screen and (max-width: 992px) {
        .menu li a,
        .footer a {
            border-radius: 0px;
        }
        #myimg {
            border: 1px solid #0066ff;
            outline: none;
            width: 230px;
        }
        .upload-txt {
            font-size: 15px;
            width: 250px;
        }
    }
    
    @media only screen and (max-width: 768px) {
        .menu li a,
        .footer a {
            border-radius: 0px;
        }
        #myimg {
            border: 1px solid #0066ff;
            outline: none;
            width: 230px;
        }
        .upload-txt {
            font-size: 15px;
            width: 270px;
        }
    }
    
    @media only screen and (max-width: 576px) {
        table {
            font-size: 13px;
        }
        .btn-danger,
        .btn-light {
            font-size: 13px;
        }
        #myimg {
            border: 1px solid #0066ff;
            outline: none;
            width: 250px;
        }
        .upload-txt {
            font-size: 15px;
            width: 270px;
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
        #myimg {
            border: 1px solid #0066ff;
            outline: none;
            width: 100px;
        }
        .upload-txt {
            width: 120px;
        }
        .upload-txt {
            font-size: 15px;
            width: 270px;
        }
        .btn-danger,
        .btn-light {
            font-size: 8px;
        }
    }
    #my_menu{
        transform:translateY(-55px);
    }
</style>
<script type="text/javascript">
    function preback() { 
        window.history.forward();
    }
    setTimeout("preback()",0);
    window.onunload=function () { null };
    </script>
<body>
    <div class="all container-fluid p-0 row">
        <div class="col-lg-3 col-1 container-fluid mx-auto sidebar p-lg-3 p-0">
            <ul class="menu  mx-0 py-5 px-0 " id="my_menu">
                <li class="col-12 p-0">
                    <a href="{{ url('home') }} " class="col-12 btn btn-primary px-0 my-2"><img src="{{asset('images/home.svg')}}" class="d-lg-none mx-auto d-block" width="27px" height="27px"><span class="d-none d-lg-block">Home</span></a>
                </li>
          <?php if(session('idadmin')): ?>

                <li class="col-12 p-0">
                    <a href="{{ url('stats') }} " class="col-12 btn btn-primary px-0 my-2"><img src="{{asset('images/stats.svg')}}" class="d-lg-none mx-auto d-block" width="27px" height="27px"><span class="d-none d-lg-block">Stats</span></a>
                   
                </li>
                     <?php endif; ?>

                <li class="col-12 p-0">
                    <a href="{{ url('ajouterlivre') }} " class="col-12 btn btn-primary px-0 my-2"><img src="{{asset('images/add-book.svg')}}" class="d-lg-none mx-auto d-block" width="27px" height="27px"><span class="d-none d-lg-block">Add a book</span></a>
                </li>
                <li class="col-12 p-0">
                    <a href="{{ url('modify_book') }} " class="col-12 btn btn-primary px-0 my-2"><img src="{{asset('images/add-book.svg')}}" class="d-lg-none mx-auto d-block" width="27px" height="27px"><span class="d-none d-lg-block">Modify a book</span></a>
                </li>
                 <?php if(session('idadmin')): ?>

                <li class="col-12 p-0">
                    <a href="{{ url('account') }} "  class="col-12 btn btn-primary px-0 my-2"><img src="{{asset('images/accounts.svg')}}" class="d-lg-none d-block mx-auto" width="27px" height="27px"><span class="d-none d-lg-block">Accounts</span></a>
               </li>
                    <?php endif; ?>

                <li class="col-12 p-0">
                    <a href="{{ url('comment') }} " class="col-12 btn btn-primary px-0 my-2"><img src="{{asset('images/comments-dashbord.svg')}}" class="d-lg-none mx-auto d-block" width="27px" height="27px"><span class="d-none d-lg-block">Comments</span></a>
                </li>

                <li class="col-12 p-0">
                    <a href="{{ url('new') }} " class="col-12 btn btn-primary px-0 my-2"><img src="{{asset('images/news.svg')}}" class="d-lg-none mx-auto d-block" width="27px" height="27px"><span class="d-none d-lg-block">Add a news</span></a>
                </li>
                <li class="col-12 p-0">
                    <a href="{{ url('history') }} " class="col-12 btn btn-primary px-0 my-2"><img src="{{asset('images/history.svg')}}" class="d-lg-none mx-auto d-block" width="27px" height="27px"><span class="d-none d-lg-block">history</span></a>
                </li>
                                 <?php if(!session('idadmin')): ?>

                <li class="col-12 p-0">
                    <a href="{{ url('upcoming') }} " class="col-12 btn btn-primary px-0 my-2"><img src="{{asset('images/upcoming_book.svg')}}" class="d-lg-none mx-auto d-block" width="27px" height="27px"><span class="d-none d-lg-block">Add an Upcoming book</span></a>
                </li>
                                    <?php endif; ?>

                <li class="col-12 p-0">
                    <a href="{{ url('categories') }} " class="col-12 btn btn-primary px-0 my-2"><img src="{{asset('images/categorie.svg')}}" class="d-lg-none mx-auto d-block" width="27px" height="27px"><span class="d-none d-lg-block">Categories</span></a>
                </li>
                <li class="col-12 p-0">
                    <a href="{{ url('keywords') }} " class="col-12 btn btn-primary px-0 my-2"><img src="{{asset('images/keyword.svg')}}" class="d-lg-none mx-auto d-block" width="27px" height="27px"><span class="d-none d-lg-block">Key words</span></a>
                </li>
            
            <li class="col-12 p-0 py-4">
                <a href="{{ url('logout') }} " class="btn btn-danger col-12 px-0"><img src="{{asset('images/exit.svg')}}" class="d-lg-none d-block mx-auto" width="30px" height="30px"><span class="d-none d-lg-block">Exit</span></a> 
            </li> </ul>
        </div>
     @yield('content')
     
    </div>
     
    <script src="{{asset('java/bootstrap.bundle.min.js')}} "></script>
</body>

</html>