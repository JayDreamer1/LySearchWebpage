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


    <title>Upload New Thesis</title>
  </head>
  <body style="background-color: maroon;">
<br>
<br>

<div class="card container-fluid text-center" style="width: 30rem;">
  <div class="card-body">
    <a href="Thesis.php" style="float:left; text-decoration: none; color: black;"> <i class="fas fa-chevron-left"></i> Back</a>
    <br>
    <br>
    <h2 class="card-title ">Upload New Thesis</h2>
<form action="UploadThesis.php" method="post" enctype="multipart/form-data">
<br>
<?php include ('errors.php'); ?>
<textarea class="form-control mb-3" name="ThesisNT" placeholder="Title"></textarea>
<textarea class="form-control mb-3" name="ThesisNAu" placeholder="Author/s"></textarea> 
<textarea class="form-control mb-3" name="ThesisNAb" placeholder="Abstract"></textarea> 
<input type="text" class="form-control mb-3" name="ThesisNKw" placeholder="Keyword/s">
<input type="text" class="form-control mb-3" name="ThesisNYr" placeholder="Year"> 

<input type="file"  class="form-control mb-3" name="file" accept="application/pdf" title="Only PDF File">
 
<br>
<button class="btn btn-success rounded" name="btn-upload-thesis" style="float: right;"> Upload </button>  

</form>
 </div>
</div>

<br><br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>

  </body>
</html>