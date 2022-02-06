<?php


/*

require 'connection.php';
session_start();
$i;
$S='A'; 
$a=69;

$nomlivre=array();
$srcimg=array();
$src_url=array();
$sql =" SELECT * FROM livre,image where image.codelivre= livre.codelivre order by nomlivre  ASC ";
$stmt=$con->prepare($sql);
$stmt->execute();
foreach ($stmt->get_result() as $row)
{
    $nomlivre[] = $row['nomlivre'];
    $srcimg[] = $row['srcimg'];
    $src_url[]= "book-page.php?nomlivree=".$row['nomlivre']."";
}
// this is the php code for searching suugestions and dropdown generator 
 if (isset($_GET['query'])) {
    $_SESSION['test1']=1;
    $inpText = $_GET['query'];
    $sql = " SELECT * FROM livre,auteur where ( nomlivre LIKE '$inpText%' or nom LIKE '$inpText%' ) AND auteur.Numauteur=livre.numauteur LIMIT 3";
    $stmt=$con->prepare($sql);
    $stmt->execute();
    $result= $stmt->get_result();
    $usercount= $result->num_rows;
    if ( $usercount>0) {
      foreach ($result as $row) {
        echo '<a href="books2.php?livre='.$row['nomlivre'].'&maxpage=&minpage=" class="list-group-item list-group-item-action border-1" style="position: relative;">' . $row['nomlivre'] . '</a>';
      }
    } else {
      echo '<p class="list-group-item border-1" style="position: relative;">Not found</p>';
    }
  }
  
*/

/* LARAVEL CODE */

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <script src="{{asset('java/bootstrap.bundle.min.js')}} "></script>

   <!-- Script -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
 
 <!-- jQuery UI -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
  <!-- Bootstrap -->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css">
    <title>Books</title>
</head>
<style>
    .book-line .row .col {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    .card {
        width: 180px;
        transition: .4s;
    }
    
    .card img {
        height: 250px;
    }
    
    .card:hover {
        transform: scale(1.03);
        box-shadow: 1px 5px 15px #888888;
        text-decoration: none;
    }
    
    .title-card {
        height: 50px;
        color: black;
        font-weight: bold;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    
    #first_letter {
        font-size: 40px;
    }
    .h{
        font-size: 40px;
    }
    ul{
        background-color: #eee;
        cursor:pointer;
    }
    li{
        padding:12px;
    }
    #show-list{
        position: absolute;
    }
    .navbar-nav li{
        padding : 0px;
    }
    .dropdown-menu{
        padding : 0px; 
    }
    input,select{
        padding: 5px;
        border:1px solid black;
        border-radius: 5px
    }
    input:focus
    {
       outline :transparent;
        border :solid 1px rgb(0, 217, 255);
        box-shadow :0 0 0 4px rgb(0, 217, 255);
    }
