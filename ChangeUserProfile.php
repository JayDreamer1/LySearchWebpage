<?php 



    if(isset($_GET['ChangeDPID']))
  {
      include('process.php');

      function validate($data)
      {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

      $id = validate($_GET['ChangeDPID']);
      $queryUpdateDP = "SELECT * FROM accountstbl Where AccountID = $id";
      $resultUpDP = mysqli_query($db, $queryUpdateDP);

      if(mysqli_num_rows($resultUpDP) > 0)
      {
        $rowthes = mysqli_fetch_assoc($resultUpDP);
      }
  }
  else if(isset($_POST['Btn-ChangeDP'])){
        include('process.php');

        function validate($data)
      {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

      $id = validate($_POST['AccID']);
      $file = $_FILES['AccProfile']['name'];
       $file_loc = $_FILES['AccProfile']['tmp_name'];
       $file_size = $_FILES['AccProfile']['size'];
       $file_type = $_FILES['AccProfile']['type'];
       $folder="profilepics/";

  // make file name in lower case
 $new_file_name = strtolower($file);
 // make file name in lower case
 
 $final_fileup=str_replace(' ','-',$new_file_name);
  

      

      if(count($errors) == 0 && move_uploaded_file($file_loc,$folder.$final_fileup))
      {
        $queryUpdateUserDP = "UPDATE accountstbl SET AccountProfilePic = '$final_fileup' WHERE AccountID = $id";
        $UserDPresult = mysqli_query($db, $queryUpdateUserDP);
        if($UserDPresult)
        {
                header('location: Account.php');
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


    <title>Upload File Page</title>
  </head>
  <body style="background-color: maroon;">
<br>
<br>
<br>

<div class="card container-fluid text-center" style="width: 30rem;">
  <div class="card-body">
    <a href="Account.php" style="float:left; text-decoration: none; color: black;"> <i class="fas fa-chevron-left"></i> Back</a>
    <br>
    <br>
    <h2 class="card-title ">Change Profile Picture</h2>
    <form action="ChangeUserProfile.php" method="post" enctype="multipart/form-data">
<br>

<input type="text" class="form-control mb-3" name="AccID" value="<?php echo $rowthes['AccountID'] ?>" hidden>

<input type="text" class="form-control mb-3" name="AccEmail" value="Email Address: <?php echo $rowthes['AccountEmail'] ?>" disabled>

<input type="text" class="form-control mb-3" name="AccName" value="Account Name: <?php echo $rowthes['AccountName'] ?>" disabled>

<input type="file" class="form-control mb-3" name="AccProfile" accept="image/jpeg">






 
<button class="btn btn-success rounded" name="Btn-ChangeDP" style="float: right;"> Change Profile Picture </button> 
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