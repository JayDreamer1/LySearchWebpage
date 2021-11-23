<?php

include ('process.php');


$email = $_SESSION['EmailAdd'];



$per_page = 5;
$start = 0;
$current_page = 1;
if(isset($_GET['start']))
{
   $start = $_GET['start'];
   $current_page = $start;
   $start--;
   $start = $start*$per_page;
}


$record = mysqli_num_rows(mysqli_query($db,"SELECT * FROM uploadtbl"));

$page = ceil($record/$per_page);

 $sql="SELECT * FROM uploadtbl LIMIT $start,$per_page";
 $result_set=mysqli_query($db,$sql);


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
   
    <title>Uploads Page</title>
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <img src="logo icon.png">
      <span class="logo_name">&nbsp;LySearch</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="admin.php">
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
          <a href="Uploads.php" class="active">
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
     

      <div class="sales-boxes">
        <div class="recent-sales box">
        <center> <h1>User Uploads</h1>
        </center>
            <ul class="details">
              <br>
 
              <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Email</th>
      <th scope="col">Title</th>
      <th scope="col">Author/s</th>
      <th scope="col">Abstract</th>
      <th scope="col">Department</th>
      <th scope="col">Keyword/s</th>
      <th scope="col">Year</th>
      <th scope="col">File</th>
      <th scope="col">Comments</th>
      <th scope="col">Status</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody >
    <?php if(mysqli_num_rows($result_set) > 0){ ?>
      <?php
    while ($upldrow= mysqli_fetch_assoc($result_set)) {
   ?>  
    <tr>
      <td><?php echo $upldrow['ResearchID']?></td>
      <td><?php echo $upldrow['REmail']?></td>
      <td><?php echo $upldrow['RTitle']?></td>
      <td><?php echo $upldrow['RAuthor']?></td>
      <td><?php echo $upldrow['RAbstract']?></td>
      <td><?php echo $upldrow['RDepartment']?></td>
      <td><?php echo $upldrow['RKeyword']?></td>
      <td><?php echo $upldrow['RYear']?></td>
      <td><a href="uploads/<?php echo $upldrow['Rfile'] ?>#toolbar=0" target="_blank"><?php echo $upldrow['Rfile'] ?></a></td>
      <td><?php echo $upldrow['Comments']?></td>
      <td><?php echo $upldrow['Status']?></td>
      <td><a class="text-light" href="UpdatesStatus.php?RID=<?=$upldrow['ResearchID']?>" style="text-decoration: none;"><button class="btn btn-success rounded" title="Update"> <i class="far fa-edit"></i> </button></a>  <a class="text-light" href="DeleteUserUpload.php?RID=<?=$upldrow['ResearchID']?>" style="text-decoration: none; "><button class="btn btn-danger rounded" title="Delete"> <i class="far fa-trash-alt"></i> </td></a>
    </tr>

     <?php
    } } else { ?> <td>No Record/s</td> <?php } 
    ?>
  </tbody>
</table>

<hr>
 <section aria-label="Page navigation" class="container-fluid" style="padding-left: 80%;">
  <ul class="pagination">

    <?php for($i=1;$i<=$page;$i++){ 
$class ='';
         if($current_page==$i)
         {
            
            $class = 'active';
         }


      ?>

    <li class="page-item <?php echo $class ?>" ><a class="page-link" href="?start=<?php echo $i?>"><?php echo $i ?></a></li>

     <?php } ?> 

  </ul>
 </section>

          
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