</style>
<body>
    <div class="container p-2 my-3 bg-dark rounded">
    <?php if(!session('test1')): ?>
        <form  method="GET" >

            <div class="box my-2 row d-flex justify-content-center">
                <input class=" col-10" name="livre" type="search" id="search_1_box" placeholder="Search With Book Name or Author's name or Key or Keyword" autocomplete="off" aria-label="Search">
         
            <div class="col-md-5" id="suggestions" style="position: relative;margin-top: -147x;margin-right: 510px; z-index:1">
                 <div class="list-group" id="show-list"></div>
            </div>
            </div>
            <div class="box my-2 row d-flex justify-content-center">
                                <input type="number" class="col-md-2 m-1 col-3" name="ndisp"placeholder="nombre disponible" id="max_pages">

                <input type="number" class="col-md-2 m-1 col-3" name="maxpage"placeholder="max pages" id="max_pages">
                <input type="number" class="col-md-2 m-1 col-3" name="minpage"placeholder="min pages" id="min_pages">
                    <select name="langue" class="col-md-2 m-1 col-3" >
                        <option></option>
                   <option value="Français" >
                    Français
                   </option>     
                      <option  value="Englais">
                   Englais
                   </option>   
                      <option value="Arab" >
                    Arab
                   </option>   
                    </select>
                      <select name="anne" class="col-md-2 m-1 col-3">
                       <option></option> 
                    @for($i=1;$i<8;$i++) 
                   <option value="{{$i+2015}}">
{{2015+$i}}
                 </option>
                 @endfor
                    </select>
            </div>
            <div class="checkbox-aria text-white d-flex justify-content-center">
                <div class="col col-3" style="display:flex;flex-direction:column;align-items:center">
                    <div class="box m-2">
                        <input class="form-check-input" type="radio" name="categorie" value="historique" id="flexCheckDefault-1">
                        <label class="form-check-label" for="flexCheckDefault-1">
                        history
                </label>
                    </div>
                    <div class="box m-2">
                        <input class="form-check-input" type="radio" name="categorie" value="medical" id="flexCheckDefault-2">
                        <label class="form-check-label" for="flexCheckDefault-2">
                        medical
                </label>
                    </div>
                    <div class="box m-2">
                        <input class="form-check-input" type="radio" name="categorie" value="Sociologie" id="flexCheckDefault-3">
                        <label class="form-check-label" for="flexCheckDefault-3">
                        Sociology
                </label>
                    </div>
                </div>
                <div class="col col-3" style="display:flex;flex-direction:column;align-items:center">
                    <div class="box m-2">
                        <input class="form-check-input" type="radio" name="categorie" value="philosophie" id="flexCheckDefault-4">
                        <label class="form-check-label" for="flexCheckDefault-4">
                        philosophy
                </label>
                    </div>
                    <div class="box m-2">
                        <input class="form-check-input" type="radio" name="categorie" value="litterature" id="flexCheckDefault-5">
                        <label class="form-check-label" for="flexCheckDefault-5">
                        literature
                </label>
                    </div>
                    <div class="box m-2">
                        <input class="form-check-input" type="radio" name="categorie" value="mathematiques" id="flexCheckDefault-6">
                        <label class="form-check-label" for="flexCheckDefault-6">
                        mathematics
                </label>
                    </div>
                </div>
                <div class="col col-3" style="display:flex;flex-direction:column;align-items:center">
                    <div class="box m-2">
                        <input class="form-check-input" type="radio" name="categorie" value="physiques" id="flexCheckDefault-7">
                        <label class="form-check-label" for="flexCheckDefault-7">
                        physics
                </label>
                    </div>
                </div>
            </div>
            <div class="box d-flex justify-content-center m-2">
                <button class="btn btn-success" type="submit">Search</button>
            </div>
            
        </form>
    <?php endif; ?>
    </div>
    <div class="container">
    <?php if(!session('test1')): ?>
    @for($i=0;$i<sizeof($nomlivre);)
        <div class="book-line">
            <hr>
            <div class="row">
                @if($i<sizeof($nomlivre))
                <div class="col my-2 col-md-3 col-sm-4 col-6">
                    <a class="card" href=" <?php echo $src_url[$i]; ?> ">
                        <img src="{{asset('images')}}/{{$srcimg[$i]}}" class="card-img-top">
                        <div class="card-body p-1">
                            <div class="nomlivre title-card text-danger text-center"><?php echo $nomlivre[$i]; ?></div>
                        </div>
                    </a>
                </div>
                @endif
                <?php $i++; ?>

                @if($i<sizeof($nomlivre))
                <div class="col my-2 col-md-3 col-sm-4 col-6">
                <a class="card" href=" <?php echo $src_url[$i]; ?> ">
                    <img src="<?php echo $srcimg[$i]; ?>" class="card-img-top">
                        <div class="card-body p-1">
                            <div class="nomlivre2 title-card text-danger text-center"><?php echo $nomlivre[$i]; ?></div>
                        </div>
                    </a>
                </div>
                @endif
                <?php $i++; ?>

                @if($i<sizeof($nomlivre))
                <div class="col my-2 col-md-3 col-sm-4 col-6">
                <a class="card" href=" <?php echo $src_url[$i]; ?> ">
                    <img src="<?php echo $srcimg[$i]; ?>" class="card-img-top">
                        <div class="card-body p-1">
                            <div class="nomlivre3 title-card text-danger text-center"><?php echo $nomlivre[$i]; ?></div>
                        </div>
                    </a>
                </div>
                @endif
                <?php $i++; ?>

                @if($i<sizeof($nomlivre))
                <div class="col my-2 col-md-3 col-sm-4 col-6">
                <a class="card" href=" <?php echo $src_url[$i]; ?> ">
                    <img src="<?php echo $srcimg[$i]; ?>" class="card-img-top">
                        <div class="card-body p-1">
                            <div class="nomlivre4 title-card text-danger text-center"><?php echo $nomlivre[$i]; ?></div>
                        </div>
                    </a>
                </div>
                @endif
                <?php $i++; ?>
            </div>
        </div>
        <?php $a=69;endfor;?>
        <?php 

        
        endif; 
        if(session('test1'))
        {
           session()->forget('test1');
        }
                
        ?>

    </div>
</body>

<script>
$(document).ready(function(){

 $('#search_1_box').keyup(function(){ 
        var query = $(this).val();
        if(query != '')
        {
         $.ajax({
          url:"{{ route('livrecontroller.books1') }}",
          method:"GET",
          data:{query:query},
          success:function(data){
           $('#show-list').fadeIn(); 
                    $('#show-list').html(data);

          }
         });
        }
    });


    $(document).on('click', 'li', function(){  
      $('#search_1_box').val($(this).text());  
        $('#search_1_box').fadeOut();  
    });  
  $('#search_1_box').change(function(){
                               
    $('#show-list').fadeOut();
    });
});
 </script>  
</html>


