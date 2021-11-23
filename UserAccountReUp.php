<?php 



    if(isset($_GET['UserID']))
  {
      include('process.php');

      function validate($data)
      {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

      $id = validate($_GET['UserID']);
      $queryReUpFile = "SELECT * FROM uploadtbl Where ResearchID = $id";
      $resultReUpFile = mysqli_query($db, $queryReUpFile);

      if(mysqli_num_rows($resultReUpFile) > 0)
      {
        $rowreup = mysqli_fetch_assoc($resultReUpFile);
      }
  }
  else if(isset($_POST['ReUpFiles'])){
        include('process.php');

        function validate($data)
      {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

      $id = validate($_POST['ReUpID']);
      $stats = validate($_POST['ReUpStats']);
       $file = $_FILES['FileReUp']['name'];
       $file_loc = $_FILES['FileReUp']['tmp_name'];
       $file_size = $_FILES['FileReUp']['size'];
       $file_type = $_FILES['FileReUp']['type'];
       $folder="uploads/";

  // make file name in lower case
 $new_file_name = strtolower($file);
 // make file name in lower case
 
 $final_fileup=str_replace(' ','-',$new_file_name);
    

       if(count($errors) == 0 && move_uploaded_file($file_loc,$folder.$final_fileup))
  {
    $queryReUpload = "UPDATE uploadtbl SET Rfile = '$final_fileup', Status = '$stats' WHERE ResearchID = '$id'";
    $resultReUpload = mysqli_query($db,$queryReUpload);

    header('location:Account.php');
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


    <title>User ReUpload</title>
  </head>
  <body style="background-color: maroon;">
<br>
<br>
<br>

<div class="card container-fluid text-center" style="width: 30rem;">
  <div class="card-body">
    <a href="Account.php" style="float:left; text-decoration: none; color: black;"> <i class="fas fa-chevron-left"></i> Back</a>

    <button class="btn btn-primary rounded" style="float:right; text-decoration: none; color: white;" onclick="FileUpload();"> <i class="fas fa-info"></i> </button>
    <br>
    <br>
    <h2 class="card-title ">Re-upload File</h2>
    <form action="UserAccountReUp.php" method="post" enctype="multipart/form-data">
<br>

<input type="text" class="form-control mb-3" name="ReUpID" value="<?php echo $rowreup['ResearchID'] ?>" hidden>

<input type="text" class="form-control mb-3" name="ReUpFile" value="<?php echo $rowreup['Rfile'] ?>" disabled>

<input type="text" class="form-control mb-3" name="ReUpStats" value="Re-submit" hidden>

<input type="file" class="form-control mb-3" accept="application/pdf" title="Only PDF File" name="FileReUp" required>

 
<button class="btn btn-success rounded" name="ReUpFiles" style="float: right;"> Upload </button> 
</form>




 </div>
</div>

<br>
    <br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>

    <script>
  function FileUpload() {
  alert("(If you're uploading a same file as you want to be replaced)\nPlease at least change the file name before re-uploading.");
}
</script>

  </body>
</html>