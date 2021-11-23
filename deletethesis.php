<?php 



    if(isset($_GET['ThesisID']))
  {
      include('process.php');

      function validate($data)
      {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

      $id = validate($_GET['ThesisID']);
      $querydeleteThes = "SELECT * FROM thesistbl Where ThesisID = $id";
      $resultThesDel= mysqli_query($db, $querydeleteThes);

      if(mysqli_num_rows($resultThesDel) > 0)
      {
        $rowthes = mysqli_fetch_assoc($resultThesDel);
      }
  }
  else if(isset($_POST['BtnDeleteThesis'])){
        include('process.php');

        function validate($data)
      {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

        $UserID = validate($_POST['ThesID']);
      
      if(count($errors) == 0)
      {
        $queryDelThe = "DELETE FROM thesistbl WHERE ThesisID = '$UserID'";
        $resultDelThe= mysqli_query($db, $queryDelThe);
        if($resultDelThe)
        {
                header('location: Thesis.php');
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


    <title>Delete Thesis</title>
  </head>
  <body style="background-color: maroon;">
<br>
<br>
<br>

<div class="card container-fluid text-center" style="width: 30rem;">
  <div class="card-body">
    <a href="Thesis.php" style="float:left; text-decoration: none; color: black;"> <i class="fas fa-chevron-left"></i> Back</a>
    <br>
    <br>
    <h2 class="card-title ">Delete Thesis</h2>
    <form action="deletethesis.php" method="post">
<br>




<input type="text" class="form-control mb-3" name="ThesID" value="<?php echo $rowthes['ThesisID'] ?>">

<input type="text" class="form-control mb-3" name="ThesTitle" value="<?php echo $rowthes['ThesisTitle'] ?>" disabled>




 
<button class="btn btn-danger rounded" name="BtnDeleteThesis" style="float: right;"> Delete </button> 
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