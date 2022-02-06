<?php

$i;
$S='A'; 
$a=69;
$w=5;
$nmbr_of_unempty_inputs=0;
$errors=array();
$nomlivre=array();
$srcimg=array();
$src_url=array();
$livre="";
$maxpage="";
$minpage="";
$categorie="";
$results_number=0;
if($_SERVER['REQUEST_METHOD'] == "GET")
{
    if(!empty($req->input('livre')))
    {
        $livre = $req->input('livre'));
        $nmbr_of_unempty_inputs++ ;
    }
    if(!empty($req->input('maxpage')))
    {
        $maxpage = $req->input('maxpage');
        $nmbr_of_unempty_inputs++ ;
    }
	if(!empty($req->input('minpage')))
    {
        $minpage = $req->input('minpage');
        $nmbr_of_unempty_inputs++ ;
    }
    if(!empty($req->input('categorie')))
    {
        $categorie=$req->input('categorie');
        $nmbr_of_unempty_inputs++ ;
    }
    if($nmbr_of_unempty_inputs==4)
    { // search with book name and maxpage and minpage and categorie
         $sql=DB::table('livre')->join('auteur','auteur.Numauteur','=','livre.numauteur')->join('keyword','keyword.codelivre','=','livre.codelivre')->join('categorie','categorie.codecategorie','=','livre.codecateguori')->join('image','image.codelivre','=','livre.codelivre')->where('categorie.nomcategorie','like',$categorie,'%')->where('livre.nomlivre','LIKE',$livre,'%')->orwhere('auteur.nom','LIKE',$livre,'%')->orwhere('keyword.content_keyword','LIKE',$livre,'%')->where('livre.Npages','<',$maxpage)->where('livre.Npages','>',$minpage)->orderby('livre.nomlivre',ASC)->get();
            
       /* $sql =" SELECT* FROM  categorie,auteur,livre,image WHERE ( nomlivre like '$livre%' or nom='$livre') and ( Npages<='$maxpage' and Npages>='$minpage') and nomcategorie like '$categorie%' and image.codelivre= livre.codelivre and auteur.Numauteur=livre.numauteur and categorie.codecategorie=livre.codecateguori order by nomlivre  ASC"; */
        $result=mysqli_query($con,$sql);
        $stmt=$con->prepare($sql);
        $stmt->execute();
        $result=mysqli_num_rows($result);
        //$result= mysqli_query($con,$sql);
        foreach ($sql as $row)
        {
            $nomlivre[] = $row->nomlivre;
            $srcimg[] = $row->srcimg;
            $src_url[]= "book-page/nomlivree=".$row->nomlivre."";
        }
        $results_number=sizeof($nomlivre);
    }
    else if(!empty($req->input('livre')) && !empty($req->input('maxpage')) && empty($req->input('minpage')) && !empty($req->input('categorie')))
    {
$sql=DB::table('livre')->join('auteur','auteur.Numauteur','=','livre.numauteur')->join('keyword','keyword.codelivre','=','livre.codelivre')->join('categorie','categorie.codecategorie','=','livre.codecateguori')->join('image','image.codelivre','=','livre.codelivre')->where('categorie.nomcategorie','like',$categorie,'%')->where('livre.nomlivre','LIKE',$livre,'%')->orwhere('auteur.nom','LIKE',$livre,'%')->orwhere('keyword.content_keyword','LIKE',$livre,'%')->where('livre.Npages','<',$maxpage)->orderby('livre.nomlivre',ASC)->get();


     // search with book name and maxpage and categorie
        //$result= mysqli_query($con,$sql);
        foreach ($sql as $row)
        {
             $nomlivre[] = $row->nomlivre;
            $srcimg[] = $row->srcimg;
            $src_url[]= "book-page/nomlivree=".$row->nomlivre."";
        }
        $results_number=sizeof($nomlivre);
    }
    else if(!empty($req->input('livre')) && empty($req->input('maxpage')) && !empty($req->input('minpage')) && !empty($req->input('categorie')))
    { // search with book name and minpage and categorie
        $sql=DB::table('livre')->join('auteur','auteur.Numauteur','=','livre.numauteur')->join('keyword','keyword.codelivre','=','livre.codelivre')->join('categorie','categorie.codecategorie','=','livre.codecateguori')->join('image','image.codelivre','=','livre.codelivre')->where('categorie.nomcategorie','like',$categorie,'%')->where('livre.nomlivre','LIKE',$livre,'%')->orwhere('auteur.nom','LIKE',$livre,'%')->orwhere('keyword.content_keyword','LIKE',$livre,'%')->where('livre.Npages','>',$minpage)->orderby('livre.nomlivre',ASC)->get();
     
        foreach ($sql as $row)
        {
           $nomlivre[] = $row->nomlivre;
            $srcimg[] = $row->srcimg;
            $src_url[]= "book-page/nomlivree=".$row->nomlivre."";
        }
        $results_number=sizeof($nomlivre);
    }
    else if(empty($req->input('livre')) && !empty($req->input('maxpage')) && !empty($req->input('minpage')) && !empty($req->input('categorie')))
    { // search with maxpage and minpage and categorie
 
       $sql=DB::table('livre')->join('auteur','auteur.Numauteur','=','livre.numauteur')->join('keyword','keyword.codelivre','=','livre.codelivre')->join('categorie','categorie.codecategorie','=','livre.codecateguori')->where('categorie.nomcategorie','like',$categorie,'%')->join('image','image.codelivre','=','livre.codelivre')->where('livre.Npages','>',$minpage)->where('livre.Npages','<',$maxpage)->orderby('livre.nomlivre',ASC)->get();
     

        //$result= mysqli_query($con,$sql);
        foreach ($sql as $row)
        {
            $nomlivre[] = $row->nomlivre;
            $srcimg[] = $row->srcimg;
            $src_url[]= "book-page/nomlivree=".$row->nomlivre."";
        }
        $results_number=sizeof($nomlivre);
    }
    else if(!empty($req->input('livre')) && !empty($req->input('maxpage')) && !empty($req->input('minpage')) && empty($req->input('categorie')))
    { 

   $sql=DB::table('livre')->join('auteur','auteur.Numauteur','=','livre.numauteur')->join('keyword','keyword.codelivre','=','livre.codelivre')->join('image','image.codelivre','=','livre.codelivre')->where('livre.nomlivre','LIKE',$livre,'%')->orwhere('auteur.nom','LIKE',$livre,'%')->orwhere('keyword.content_keyword','LIKE',$livre,'%')->where('livre.Npages','<',$maxpage)->where('livre.Npages','>',$minpage)->orderby('livre.nomlivre',ASC)->get();
            
    // search with book name and maxpage and minpage
       
    
        foreach ($sql as $row)
        {
            $nomlivre[] = $row->nomlivre;
            $srcimg[] = $row->srcimg;
            $src_url[]= "book-page/nomlivree=".$row->nomlivre."";
        }
        $results_number=sizeof($nomlivre);
    }
    else if(!empty($req->input('livre')) && !empty($req->input('maxpage')) && empty($req->input('minpage')) && empty($req->input('categorie')))
    {
       
   $sql=DB::table('livre')->join('auteur','auteur.Numauteur','=','livre.numauteur')->join('keyword','keyword.codelivre','=','livre.codelivre')->join('image','image.codelivre','=','livre.codelivre')->where('livre.nomlivre','LIKE',$livre,'%')->orwhere('auteur.nom','LIKE',$livre,'%')->orwhere('keyword.content_keyword','LIKE',$livre,'%')->where('livre.Npages','<',$maxpage)->where('livre.Npages','>',$minpage)->orderby('livre.nomlivre',ASC)->get();
        foreach ($stmt->get_result() as $row)
        {
            $nomlivre[] = $row->nomlivre;
            $srcimg[] = $row->srcimg;
            $src_url[]= "book-page/nomlivree=".$row->nomlivre."";
        }
        $results_number=sizeof($nomlivre);
    }
    else if(!empty($req->input('livre')) && !empty($req->input('minpage')) && empty($req->input('maxpage') && empty($_GET['categorie']))
    {
        // search with book name and  minpage
         $sql=DB::table('livre')->join('auteur','auteur.Numauteur','=','livre.numauteur')->join('keyword','keyword.codelivre','=','livre.codelivre')->join('image','image.codelivre','=','livre.codelivre')->where('livre.nomlivre','LIKE',$livre,'%')->orwhere('auteur.nom','LIKE',$livre,'%')->orwhere('keyword.content_keyword','LIKE',$livre,'%')->where('livre.Npages','>',$minpage)->where('livre.Npages','>',$minpage)->orderby('livre.nomlivre',ASC)->get();
        foreach ($sql as $row)
        {
            $nomlivre[] = $row->nomlivre;
            $srcimg[] = $row->srcimg;
            $src_url[]= "book-page/nomlivree=".$row->nomlivre."";
        }
        $results_number=sizeof($nomlivre);
    }
    else if(!empty($req->input('maxpage')) && !empty($req->input('minpage')) && empty($req->input('livre')) && empty($req->input('categorie')))
    {
        // search with maxpage and minpage
        $sql=DB::table('livre')->join('auteur','auteur.Numauteur','=','livre.numauteur')->join('keyword','keyword.codelivre','=','livre.codelivre')->join('image','image.codelivre','=','livre.codelivre')->where('livre.Npages','>',$minpage)->where('livre.Npages','>',$minpage)->orderby('livre.nomlivre',ASC)->get();
        foreach ($sql as $row)
        {
              $nomlivre[] = $row->nomlivre;
            $srcimg[] = $row->srcimg;
            $src_url[]= "book-page/nomlivree=".$row->nomlivre."";
        }
        $results_number=sizeof($nomlivre);
    }
    else if(empty($req->input('maxpage')) && empty($req->input('minpage')) && !empty($req->input('livre')) && !empty($req->input('categorie')))
    {
        // search with book name and categorie
          $sql=DB::table('livre')->join('auteur','auteur.Numauteur','=','livre.numauteur')->join('keyword','keyword.codelivre','=','livre.codelivre')->join('categorie','categorie.codecategorie','=','livre.codecateguori')->join('image','image.codelivre','=','livre.codelivre')->where('categorie.nomcategorie','like',$categorie,'%')->where('livre.nomlivre','LIKE',$livre,'%')->orwhere('auteur.nom','LIKE',$livre,'%')->orwhere('keyword.content_keyword','LIKE',$livre,'%')->orderby('livre.nomlivre',ASC)->get();
        foreach ($sql as $row)
        {
            $nomlivre[] = $row->nomlivre;
            $srcimg[] = $row->srcimg;
            $src_url[]= "book-page/nomlivree=".$row->nomlivre."";
        }
        $results_number=sizeof($nomlivre);
    }
    else if(!empty($req->input('maxpage')) && empty($req->input('minpage')) && empty($req->input('livre')) && !empty($req->input('categorie')))
    {

        // search with maxpage and categorie
      $sql=DB::table('livre')->join('auteur','auteur.Numauteur','=','livre.numauteur')->join('keyword','keyword.codelivre','=','livre.codelivre')->join('categorie','categorie.codecategorie','=','livre.codecateguori')->join('image','image.codelivre','=','livre.codelivre')->where('categorie.nomcategorie','like',$categorie,'%')->where('livre.Npages','<',$maxpage)->orderby('livre.nomlivre',ASC)->get();
     
        foreach ($sql as $row)
        {
              $nomlivre[] = $row->nomlivre;
            $srcimg[] = $row->srcimg;
            $src_url[]= "book-page/nomlivree=".$row->nomlivre."";
        }
        $results_number=sizeof($nomlivre);
    }
    else if(empty($req->input('maxpage')) && !empty($req->input('minpage')) && empty($req->input('livre')) && !empty($req->input('categorie')))
    {
        // search with minpage and categorie
     $sql=DB::table('livre')->join('auteur','auteur.Numauteur','=','livre.numauteur')->join('keyword','keyword.codelivre','=','livre.codelivre')->join('categorie','categorie.codecategorie','=','livre.codecateguori')->join('image','image.codelivre','=','livre.codelivre')->where('categorie.nomcategorie','like',$categorie,'%')->where('livre.Npages','>',$minpage)->orderby('livre.nomlivre',ASC)->get();
        foreach ($sql as $row)
        {  $nomlivre[] = $row->nomlivre;
            $srcimg[] = $row->srcimg;
            $src_url[]= "book-page/nomlivree=".$row->nomlivre."";
        }
        $results_number=sizeof($nomlivre);
    }
    else if(!empty($_GET['livre']) && empty($_GET['maxpage']) && empty($_GET['minpage']) && empty($_GET['categorie']))
    {
        // search with book name
       $sql=DB::table('livre')->join('auteur','auteur.Numauteur','=','livre.numauteur')->join('keyword','keyword.codelivre','=','livre.codelivre')->join('image','image.codelivre','=','livre.codelivre')->where('livre.nomlivre','LIKE',$livre,'%')->orwhere('auteur.nom','LIKE',$livre,'%')->>orderby('livre.nomlivre',ASC)->get();
        foreach ($sql as $row)
        {
            $nomlivre[] = $row->nomlivre;
            $srcimg[] = $row->srcimg;
            $src_url[]= "book-page/nomlivree=".$row->nomlivre."";
        }
        $results_number=sizeof($nomlivre);
    }
    else if( !empty($req->input('maxpage')) && empty($req->input('livre')) && empty($req->input('minpage')) && empty($req->input('categorie')))
    {
        // search with maxpage 
        $sql=DB::table('livre')->join('auteur','auteur.Numauteur','=','livre.numauteur')->join('keyword','keyword.codelivre','=','livre.codelivre')->join('image','image.codelivre','=','livre.codelivre')->where('livre.Npages','<',$maxpage)->orderby('livre.nomlivre',ASC)->get();
        foreach ($stmt->get_result() as $row)
        {
                $nomlivre[] = $row->nomlivre;
            $srcimg[] = $row->srcimg;
            $src_url[]= "book-page/nomlivree=".$row->nomlivre."";
        }
    }
    else if(!empty($req->input('minpage')) && empty($req->input('maxpage')) && empty($req->input('livre')) && empty($req->input('categorie')))
    {
        // search with minpage
     $sql=DB::table('livre')->join('auteur','auteur.Numauteur','=','livre.numauteur')->join('keyword','keyword.codelivre','=','livre.codelivre')->join('image','image.codelivre','=','livre.codelivre')->where('livre.Npages','>',$minpage)->orderby('livre.nomlivre',ASC)->get();
        foreach ($stmt->get_result() as $row)
        {
           $nomlivre[] = $row->nomlivre;
            $srcimg[] = $row->srcimg;
            $src_url[]= "book-page/nomlivree=".$row->nomlivre."";
        }
        $results_number=sizeof($nomlivre);
    }
    else if(!empty($_GET['categorie']) && empty($_GET['minpage']) && empty($_GET['maxpage']) && empty($_GET['livre']))
    {
        // search with categorie
        $sql =" SELECT* FROM  categorie,auteur,livre,image WHERE nomcategorie like '$categorie%' and image.codelivre= livre.codelivre and auteur.Numauteur=livre.numauteur and categorie.codecategorie=livre.codecateguori order by nomlivre  ASC";
        $stmt=$con->prepare($sql);
        $stmt->execute();
        foreach ($stmt->get_result() as $row)
        {
            $nomlivre[] = $row['nomlivre'];
            $srcimg[] = $row['srcimg'];
            $src_url[]= "book-page.php?nomlivree=".$row['nomlivre']."";
        }
        $results_number=sizeof($nomlivre);
    }
    else
    {
        // if the query failed for any reason we see this
        $errors['empty_inputs']= " database error ; failed to search";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\bootstrap.min.css">
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
    .results_number{
        font-size: 20px;
        transform: translateX(80px);
    }
    #show-list{
        position: absolute;
    }
</style>
<body>
    <div class="container p-2 my-3 bg-dark rounded">
        <form action="books2.php" method="GET">
            <div class="box my-2 row d-flex justify-content-center">
                <input class=" col-10" name="livre" type="search" id="search_1_box" placeholder="Search With Book Name or Author's name" autocomplete="off" aria-label="Search">
            <!-- This is the list of dropdowns , There r no dropdowns here but they'll be generated in the php code once the user search -->
            <div class="col-md-5" id="suggestions" style="position: relative;margin-top: -147x;margin-right: 510px; z-index:1">
                 <div class="list-group" id="show-list"></div>
            </div>
            </div>
            <div class="box my-2 row d-flex justify-content-center">
                <input type="number" class="col-md-2 m-1 col-5" name="maxpage"placeholder="max pages" id="max_pages">
                <input type="number" class="col-md-2 m-1 col-5" name="minpage"placeholder="mix pages" id="min_pages">
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
    </div>
    <div class="results_number"> Number of results :
    <?php echo $results_number; ?>
    </div>
    <div class="container">
    <?php if(!isset($_SESSION['test1'])): ?>
    <?php for($i=0;$i<sizeof($nomlivre);): ?>
        <div class="book-line">
            <hr>
            <div class="row">
                <?php if($i<sizeof($nomlivre)): ?>
                <div class="col my-2 col-md-3 col-sm-4 col-6">
                <a class="card" href=" <?php echo $src_url[$i]; ?> ">
                        <img src="<?php echo $srcimg[$i]; ?>" class="card-img-top">
                        <div class="card-body p-1">
                            <div class="nomlivre title-card text-danger text-center"><?php echo $nomlivre[$i]; ?></div>
                        </div>
                    </a>
                </div>
                <?php endif; ?>
                <?php $i++; ?>

                <?php if($i<sizeof($nomlivre)): ?>
                <div class="col my-2 col-md-3 col-sm-4 col-6">
                <a class="card" href=" <?php echo $src_url[$i]; ?> ">
                    <img src="<?php echo $srcimg[$i]; ?>" class="card-img-top">
                        <div class="card-body p-1">
                            <div class="nomlivre2 title-card text-danger text-center"><?php echo $nomlivre[$i]; ?></div>
                        </div>
                    </a>
                </div>
                <?php endif; ?>
                <?php $i++; ?>

                <?php if($i<sizeof($nomlivre)): ?>
                <div class="col my-2 col-md-3 col-sm-4 col-6">
                <a class="card" href=" <?php echo $src_url[$i]; ?> ">
                    <img src="<?php echo $srcimg[$i]; ?>" class="card-img-top">
                        <div class="card-body p-1">
                            <div class="nomlivre3 title-card text-danger text-center"><?php echo $nomlivre[$i]; ?></div>
                        </div>
                    </a>
                </div>
                <?php endif; ?>
                <?php $i++; ?>

                <?php if($i<sizeof($nomlivre)): ?>
                <div class="col my-2 col-md-3 col-sm-4 col-6">
                <a class="card" href=" <?php echo $src_url[$i]; ?> ">
                    <img src="<?php echo $srcimg[$i]; ?>" class="card-img-top">
                        <div class="card-body p-1">
                            <div class="nomlivre4 title-card text-danger text-center"><?php echo $nomlivre[$i]; ?></div>
                        </div>
                    </a>
                </div>
                <?php endif; ?>
                <?php $i++; ?>
            </div>
        </div>
        <?php $a=69;endfor;?>
        <?php 
        endif; 
        if(isset($_SESSION['test1']))
        {
           unset($_SESSION['test1']);
        }
        ?>
    </div>
    <!-- MY JS , JQUERY , AJAX CODe , ILYES don't fucking touch it , btw all this code ( including the list of dropdowns that i added under the search input ) is the same in books dot php  -->
    <script type="text/javascript"> 
$(document).ready(function () {
  // Send Search Text to the server
  $("#search_1_box").keyup(function () {
    let searchText = $(this).val();
    if (searchText != "") {
      $.ajax({
        url: "books",
        method: "GET",
        data: {
          query: searchText,
        },
        success: function (response) {
          $("#show-list").html(response);
        },
      });
    } else {
      $("#show-list").html("");
    }
  });
  // Set searched text in input field on click of search button
  $(document).on("click", "a", function () {
    $("#search").val($(this).text());
    $("#show-list").html("");
  });
});
 </script>  
</body>
</html>