<?php

include ('process.php');


$email = $_SESSION['EmailAdd'];

$queryGetUser = "SELECT AdminName FROM adminacctbl WHERE AdminEmailAdd = '$email'";
$getUserResult = mysqli_query($db, $queryGetUser);


$queryUserCounter = "SELECT COUNT(*) FROM accountstbl";
$resultUserCount = mysqli_query($db, $queryUserCounter);

$queryUpldCounter = "SELECT COUNT(*) FROM uploadtbl";
$resultUpldCount = mysqli_query($db, $queryUpldCounter);

$queryThsCounter = "SELECT COUNT(*) FROM thesistbl";
$resultThsCount = mysqli_query($db, $queryThsCounter);

$queryColCounter = "SELECT COUNT(*) FROM colloquiumtbl";
$resultColCount = mysqli_query($db, $queryColCounter);


$time = date("Y/m/d");


?>


<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
    <link rel="stylesheet" href="dashboardStyle.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!--from old-->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <script src="https://kit.fontawesome.com/173e67fce9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   
    <title>Admin Page</title>
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <img src="logo icon.png">
      <span class="logo_name">&nbsp;LySearch</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="admin.php" class="active">
            <i class='bx bx-home' ></i>
            <span class="links_name">Home</span>
          </a>
        </li>
        <li>
          <a href="accounts.php"  >
            <i class='bx bx-box' ></i>
            <span class="links_name">Accounts</span>
          </a>
        </li>
        <li>
          <a href="Uploads.php">
            <i class='bx bxs-file-plus' ></i>
            <span class="links_name">Uploads</span>
          </a>
        </li>
        <li>
          <a href="Thesis.php">
            <i class='bx bx-book' ></i>
            <span class="links_name">Thesis</span>
          </a>
        </li>
        <li>
          <a href="Colloquium.php">
            <i class='bx bx-book-reader' ></i>
            <span class="links_name">Colloquium</span>
          </a>
        </li>
        
        
          
        </li>
        <li class="log_out">
          <a href="NewLogin.php?Logout='1'" >
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard"></span>
      </div>
     
    </nav>




    <!-------------------CONTENT----------------------->
    <div class="home-content">
      

        
          <div class="accountContent">
       
            <ul class="details"  style="text-align: center;">
              <br>
              
              <?php
    while ($rowuser= mysqli_fetch_assoc($getUserResult)) {
   ?>   
   <p> Today is <?php echo $time ?> </p> 
<h1>Welcome, <?php echo $rowuser['AdminName'] ?> </h1>

<small> This page is for authorized person only. </small>
<br>


  <?php
    }
    ?>
<hr>
              


<br>
  <br>

<?php
    while ($usercount= mysqli_fetch_assoc($resultUserCount)) {
   ?>  
<div class="row">
<div class="column">  
<div class="card container-fluid text-center" style="width: 350px;">

  <div class="card-body">
    <i class="fas fa-users"></i> 
    <h5 class="card-title">Accounts</h5>
    <p class="card-text">Registered Users:  <?php echo $usercount['COUNT(*)'] ?> </p>
    <a href="accounts.php" class="btn btn-success">View Accounts</a>
  </div>

</div>

 <?php
    }
    ?>
</div>
<br>


<?php
    while ($upldcount= mysqli_fetch_assoc($resultUpldCount)) {
   ?>  

<div class="column">  
<div class="card container-fluid text-center" style="width: 350px;">

  <div class="card-body">
    <i class="fas fa-users"></i> 
    <h5 class="card-title">Uploads</h5>
    <p class="card-text">User Uploads:  <?php echo $upldcount['COUNT(*)'] ?> </p>
    <a href="Uploads.php" class="btn btn-success">View User Uploads</a>
  </div>

</div>

 <?php
    }
    ?>
</div>
<br>
<?php
    while ($thscount= mysqli_fetch_assoc($resultThsCount)) {
   ?>  

<div class="column">  
<div class="card container-fluid text-center" style="width: 350px;">

  <div class="card-body">
    <i class="fas fa-users"></i> 
    <h5 class="card-title">Thesis</h5>
    <p class="card-text">Thesis Uploads:  <?php echo $thscount['COUNT(*)'] ?> </p>
    <a href="Thesis.php" class="btn btn-success">View Thesis Uploads</a>
  </div>

</div>

 <?php
    }
    ?>
</div>
<br>
<?php
    while ($colcount= mysqli_fetch_assoc($resultColCount)) {
   ?> 

<div class="column">
<div class="card container-fluid text-center" style="width: 350px;">

  <div class="card-body">
    <i class="fas fa-file"></i>
    <h5 class="card-title">Colloquium</h5>
    <p class="card-text">Uploaded Research Colloquim: <?php echo $colcount['COUNT(*)'] ?> </p>
    <a href="Colloquium.php" class="btn btn-success">View Colloquium Uploads</a>
  </div>

</div>
</div>
<?php
    }
    ?>
</div>
          
          </div>
        </div>
      
      </div>
    </div>
  </section>

  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>

</body>
</html>

