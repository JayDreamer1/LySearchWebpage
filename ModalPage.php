<?php


  if(isset($_GET['ThesisID']) && isset($_GET['ThesisKeyW']))
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
      $kw = validate($_GET['ThesisKeyW']);
      $asd = strtok($kw, ",");
      $queryPostT = "SELECT * FROM thesistbl Where ThesisID = $id";
      $resultPostT = mysqli_query($db, $queryPostT);

      $queryPostTApp = "SELECT * FROM uploadtbl Where ResearchID = $id";
      $resultPostTApp = mysqli_query($db, $queryPostTApp);
  
      $qry = "SELECT * FROM thesistbl WHERE ThesisKeyW LIKE '%$asd%'";
      $res = mysqli_query($db,$qry);
      $rs = mysqli_fetch_assoc($res);

      $qryApp = "SELECT * FROM uploadtbl WHERE RKeyword LIKE '%$asd%'";
      $resApp = mysqli_query($db,$qryApp);
      $rsApp = mysqli_fetch_assoc($resApp);

     


      if(mysqli_num_rows($resultPostT) > 0 || mysqli_num_rows($resultPostTApp) > 0)
      {
        $rowPostT = mysqli_fetch_assoc($resultPostT);
        $rowPostTApp = mysqli_fetch_assoc($resultPostTApp);
      }


  }



?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Researches Page</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/headers/">
    
    <!--old-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="STYLES/MStyle.css" rel="stylesheet">
  <link href="ModalStyles.css" rel="stylesheet">

  <script src="https://kit.fontawesome.com/173e67fce9.js" crossorigin="anonymous"></script>

  <!--new-->
  
    <!-- Bootstrap core CSS -->
<link href="/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

 

<!--font-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+KR:wght@700&family=Montserrat&display=swap" rel="stylesheet">


</head>

<body>



<div class="hero">
        <div class="content">
        
  <div class="container">
  <div class="scroll-down"></div>    

    <header class="navigation">
      
      <a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <div class="logo">
        <span class="fs-4"> <img src="logo white.png" style="max-width: 245px;">
        </span></div>
      </a>
      

      <ul class="nav nav-pills">
        <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
        <li class="nav-item"><a href="ResearchesPage.php" class="nav-link">Researches</a></li>
        <li class="nav-item"><a href="Help.php" class="nav-link">Help</a></li>
        <li class="nav-item"><a href="Account.php" class="nav-link">Account</a></li>
      </ul>
    </header>
  </div>

  <div class="container">
              <br>
              <br>
              <br>
            <h1 class="title-top"> Researches</h1>
            <br>
      
     
    
    </div>
        </div>
</div>




<header></header>
<div class="firstBlur">
<div class="row">
  <div class="column"><div class="vl-right">

      

    <h2>Related Topics</h2>
    <?php
 if(mysqli_num_rows($resApp) > 0)
 {
    do{
      if($rsApp['ResearchID'] != $id)
      {
 
  echo "<br>"; ?> 
  <a href="ModalPage.php?ThesisID=<?=$rsApp['ResearchID']?>&ThesisKeyW=<?=$rsApp['RKeyword']?>"> <?= $rsApp['RTitle'] ?></a>
  <?php
  echo "<br>";
      }
      }
 while($rsApp = mysqli_fetch_assoc($resApp));
}
  ?> 
 
    <?php
