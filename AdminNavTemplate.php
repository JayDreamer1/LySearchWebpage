<?php

include ('loginprocess.php');


$email = $_SESSION['EmailAdd'];

$queryGetAcc = "SELECT * FROM accountstbl";
$getAccResult = mysqli_query($db, $queryGetAcc);




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

    <title>Accounts Page</title>
  </head>
  <body>

    <div class="container-fluid">

    <div class='dashboard'>
    <div class="dashboard-nav">
        <header>
          <!--  <a href="#!" class="menu-toggle"> <i class="fal fa-bars"></i></a>-->
        <a href="#"class="brand-logo">
            <i class="fas fa-book"></i> <span>LYSEARCH</span></a></header>
        <nav class="dashboard-nav-list">
            <a href="admin.php" class="dashboard-nav-item"><i class="fas fa-home"></i> Home</a>
            <a href="accounts.php" class="dashboard-nav-item"><i class="fas fa-users"></i>Accounts</a>
            <a href="#!" class="dashboard-nav-item"><i class="fas fa-file-upload"></i>Uploads</a>
            <a href="#!" class="dashboard-nav-item"><i class="fas fa-book-open"></i>Thesis</a>
            <a href="#" class="dashboard-nav-item"><i class="fas fa-file"></i>Colloquium</a>
          <div class="nav-item-divider"></div>
          <span class="navbar-text float-right mx-3">
     <a href="NewLogin.php?Logout='1'" class="dashboard-nav-item"><i class="fas fa-sign-out-alt"></i>Logout</a>
    </span>
        </nav>
    </div>
 


    <div class='dashboard-app'>
        <header class='dashboard-toolbar'>
      
          </header>
            <div class='dashboard-content'>
            <div class='container'>
            <div class='card'>
            <div class='card-header'>
            <div class="container-fluid text-center">

        <!----------INSERT Header Here------->
        <!----------INSERT Header Here------->       
  <br>
 <h1> JACKOWOW </h1>
 <br>

    
      </div>
    </div>
  <div class='card-body'>
    
 <!----------INSERT CONTENT Here UWUUU------->
<!----------INSERT CONTENT Here  UWUUUU------->   
 
<h1> UWUUU </h1>


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