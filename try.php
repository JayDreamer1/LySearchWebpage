<?php

include('process.php');

$queryGetColloUploads = "SELECT * FROM colloquiumtbl";
$resultColUploads = mysqli_query($db,$queryGetColloUploads);



?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Landing Page</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/headers/">

    

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



    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body{
            min-height: 1000px;
        }
        html{
            scroll-behavior: smooth;
        }
        .nav nav-pills{
            position: fixed;
        }
      .nav a{
          color: black;
          font-family: 'Nunito', sans-serif;
      }
      .nav-pills > li > a.active {
    background-color: #000000!important;
        }
        .nav a:hover{
            color: rgb(255, 255, 255);
        }
        .input-group{
            max-width: 100%;
            padding-left: 30vh;
            padding-right: 30vh;
        }
         p{
          font-family: 'Montserrat', sans-serif;
          font-size: 15px;
        }
        h1{
          font-family: 'IBM Plex Sans KR', sans-serif;
        font-family: 'Montserrat', sans-serif;
        }
        .btn a{
            text-decoration:none;
        }
        .blob{
          z-index: -1;
          position: absolute;
          top: -200px;
          left: -346px;
          width: 850px;
          opacity: 0.845;
          
        }
        .hero {
            display: block;
            box-sizing: border-box;
            max-height: fit-content;
            background-color: #ca0335;
            clip-path: ellipse(85% 100% at 50% 0%);
        }
        section{
            min-height: 100vh;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 100px;
        }
        
*, *:before, *:after {
  -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box;
 }


.mouse_scroll {
	display: block;
	margin: 0 auto;
	width: 24px;
	height: 100px;
	margin-top: -110px;
    align-items: center;
    justify-content: center;
}


.m_scroll_arrows
{
  display: block;
  width: 5px;
  height: 5px;
  -ms-transform: rotate(45deg); /* IE 9 */
  -webkit-transform: rotate(45deg); /* Chrome, Safari, Opera */
  transform: rotate(45deg);
   
  border-right: 2px solid white;
  border-bottom: 2px solid white;
  margin: 0 0 3px 4px;
  
  width: 16px;
  height: 16px;
}


.unu
{
  margin-top: 1px;
}

.unu, .doi, .trei
{
    -webkit-animation: mouse-scroll 1s infinite;
    -moz-animation: mouse-scroll 1s infinite;
    animation: mouse-scroll 1s infinite;
  
}

.unu
{
  -webkit-animation-delay: .1s;
  -moz-animation-delay: .1s;
  -webkit-animation-direction: alternate;
  
  animation-direction: alternate;
  animation-delay: alternate;
}

.doi
{
  -webkit-animation-delay: .2s;
  -moz-animation-delay: .2s;
  -webkit-animation-direction: alternate;
  
  animation-delay: .2s;
  animation-direction: alternate;
  
  margin-top: -6px;
}

.trei
{
  -webkit-animation-delay: .3s;
  -moz-animation-delay: .3s;
  -webkit-animation-direction: alternate;
  
  animation-delay: .3s;
  animation-direction: alternate;
  
  
  margin-top: -6px;
}

.mouse {
  height: 42px;
  width: 24px;
  border-radius: 14px;
  transform: none;
  border: 2px solid white;
  top: 170px;
}

.wheel {
  height: 5px;
  width: 2px;
  display: block;
  margin: 5px auto;
  background: white;
  position: relative;
  
  height: 4px;
  width: 4px;
  border: 2px solid #fff;
  -webkit-border-radius: 8px;
          border-radius: 8px;
}

.wheel {
  -webkit-animation: mouse-wheel 0.6s linear infinite;
  -moz-animation: mouse-wheel 0.6s linear infinite;
  animation: mouse-wheel 0.6s linear infinite;
}

@-webkit-keyframes mouse-wheel{
   0% {
    opacity: 1;
    -webkit-transform: translateY(0);
    -ms-transform: translateY(0);
    transform: translateY(0);
  }

  100% {
    opacity: 0;
    -webkit-transform: translateY(6px);
    -ms-transform: translateY(6px);
    transform: translateY(6px);
  }
}
@-moz-keyframes mouse-wheel {
  0% { top: 1px; }
  25% { top: 2px; }
  50% { top: 3px;}
  75% { top: 2px;}
  100% { top: 1px;}
}
@-o-keyframes mouse-wheel {

   0% { top: 1px; }
  25% { top: 2px; }
  50% { top: 3px;}
  75% { top: 2px;}
  100% { top: 1px;}
}
@keyframes mouse-wheel {

   0% { top: 1px; }
  25% { top: 2px; }
  50% { top: 3px;}
  75% { top: 2px;}
  100% { top: 1px;}
}

