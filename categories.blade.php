<?php

$codecategorie=array();
$nomcategorie=array();
$discriptioncategorie=array();


foreach($categories as $categorie)
{
    $codecategorie[] = $categorie->codecategorie; 
    $nomcategorie[] = $categorie->nomcategorie;  
    $discriptioncategorie[] = $categorie->discriptioncategorie;    
}

?>
   
   
   
   
   
   @extends('layouts.deashboard');
   @Section('content');
   
   <style>
        form{
                transform: translate(350px,50px);
            }
        #add_categorie{
                transform: translateX(55px);
            }
            #modify_it{
                transform: translateX(35px);
            }
    </style>
 
   <div class="col-lg-9 col-11 row container-fluid bg-light mx-0 content p-0">
            <h2 class="text-white text-center d-lg-none d-block p-2 col-12" style="background-color:#212529;">Categorie</h2>
            <form method="get" action = "/add_category">
               <h3>Add a Category</h3><br>
               <input type="text" name="category" placeholder="Category">
               <p style="color:red;"> <?php if(isset($add_categ_err)) echo $add_categ_err; ?></p>
               <br><br>
               <input id="add_categorie" class="btn btn-Info" type="submit" value="Add">
               <br><br>
            </form>   
            <div class="all_comments p-3 col-12">
              <?php for($i=0;$i<sizeof($codecategorie);$i++):?>
                <div class="col-12 comment-box my-2 mx-auto bg-white p-0">
                    <h4 class="col-12 p-2 bg-dark text-white"> <?php echo $nomcategorie[$i]; ?> </h4>
                    <div class="info m-2">
                        <span class="the_name font-weight-bold text-primary"> <?php echo $codecategorie[$i]; ?> </span>
                    </div>
                    <hr>
                    <div class="text m-2">
                    <?php echo $discriptioncategorie[$i]; ?>
                    </div>
                    <hr>
                    <a href=" {{ 'delete_category/'.$codecategorie[$i] }} " > <button class="btn btn-danger mx-2 mb-3">Delete</button> </a>
                  <form method="get" action = "/modify_category">
                  <h3 id="modify_it">Modify it</h3><br>
                  <input type="hidden" name="ex_category_name" value="<?php echo $nomcategorie[$i]; ?> ">
                  <input type="text" id="fname" name="category_modify" placeholder="Category">
                  <p style="color:red;"> <?php if(isset($modify_categ_err) && isset($ex_category_name) && $ex_category_name==$nomcategorie[$i]) echo $modify_categ_err; ?></p>
                  <br><br>
                  <input id="add_categorie" class="btn btn-Info" type="submit" value="Modify">
                  <br><br><br>
                  </form>   
                </div>
              <?php endfor; ?>
            </div>
    </div>
          @endsection
          <script type="text/javascript">
    function showForm() {
        document.getElementById('formElement').style.display = 'block';
    }
</script>