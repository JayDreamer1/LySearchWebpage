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



<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="AdminStyles.css" rel="stylesheet">

     <script src="https://kit.fontawesome.com/173e67fce9.js" crossorigin="anonymous"></script>

    <title>Uploads Page</title>
  </head>
  <body>

    <div class="container-fluid">

    <div class='dashboard'>
    <div class="dashboard-nav">
        <header>
          <!--  <a href="#!" class="menu-toggle"> <i class="fal fa-bars"></i></a>-->
        <a href="admin.php"class="brand-logo">
            <i class="fas fa-book"></i> <span>LYSEARCH</span></a></header>
        <nav class="dashboard-nav-list">
            <a href="admin.php" class="dashboard-nav-item"><i class="fas fa-home"></i> Home</a>
            <a href="accounts.php" class="dashboard-nav-item"><i class="fas fa-users"></i>Accounts</a>
            <a href="Uploads.php" class="dashboard-nav-item"><i class="fas fa-file-upload"></i>Uploads</a>
            <a href="Thesis.php" class="dashboard-nav-item"><i class="fas fa-book-open"></i>Thesis</a>
            <a href="Colloquium.php" class="dashboard-nav-item"><i class="fas fa-file"></i>Colloquium</a>
          <div class="nav-item-divider"></div>
          <span class="navbar-text float-right mx-3">
     <a href="NewLogin.php?Logout='1'" class="dashboard-nav-item"><i class="fas fa-sign-out-alt"></i>Logout</a>
    </span>
        </nav>
    </div>
 


    <div class='dashboard-app'>
        <header class='dashboard-toolbar'>
           <!-- <a href="#!" class="menu-toggle"></a>-->
          </header>
        <div class='dashboard-content'>
            <div class='container'>
                <div class='card'>
                    <div class='card-header'>
                     <div class="container-fluid text-center">
  <br>

 <h1> User Uploads </h1>
 <br>

    
      </div>
    </div>
  <div class='card-body'>
    




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

 <nav aria-label="Page navigation" class="container-fluid" style="padding-left: 90%;">
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
</nav>



                      </div>

                  </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
    const mobileScreen = window.matchMedia("(max-width: 990px )");
$(document).ready(function () {
    $(".dashboard-nav-dropdown-toggle").click(function () {
        $(this).closest(".dashboard-nav-dropdown")
            .toggleClass("show")
            .find(".dashboard-nav-dropdown")
            .removeClass("show");
        $(this).parent()
            .siblings()
            .removeClass("show");
    });
    $(".menu-toggle").click(function () {
        if (mobileScreen.matches) {
            $(".dashboard-nav").toggleClass("mobile-show");
        } else {
            $(".dashboard").toggleClass("dashboard-compact");
        }
    });
});
    </script>

    <script>
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})

    </script>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>



  </body>
</html>