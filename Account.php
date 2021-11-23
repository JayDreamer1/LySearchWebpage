<?php

include ('process.php');

$email = $_SESSION['EmailAdd'];

$queryGetUserData = "SELECT * FROM accountstbl WHERE AccountEmail = '$email'";
$getUserDResult = mysqli_query($db, $queryGetUserData);


$queryGetUpldData = "SELECT * FROM uploadtbl WHERE REmail = '$email'";
$getUpldDResult = mysqli_query($db, $queryGetUpldData);

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Account Page</title>
    <link rel="stylesheet" type="text/css" href="AccountStyle.css">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/headers/">

    

    <!-- Bootstrap core CSS -->
<link href="/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

 

<!--font-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">



<!-- old -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <script src="https://kit.fontawesome.com/173e67fce9.js" crossorigin="anonymous"></script>
     


      <style>
       

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
        <div class="logo">
        <span class="fs-4"> <img src="logo white.png">
        </span></div>
      </a>
      

      <ul class="nav nav-pills">
        <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
        <li class="nav-item"><a href="ResearchesPage.php" class="nav-link">Researches</a></li>
        <li class="nav-item"><a href="Help.php" class="nav-link">Help</a></li>
        <li class="nav-item"><a href="Account.php" class="nav-link active" aria-current="page">Account</a></li>
      </ul>
    </header>
  </div>

 
        
 


  <div class="container">
              <br>
              <br>
              <br>
            <h1 class="title">Account</p>
            <br>
      
     
    
    </div>
   </div>
  
</div>
  
<section id="sec-2">
        
 
     
  <div class="sidenav">   
  <h2>My Account </h2> 
  <?php
    while($getuser= mysqli_fetch_assoc($getUserDResult)) {
   ?>   
   <div class="profile-pic">   
  <img src="profilepics/<?php echo $getuser['AccountProfilePic'] ?>" alt="Avatar" >
<br>
<div class="edit">
  <a title="Change Profile Picture" href="ChangeUserProfile.php?ChangeDPID=<?=$getuser['AccountID']?>"><i class="fa fa-edit fa-md" ></i></a></div>
   </div>
 

  <p>Name: <?php echo $getuser['AccountName'] ?></p>
  <p> <?php echo $getuser['AccountEmail'] ?></p>
  <p><?php echo $getuser['AccountUserType'] ?></p>
  <p>Department: <?php echo $getuser['AccountDepartment'] ?></p>

  <?php
    }
    ?>

<!--
  <a href="#">My Uploads</a>
  <a href="#">Pending</a>
-->
  <hr> 
  <a class="logout" href="NewLogin.php?Logout='1'" ></i>Logout</a>
  
</div>

<div class="content2">
  <h2> My Uploads</h2>
  <hr>
  
  <div class="flex-container-cards">
  <div class="Uploads">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Department</th>
      <th scope="col">Date Uploaded</th>
      <th scope="col">File</th>
      <th scope="col">Status</th>
      <th scope="col">Comments</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody >
      <?php
    while ($getupldd= mysqli_fetch_assoc($getUpldDResult)) {
   ?>  
    <tr>
      <td><?php echo $getupldd['RDepartment']?></td>
      <td><?php echo $getupldd['RDate']?></td>
      <td><?php echo $getupldd['Rfile']?></td>
      <td><?php echo $getupldd['Status']?></td>
      <td><?php echo $getupldd['Comments']?></td>
      <td><a class="text-light" href="UserAccountReUp.php?UserID=<?=$getupldd['ResearchID']?>" style="text-decoration: none;"><button class="btn btn-success rounded" title="Re-Upload"> <i class="fas fa-redo-alt"></i>  </button> </a> <a class="text-light" href="UserAccountDel.php?UserID=<?=$getupldd['ResearchID']?>" style="text-decoration: none; "title="Delete"> </a></button></td>
    </tr>

     <?php
    }
    ?>
  </tbody>
</table>


  </div>
  
  

  </div>
</div>


</div>

      </div>

    
</section>



  <script>
    function myFunction() {
      var x = document.getElementById("navbar");
      if (x.className === "topnav") {
        x.className += " responsive";
      } else {
        x.className = "topnav";
      }
    }
    </script>

<script>
    var prevScrollpos = window.pageYOffset;
    window.onscroll = function() {
    var currentScrollPos = window.pageYOffset;
      if (prevScrollpos > currentScrollPos) {
        document.getElementById("navbar").style.top = "0";
      } else {
        document.getElementById("navbar").style.top = "-60px";
      }
      prevScrollpos = currentScrollPos;
    }
    </script>



<script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  
</body>
</html>
