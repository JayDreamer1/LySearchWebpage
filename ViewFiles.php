<?php


  if(isset($_GET['View']))
  {
      include('process.php');

      function validate($data)
      {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

      $id = validate($_GET['View']);
      $queryViewPDF = "SELECT * FROM thesistbl Where ThesisID = $id";
      $resultViewPDF = mysqli_query($db, $queryViewPDF);

      $queryViewPDFApp = "SELECT * FROM uploadtbl Where ResearchID = $id";
      $resultViewPDFApp = mysqli_query($db, $queryViewPDFApp);

      if(mysqli_num_rows($resultViewPDF) > 0 || mysqli_num_rows($resultViewPDFApp) > 0)
      {
        $rowView = mysqli_fetch_assoc($resultViewPDF);
        $rowViewApp = mysqli_fetch_assoc($resultViewPDFApp);
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
    </style>

  </head>
  <body style="background-color: maroon;">
    <br>
    
<a href="ResearchesPage.php" style="text-decoration: none; color: White;"> &nbsp;  &nbsp; &nbsp;<i class="fas fa-chevron-left"></i> Back to Researches</a>
    <br>
    <br><div class="box">
 <?php if(mysqli_num_rows($resultViewPDF) > 0)
 {
 ?>    
    <div class="content-fluid text-center wrapper">    
    <embed src="ThesisUploads/<?= $rowView['ThesisFile']?>#toolbar=0" width="800px" height="800px" style="position: relative;">
      <div class="embed-cover"></div>
    </div>
  
   <?php
 }
 ?>
 <?php  if(mysqli_num_rows($resultViewPDFApp) > 0){
     ?> 
     <div class="content-fluid text-center wrapper">    
    <embed src="uploads/<?= $rowViewApp['Rfile']?>#toolbar=0" width="800px" height="800px" style="position: relative;">
      <div class="embed-cover"></div>
    </div>
    </div>
  <?php    }
 ?>  

    <br>
    <br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script type="text/javascript" src="jquery-1.6.2.js"></script>
<script type="text/javascript">
$(function() {
     $(this).bind("contextmenu", function(e) {
         e.preventDefault();
     });
}); 
</script>
  </body>
</html>