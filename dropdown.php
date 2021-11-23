
<?php 


  if(isset($_GET['RID']))
  {
      include ('process.php'); 

      function validate($data)
      {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

      $id = validate($_GET['RID']);
      $queryupdateup = "SELECT * FROM uploadtbl Where ResearchID = $id";
      $resultUp = mysqli_query($db, $queryupdateup);

      if(mysqli_num_rows($resultUp) > 0)
      {
        $rowups = mysqli_fetch_assoc($resultUp);
      }
  }
  else if(isset($_POST['okupdate'])){

    include ('process.php');
        function validate($data)
      {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

 
      $stats = validate($_POST['StatusUp']);
      $id = validate($_POST['idsearch']);



        $queryupdateupload = "UPDATE uploadtbl SET Status = '$stats' Where ResearchID = $id";
        $updateresult = mysqli_query($db, $queryupdateupload);
        if($updateresult)
        {
                header('location: AdminPage.php');
        }

  }
  else{

  }

?>

<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


      <script src="https://kit.fontawesome.com/173e67fce9.js" crossorigin="anonymous"></script>

    <title>STATUS UPDATE</title>
  </head>
<body>
    <br>
<div class="card container-fluid text-center" style="width: 50rem;">
  <div class="card-body">
    <h5 class="card-title">Update Status</h5>
<form action="dropdown.php" method="post" id="formupdate">
 <input type="text" class="form-control mb-3" name="idsearch" placeholder="<?=$rowups['RTitle']?>" disabled>
 <label class="text-dark">Input ID number</label>
 <input type="text" class="form-control mb-3" name="idsearch" placeholder="<?=$rowups['ResearchID']?>" required>
 <select name="StatusUp" class="rounded">
              <option value="Pending">Pending</option>
              <option value="Approved">Approve</option>
              <option value="Disapproved">Disapprove</option>
</select>

<button class="btn-success rounded" name="okupdate">Update</button> <br>
<br>
<a href="AdminPage.php"> View </a>
</form>
 </div>
</div>
</body>
</html>