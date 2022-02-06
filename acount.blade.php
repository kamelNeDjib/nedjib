<?php 

$codelivre=array();
$nomlivre=array();
$book_version_number=array();
$nombre_quantite_disponible=array();
$Rating=array();
$louer_livre=array();
$client=array();
$user_id=array();
$user_name=array();
$total_book_rented=array();
$admin_login=array();
$gest_login=array();
$admin_login_not_specified=array();
$gest_login_not_specified=array();
$admin_id=array();
$gest_id=array();
foreach($clients as $clientt)
{
    $user_id[] = $clientt->idclient; 
    $user_name[] = $clientt->login_client; 
    $total_book_rented[] = $clientt->rented_books;  
}
foreach($admin as $adm)
{
    $admin_login_not_specified[] = $adm->loginadmin; 
    $admin_login[] = $adm->loginadmin." ( admin )"; 
    $admin_id[] = $adm->idadmin; 
}
foreach($gest as $ges)
{
    $gest_login_not_specified[] = $ges->login_gest;
    $gest_login[] = $ges->login_gest." ( manager )";
    $gest_id[] = $ges->id_gest; 
}


?>


<style>
        .form{
                transform: translate(200px,50px);
            }
        .form2{
                transform: translate(400px,50px);
            }
        #modify_user{
                transform: translate(55px);
            }
            
            #clients{
                transform: translate(70px);
            }
    </style>

@extends('layouts.deashboard');
   @Section('content');
   
   <div class="col-lg-9 col-11 row container-fluid bg-light mx-0 content p-0">
                <h2 class="text-white text-center d-lg-none d-block p-2 col-12" style="background-color:#212529;">Accounts</h2>

       <div class="col-12  d-flex justify-content-center ">
       <button id="print"class="btn btn-danger "  onclick="window.print()">Print</button>
        </div>
            <form method="post" action = "/add_user" class="form">
            {{ csrf_field() }}
               <h3>Add a user</h3><br>
               <input type="text" name="username" placeholder="user name">
               <p style="color:red;"> <?php if(isset($username_err)) echo $username_err; ?></p>
               <input type="email" name="email" placeholder="email">
               <p style="color:red;"> <?php if(isset($email_err)) echo $email_err; ?></p>
               <input type="password" name="password" placeholder="password">
               <p style="color:red;"> <?php if(isset($password_err)) echo $password_err; ?></p>
               <input type="password" name="cpassword" placeholder="confirm password">
               <p style="color:red;"> <?php if(isset($cpassword_err)) echo $cpassword_err; ?></p>
               is admin ? <input type="checkbox" name="isadmin">
               <br>
               <p style="color:red;"> <?php if(isset($password_not_matched_err)) echo $password_not_matched_err; ?></p>
               <p style="color:red;"> <?php if(isset($username_exists)) echo $username_exists; ?></p>
               <p style="color:red;"> <?php if(isset($email_exists)) echo $email_exists; ?></p>
               <br><br>
               <center> <input id="add_user" class="btn btn-Info" type="submit" value="Add"></center>
               <br><br>
            </form>   
            
            <form method="post" action = "/modify_user" class="form2">
            {{ csrf_field() }}
               <h3>Modify a user</h3><br>
                 <select id="cars" name="user_selection">
                 <?php for($i=0;$i<sizeof($admin_login_not_specified);$i++):?>
                   <option value="<?php echo $admin_login_not_specified[$i]; ?>" name="user_select_option"> <?php echo $admin_login_not_specified[$i]; ?> </option>
                 <?php endfor; ?>
                 <?php for($i=0;$i<sizeof($gest_login_not_specified);$i++):?>
                   <option value="<?php echo $gest_login_not_specified[$i]; ?>" name="user_select_option"> <?php echo $gest_login_not_specified[$i]; ?> </option>
                 <?php endfor; ?>
                 </select>
                 <br><br>
               <input type="text" name="username" placeholder="new user name">
               <p style="color:red;"> <?php if(isset($username_err2)) echo $username_err2; ?></p>
               <input type="email" name="email" placeholder="new email">
               <p style="color:red;"> <?php if(isset($email_err2)) echo $email_err2; ?></p>
               <input type="password" name="lastpassword" placeholder="last password"><br><br>
               <p style="color:red;"> <?php if(isset($lastpassword_err)) echo $lastpassword_err; ?></p>
               <input type="password" name="password" placeholder="new password">
               <p style="color:red;"> <?php if(isset($password_err2)) echo $password_err2; ?></p>
               <input type="password" name="cpassword" placeholder="confirm new password">
               <br><br>
               <p style="color:red;"> <?php if(isset($cpassword_err2)) echo $cpassword_err2; ?></p>
               <p style="color:red;"> <?php if(isset($password_not_matched_err2)) echo $password_not_matched_err2; ?></p>
               <p style="color:red;"> <?php if(isset($username_exists2)) echo $username_exists2; ?></p>
               <p style="color:red;"> <?php if(isset($email_exists2)) echo $email_exists2; ?></p>
               
               <input id="modify_user" class="btn btn-Info" type="submit" value="Modify">
               <br><br><br><br>
            </form>   

            
            <div class="col-12 info-box mx-auto d-flex justify-content-center p-3">
                <table border="2 white" width="100%">
                    <thead class="bg-primary text-white">
                        <tr>
                            <td class="text-center" width="10%">
                                id
                            </td>
                            <td class="text-center" width="40%">
                                Usename
                            </td>
                            <td class="text-center" width="10%">
                                Remove The account
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php for($i=0;$i<sizeof($admin_login);$i++):?>
                        <tr>
                            <td class="text-center p-1"> <?php echo $admin_id[$i]; ?> </td>
                            <td class="text-center p-1"> <?php echo $admin_login[$i]; ?> </td>
                        </tr>
                    <?php endfor; ?>
                    <?php for($i=0;$i<sizeof($gest_login);$i++):?>
                        <tr>
                            <td class="text-center p-1"> <?php echo $gest_id[$i]; ?> </td>
                            <td class="text-center p-1"> <?php echo $gest_login[$i]; ?> </td>
                            <td class="text-center p-1"><a href= "{{ 'delete_gest/'.$gest_id[$i] }}" ><button class="btn btn-danger">Delete</button></a></td>
                        </tr>
                    <?php endfor; ?>
                    </tbody>
                </table>
            </div>
            <div class="col-12 info-box mx-auto d-flex justify-content-center p-3">
                <table border="2 white" width="100%">
                    <thead class="bg-primary text-white">
                        <tr>
                            <td class="text-center" width="10%">
                                Barcode
                            </td>
                            <td class="text-center" width="40%">
                                Client name
                            </td>
                            <td class="text-center" width="10%">
                                Total Books Rented
                            </td>
                            <td class="text-center" width="10%">
                                Remove The account
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php for($i=0;$i<sizeof($user_name);$i++):?>
                        <tr>
                            <td class="text-center p-1"> <?php echo DNS1D::getBarcodeHTML($user_id[$i],'CODABAR'); echo $user_id[$i]; ?> </td>
                            <td class="text-center p-1"> <?php echo $user_name[$i]; ?> </td>
                            <td class="text-center p-1"> <?php echo $total_book_rented[$i]; ?> </td>
                            <td class="text-center p-1"><a href="{{ 'delete_account/'.$user_id[$i] }}" ><button class="btn btn-danger">Delete</button></a></td>
                        </tr>
                    <?php endfor; ?>
                    </tbody>
                </table>
            </div>
        </div>
    @endsection