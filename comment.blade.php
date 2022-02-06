<?php

$user_name=array();
$contenucommentaire=array();
$rented_book=array();
$date_ajout_commentaire=array();
$idcomment=array();
$title=array();
$src_img=array();
$date=array();
foreach($comments as $comment)
{
    $user_name[] = $comment->login_client; 
    $contenucommentaire[] = $comment->contenucommentaire;  
    $commented_book[] = $comment->nomlivre;  
    $date_ajout_commentaire[] = $comment->date_ajout_commentaire;  
    $idcomment[] = $comment->idcomment;   
}

?>
   
   
   
   
   
   @extends('layouts.deashboard');
   @Section('content');
 
        
        <div class="col-lg-9 col-11 row container-fluid bg-light mx-0 content p-0">
            <h2 class="text-white text-center d-lg-none d-block p-2 col-12" style="background-color:#212529;">All Comments</h2>
            <div class="all_comments p-3 col-12">
              <?php for($i=0;$i<sizeof($user_name);$i++):?>
                <div class="col-12 comment-box my-2 mx-auto bg-white p-0">
                    <h4 class="col-12 p-2 bg-dark text-white"> <?php echo $commented_book[$i]; ?> </h4>
                    <div class="info m-2">
                        <span class="the_name font-weight-bold text-primary"> <?php echo $user_name[$i]; ?> </span>
                        <span class="the_date" style="float: right;"> <?php echo $date_ajout_commentaire[$i]; ?> </span>
                    </div>
                    <hr>
                    <div class="text m-2">
                    <?php echo $contenucommentaire[$i]; ?>
                    </div>
                    <hr>
                    <a href="{{ 'delete_comment/'.$idcomment[$i] }} " > <button class="btn btn-danger mx-2 mb-3">Delete</button> </a>
                </div>
              <?php endfor; ?>
            </div>
        </div>
          @endsection