@-webkit-keyframes mouse-scroll {

  0%   { opacity: 0;}
  50%  { opacity: .5;}
  100% { opacity: 1;}
}
@-moz-keyframes mouse-scroll {

  0%   { opacity: 0; }
  50%  { opacity: .5; }
  100% { opacity: 1; }
}
@-o-keyframes mouse-scroll {

  0%   { opacity: 0; }
  50%  { opacity: .5; }
  100% { opacity: 1; }
}
@keyframes mouse-scroll {

  0%   { opacity: 0; }
  50%  { opacity: .5; }
  100% { opacity: 1; }
}


    </style>

    
    <!-- Custom styles for this template -->
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  </head>
  <body>
    
    
        



    <div class="hero">
        <div class="content">
        
  <div class="container">
  <div class="scroll-down"></div>    

    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      
      <a href="" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        
        <span class="fs-4"> <img src="logo white.png" style="max-width: 245px;">
        </span>
      </a>
      

      <ul class="nav nav-pills">
        <li class="nav-item"><a href="index.php" class="nav-link active" aria-current="page">Home</a></li>
        <li class="nav-item"><a href="ResearchesPage.php" class="nav-link">Researches</a></li>
        <li class="nav-item"><a href="Help.php" class="nav-link">Help</a></li>
        <li class="nav-item"><a href="Account.php" class="nav-link">Account</a></li>
      </ul>
    </header>
    <img class="blob" src="blob (1).svg">
  </div>

 
        
  <div class="container">
  <div class="input-group">
    <input type="search" class="form-control rounded" class="d-flex justify-content-center" placeholder="Search" aria-label="Search"
    aria-describedby="search-addon" />
    <button type="button" class="btn btn-dark" style=" font-family: 'Montserrat', sans-serif;">Search</button>
  </div>



    <div class="container col-xxl-8 px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
          <div class="col-10 col-sm-8 col-lg-6">
            <img src="find3.svg" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
          </div>
          <div class="col-lg-6">
            <h1 class="display-5 fw-bold lh-1 mb-3" style="color:#2b2a2a;" style="font-family: 'IBM Plex Sans KR', sans-serif;
            font-family: 'Montserrat', sans-serif;">LySearch</h1><br>
            <p class="desc" style="color: #000000;" style="font-family: 'IBM Plex Sans KR', sans-serif;
            font-family: 'Montserrat', sans-serif;">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fugiat dolor neque, saepe aperiam similique id voluptatem maiores corporis earum libero maxime sint nemo perferendis, atque soluta dignissimos, facere animi provident.</p>
            <br>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
              <button type="button" class="btn btn-light btn-lg px-4 me-md-2"><a href="ResearchesPage.php">Browse Research</a></button>
              <button type="button" class="btn btn-dark btn-lg px-4"><a href="UploadFile.php">Upload Research</a></button>
            </div>
        
          </div>
        </div>
      </div>
      <div class="mouse_scroll">
        <a href="#sec-2">
        <div class="mouse">
            <div class="wheel"></div>
        </div>
        <div>
            
            <span class="m_scroll_arrows unu"></span>
            <span class="m_scroll_arrows doi"></span>
            <span class="m_scroll_arrows trei"></span>
</a>
        </div>
    </div>
   </div>
  
</div>

</div>

<section id="sec-2">
    <div class="container">
    <h1 class="text-center"> Featured Researches </h1>

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
      <img src="backLogin.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5><?= $row['CDepartment'] ?></h5>
        <h6><?= $row['CTitle'] ?></h6>
        <small><?= $row['CAuthor'] ?></small>
        <h6><?= $row['CAbstract'] ?></h6>
        <small><?= $row['CKeyword'] ?>y</small><br>
        <small><a href="ViewColloquium.php?CVID=<?= $row['CID'] ?> ">Read More</a></small>
      </div>
    </div>

    <?php $i++; } ?>


  </div>
 
</div>



    

<!-- Footer -->

  



    <script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
  </body>
</html>
