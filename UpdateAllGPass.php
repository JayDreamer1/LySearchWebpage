<?php

include ('process.php');



?>



<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/173e67fce9.js" crossorigin="anonymous"></script>


    <title>Update Given Password</title>
  </head>
  <body style="background-color: maroon;">
<br>
<br>
<br>
<br>
<br>
<br>
<div class="card container-fluid text-center" style="width: 25rem;">
  <div class="card-body">
    <a href="accounts.php" style="float:left; text-decoration: none; color: black;"> <i class="fas fa-chevron-left"></i> Back</a>

    <button class="btn btn-primary rounded" style="float:right; text-decoration: none; color: white;" onclick="UpdateInfoAlert();"> <i class="fas fa-info"></i> </button>
    <br>
    <br>
    <h2 class="card-title ">Update Passwords</h2>
<form action="UpdateAllGPass.php" method="post">
<br>
<?php include ('errors.php'); ?>
<input type="password" class="form-control mb-3" name="GivenPass" placeholder="Given Password" required>
<input type="password" class="form-control mb-3" name="NewDPass" placeholder="New Default Password" required> 
<input type="password" class="form-control mb-3" name="RNewDPass" placeholder="Re-enter Default Password" required>  
<br>
<button class="btn btn-success rounded" name="UpdateGPass" style="float: right;"> Update </button>  

</form>
 </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>

    <script>
  function UpdateInfoAlert() {
  alert("The given password should be updated monthly for security purposes.");
}
</script>


  </body>
</html>