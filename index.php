<?php

include('process.php');

$queryGetColloUploads = "SELECT * FROM colloquiumtbl";
$resultColUploads = mysqli_query($db,$queryGetColloUploads);



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>LySearch</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="IndexStyles.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!---->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

 




    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;900&display=swap" rel="stylesheet">
</head>
<body>
    
    <div class="hero">
	<div class="header">
     <div class="navbar">
         <div class="logo">
             <a href="#"><img src="images/logo white.png"></a>
         </div>
         <div class="menu">
            <ul class="nav">
                <li class="nav-item"><a href="index.php" class="nav-link active" style="color: black;" >Home</a></li>
                <li class="nav-item"><a href="ResearchesPage.php" class="nav-link">Researches</a></li>
                <li class="nav-item"><a href="Help.php" class="nav-link">Help</a></li>
                <li class="nav-item"><a href="Account.php" class="nav-link" >Account</a></li>
             </ul>
             
         </div>
         
     </div>
  
    </div>   
    
     <div class="banner">
         <div class="app-text">
             <h1>LySearch</h1>
             <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.</p>
<div class="blob">
    <img src="images/bg-16.png">
</div>
             <div class="btn-group">
                <a href="ResearchesPage.php" class="btn1 btn-light btn-md">Browse Researches</a>
                <a href="UploadFile.php" class="btn1 btn-dark btn-md">Upload Research</a>
                 </div>
             </div>
             
            
         
         <div class="app-picture">
             <img src="images/Book Lover_Isometric.svg">
         </div>
        
         
         </div>
         
    </div>
    
    <div class="mouse_scroll">
        <a href="#sec-2">
        <div class="mouse">
            
        </div>
        
            
            <span class="m_scroll_arrows unu"></span>
            <span class="m_scroll_arrows doi"></span>
            <span class="m_scroll_arrows trei"></span>
</a>
        </div>

    
    <section id="sec-2">
    <div class="container">
    <h1 class="text-center" style="padding-bottom: 30px;"> Featured Researches </h1>

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">

    <?php 
        $i = 0;
        foreach($resultColUploads as $row)
        {
          $actives = '';
          if($i == 0)
          {
            $actives = 'active';
          }
        
    ?>

    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?= $i; ?>" class="<?= $actives; ?>" aria-current="true" aria-label="Slide 1"></button>

    <?php $i++; } ?>

  </div>
  <div class="carousel-inner container">

           <?php 
        $i = 0;
        foreach($resultColUploads as $row)
        {
          $actives = '';
          if($i == 0)
          {
            $actives = 'active';
          }
        
    ?>


    <div class="carousel-item <?= $actives; ?>">
      <img src="backLogin.png" style="height: fit-content;" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <div id="Abs">
        <h5><?= $row['CDepartment'] ?></h5>
        <h6><?= $row['CTitle'] ?></h6>
        <small><?= $row['CAuthor'] ?></small>
        <p><?= $row['CAbstract'] ?></p>
        <p><?= $row['CKeyword'] ?>y</p>
        <small><a href="ViewColloquium.php?CVID=<?= $row['CID'] ?>"class="btn btn-outline-dark btn-sm">Read More</a></small>
      </div>
    </div>
    </div>

    <?php $i++; } ?>

  
  </div>
 
</div>

    </div>
    
     


    </section>


    <footer>
        <div class="footer">
        <h1 style="font-weight:bold;font-family:lucida console;">LYCEUM OF THE PHILIPPINES UNIVERSITY CAVITE</h1>
        
        <a href="index.php" class="Text-light">Home</a>&nbsp;
        <a href="ResearchesPage.php">Reseaches</a>&nbsp;
        <a href="">Help</a>&nbsp;
        <a href="Account.php">Account</a>
        <br><br>
        <p style="color:white;font-family:lucida console;">© 2021 Copyright</p>
      </div>
        </footer> 

        
    <script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>