<?php 


include('process.php');

  $querytblThesis = "SELECT ThesisID,ThesisTitle,ThesisAuthor,ThesisAbstract,ThesisKeyW, ThesisYear FROM thesistbl";
  $tblresultThesis = mysqli_query($db, $querytblThesis);

  $AcceptedThesis = "Approved";

  $querytblThesisApproved = "SELECT * FROM uploadtbl WHERE Status = '$AcceptedThesis'";
  $tblresultThesisApproved = mysqli_query($db, $querytblThesisApproved);

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Sub WebPAge</title>

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
          color: rgb(187, 187, 187);
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
        
        p {
            text-align: center;
        }
        
        .hero {
            display: block;
            box-sizing: border-box;
            max-height: max-content;
            background-image: linear-gradient(rgba(20, 20, 20, 0.5),rgb(14, 14,20, 0.5)),url(reading.svg);
            clip-path: ellipse(85% 100% at 50% 0%);
            background-color:#ca0335;
            background-size: contain;
            background-repeat: no-repeat;
            background-position-x: center;
        }
        section{
            min-height: 100vh;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 10px;
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
        <li class="nav-item"><a href="#" class="nav-link">Home</a></li>
        <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Researches</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Help</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Account</a></li>
      </ul>
    </header>
  </div>

 
        
 


    <div class="container">
              <br>
              <br>
            <p style="font-family: 'Lato', sans-serif;
            font-size: 60px;
            color: rgb(255, 255, 255);"> Researches</p>
            <p style="font-family: 'Open Sans', sans-serif; color:rgb(255, 255, 255)"> Nihil cum praesentium molestiae facere quam iste, odio delectus labore aut nulla.</p>
            <br>
            <br><br>
      
     
    
    </div>
   </div>
  
</div>

<section id="sec-2">
    <div class="container">
    <section>





<article>

  <div class="container">  
         <p>Lyceum of the Philippines University Cavite Online Thesis & Dissertation</p>                 
         <br /><br />  
         <div align="center">  
              <input type="text" name="search" id="search" placeholder="What are you looking for?" class="form-control" />  
         </div>  
         <br /><br />  
         <div class="table-responsive" >  
              <table class="table table-bordered" id="research">  
                   
                   <tr>  
                        <th width="3%">Year</th>  
                        <th width="50%">Title</th>  
                        <th width="25%">Authors</th>  
                        <th width="20%">Keywords</th>  
                      
                   </tr>  
                    <tr>  
                       <?php
while ($rowstblthes = mysqli_fetch_assoc($tblresultThesis)) {
?>   

  <tr>
    <td> <?php echo $rowstblthes['ThesisYear'] ?></td>
    <td> <a href="ModalPage.php?ThesisID=<?=$rowstblthes['ThesisID']?>&ThesisKeyW=<?=$rowstblthes['ThesisKeyW']?>"><?php echo $rowstblthes['ThesisTitle'] ?></a></td>
    <td> <?php echo $rowstblthes['ThesisAuthor'] ?></td>
    <td> <?php echo $rowstblthes['ThesisKeyW'] ?></td>
  </tr>
<?php
}
?>
                   </tr>  
                   <tr>  
                       <?php
while ($rowstblthesApp = mysqli_fetch_assoc($tblresultThesisApproved)) {
?>   

  <tr>
    <td> <?php echo $rowstblthesApp['RYear'] ?></td>
    <td> <a href="ModalPage.php?ThesisID=<?=$rowstblthesApp['ResearchID']?>&ThesisKeyW=<?=$rowstblthesApp['RKeyword']?>"><?php echo $rowstblthesApp['RTitle'] ?></a></td>
    <td> <?php echo $rowstblthesApp['RAuthor'] ?></td>
    <td> <?php echo $rowstblthesApp['RKeyword'] ?></td>
  </tr>
<?php
}
?>
                   </tr>
              </table>  
         </div>  
    </div>  
  </article>
</section>
    </div>
</section>

  



    <script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      
  </body>
</html>
