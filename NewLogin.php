<?php

include ('process.php');




?>



<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="Style.css" rel="stylesheet">

    <title>Login Form</title>
  </head>
  <body>
<br>
<br>
<br>


  

<div class="text-center">
    <img src="IconSample.png" class="icon" style="width:150px; background-color:white; border-radius: 100px; padding: 10px; position: relative; top: 60px; z-index: 1; border-style: solid; border-width: 10px;">
  </div>

<div class="card container-fluid text-center" style="width: 25rem;">

<br><br>



  <div class="card-body">
    <h2 class="card-title ">Sign-In</h2>
<form action="NewLogin.php" method="post">

<?php include ('errors.php'); ?>
<br>

<input type="email" class="form-control mb-3" name="LogEmailAdd" placeholder="Email Address(name@lpunetwork.edu.ph)" > 
<input type="password" class="form-control mb-3" name="LogPass" placeholder="Password" > 
<br>
<button class="btn btn-success rounded" name="LoginBtn" style="float: right;"> Login </button> 
<button class="btn btn-secondary rounded" type="Reset"class="rounded mx-2" style="float: right; margin-right:5px ;"> Clear </button>  

</form>
 </div>
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>

  </body>
</html>