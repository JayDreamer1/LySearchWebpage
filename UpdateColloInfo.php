<?php 



    if(isset($_GET['ColloID']))
  {
      include('process.php');

      function validate($data)
      {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

      $id = validate($_GET['ColloID']);
      $queryupdateCol = "SELECT * FROM colloquiumtbl Where CID = $id";
      $resultColUp = mysqli_query($db, $queryupdateCol);

      if(mysqli_num_rows($resultColUp) > 0)
      {
        $rowcol = mysqli_fetch_assoc($resultColUp);
      }
  }
    else if(isset($_POST['BtnUpdateCol'])){
        include('process.php');

        function validate($data)
      {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

      $id = validate($_POST['CollID']);
      $Utc = validate($_POST['CollTitle']);
      $Uac = validate($_POST['CollAuth']);
      $Uabc = validate($_POST['CollAbs']);
      $Ukwc = validate($_POST['CollKeyw']);
      $Uyrc = validate($_POST['CollYr']);

      

      if(count($errors) == 0)
      {
        $queryupdateCollo = "UPDATE colloquiumtbl SET CTitle = '$Utc', CAuthor = '$Uac', CAbstract = '$Uabc', CKeyword = '$Ukwc', CYear ='$Uyrc' WHERE CID = $id";
        $editresult = mysqli_query($db, $queryupdateCollo);
        if($editresult)
        {
                header('location: Colloquium.php');
        }
      }

  }
  else{

  }

?>

<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/173e67fce9.js" crossorigin="anonymous"></script>


    <title>Update Colloquium Info</title>
  </head>
  <body style="background-color: maroon;">
<br>
<br>
<br>

<div class="card container-fluid text-center" style="width: 30rem;">
  <div class="card-body">
    <a href="Colloquium.php" style="float:left; text-decoration: none; color: black;"> <i class="fas fa-chevron-left"></i> Back</a>
    <br>
    <br>
    <h2 class="card-title ">Edit Information</h2>
    <form action="UpdateColloInfo.php" method="post">
<br>

<input type="text" class="form-control mb-3" name="CollID" value="<?php echo $rowcol['CID'] ?>" hidden>

<textarea class="form-control mb-3" name="CollTitle"><?php echo $rowcol['CTitle'] ?></textarea>

<textarea class="form-control mb-3" name="CollAuth"><?php echo $rowcol['CAuthor'] ?></textarea>

<textarea class="form-control mb-3" name="CollAbs"><?php echo $rowcol['CAbstract'] ?></textarea>

<textarea class="form-control mb-3" name="CollKeyw"><?php echo $rowcol['CKeyword'] ?></textarea>

<input type="text" class="form-control mb-3" name="CollYr" value="<?php echo $rowcol['CYear'] ?>">



 
<button class="btn btn-success rounded" name="BtnUpdateCol" style="float: right;"> Edit </button> 
</form>




 </div>
</div>

<br>
    <br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>

  </body>
</html>