if(mysqli_num_rows($res) > 0)
 { 
    do{
      if($rs['ThesisID'] != $id)
      {
  echo "<br>";?> 
  <a href="ModalPage.php?ThesisID=<?=$rs['ThesisID']?>&ThesisKeyW=<?=$rs['ThesisKeyW']?>"> <?= $rs['ThesisTitle'] ?></a>
  <?php
  echo "<br>";
      }
      }
 while($rs = mysqli_fetch_assoc($res));

 }
    ?>
    </div>
  </div>


  

 <!-- TEST 1 -->

 <?php if(mysqli_num_rows($resultPostT) > 0)
 {
 ?>

    <div class="column-center">
      
        <div class="title" style="color: black;"> <h1><?=$rowPostT['ThesisTitle']?></h1></div><BR>
            <div class="text-center">  <h6><?=$rowPostT['ThesisAuthor']?></h6></div>
               <div class="content">
                  
                  <p> &nbsp; &nbsp; &nbsp; <?=$rowPostT['ThesisAbstract']?> </p>
            
            
               </div>
            
               <div class="keywords"> <p><B>Keywords:</B>	<?=$rowPostT['ThesisKeyW']?> </p></div>
              
              </div>

  <?php
 }
 ?>
 <?php
    if(mysqli_num_rows($resultPostTApp) > 0){
     ?> 
      <div class="column-center">
      
        <div class="title"> <h1><?=$rowPostTApp['RTitle']?></h1></div><BR>
            <div class="text-center">  <h6><?=$rowPostTApp['RAuthor']?></h6></div>
               <div class="content">
                  
                  <p> &nbsp; &nbsp; &nbsp; <?=$rowPostTApp['RAbstract']?> </p>
            
            
               </div>
            
               <div class="keywords"> <p><B>Keywords:</B> <?=$rowPostTApp['RKeyword']?> </p></div>
              
              </div>
<?php    }
 ?>


  
  
    
    
    <div class="column" >
    <div class="vl"><center>
    <h2 style="text-align: center;" >Viewable Document</h2>
 <?php if(mysqli_num_rows($resultPostT) > 0)
 {
 ?>    
    <p><a href="ViewFiles.php?View=<?=$rowPostT['ThesisID']?>"><?=$rowPostT['ThesisFile']?></a></p>
   <?php
 }
 ?>
 <?php  if(mysqli_num_rows($resultPostTApp) > 0){
     ?> 
     <p><a href="ViewFiles.php?View=<?=$rowPostTApp['ResearchID']?>"><?=$rowPostTApp['Rfile']?></a></p>
  <?php    }
 ?>   
  </div></div>
</div>
</div>


  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" data-backdrop="true" data-keyboard="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title" id="exampleModalLongTitle">Terms and Conditions of Use</h1>
    
          </div>
          <div class="modal-body">
            <p>By using this website, you certify that you have read and reviewed this Agreement and that you
                agree to comply with its terms. If you do not want to be bound by the terms of this Agreement,
                you are advised to leave the website accordingly. <b>LySearch</b> only grants use and access of this
                website, its products, and its services to those who have accepted its terms.</p>

            <input type="checkbox" id="myCheck" name="test" onchange="isChecked(this, 'checkboxers')">  <p><b> I Agree to the Terms and Conditions<b></p> 
  
          </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-success" id="checkboxers" disabled="disabled" data-dismiss="modal">Agree</button>
        </div>
      </div>
    </div>
  </div>
  



  <script>
function myFunction() {
  var x = document.getElementById("myCheck").required;
  document.getElementById("demo").innerHTML = x;
}

</script>
 
  






  <script>
    $(document).ready(function() {
    $("#exampleModalLong").modal('show');
    });
    $('submit').click(function() {
    $('#exampleModalLong').modal('hide');
});

  </script>
<script>
  $('#exampleModalLong').modal({backdrop: 'static' , keyboard: false})  
  M.modal.init(box,{
    opacity: 1
  });
  </script>


<script>
(function(){
   //Show Modal
  $('#exampleModalLong').on('show.bs.modal', function (e) {
    console.log('show');
    $('.firstBlur').addClass('modalBlur');
  })
  
  //Remove modal
  $('#exampleModalLong').on('hide.bs.modal', function (e) {
     console.log('hide');
    $('.firstBlur').removeClass('modalBlur');
  })
})();

</script>

<script type="text/javascript">
function isChecked(checkbox, checkboxers) {
    document.getElementById(checkboxers).disabled = !checkbox.checked;
}
</script>


<script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>
