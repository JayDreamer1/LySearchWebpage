<?php


  if(isset($_GET['CVID']))
  {
      include('process.php');

      function validate($data)
      {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

      $id = validate($_GET['CVID']);
      $queryViewPDF = "SELECT * FROM colloquiumtbl Where CID = $id";
      $resultViewPDF = mysqli_query($db, $queryViewPDF);

      if(mysqli_num_rows($resultViewPDF) > 0)
      {
        $rowView = mysqli_fetch_assoc($resultViewPDF);
      }


  }

?>

<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">



    <script src="https://kit.fontawesome.com/173e67fce9.js" crossorigin="anonymous"></script>

    <title>View File</title>
    <style type="text/css">
     .embed-cover {
        position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  
  /* Just for demonstration, remove this part */


  max-width: 760px;
max-height: 800px;
}

.box{
  width: 900px;
  height: 900px;
  padding: 20px;
  margin: 100px auto;

  background-color: white;

}

.wrapper {
  position: relative;
  overflow: hidden;
}

.wrapper {
  position: relative;
  overflow: hidden;
}
    </style>

  </head>
  <body style="background-color: maroon;">
    <br>
<a href="index.php" style="text-decoration: none; color: White;"> &nbsp;  &nbsp; &nbsp;<i class="fas fa-chevron-left"></i> Back to Home Page</a>
    <br>
    <br>
    <div class="box">
    <div class="content-fluid text-center wrapper">
    <embed src="ColloquiumUploads/<?= $rowView['CFile']?>#toolbar=0" width="800px" height="800px" style="position: relative;">
      <div class="embed-cover"></div>
    </div>
    </div>
    <br>
    <br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>