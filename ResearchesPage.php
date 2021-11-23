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
    <title>Researches Page</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/headers/">
    
    <!--old-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="ResearchesStyle.css" rel="stylesheet">
  

  <script src="https://kit.fontawesome.com/173e67fce9.js" crossorigin="anonymous"></script>

  <!--back to top button-->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  


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
  #research {
    
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }
  
  #research td, #research th {
    border: 1px solid rgb(221, 221, 221);
    padding: 8px;
    font-size: 1.5rem;
  }
  
  #research tr:nth-child(even){background-color: #f2f2f2;}
  
  #research tr:hover {background-color: rgb(221, 221, 221);}
  
  #research th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color:#9D9D9D;
    color: white;

  }

#search{
  width: 100%;
  padding: 10px;
  font-size: 1.5rem;
}

  
  article {
    padding: 80px;
    width: 100%;
    background-color: #fdfdfd;
    height: fit-content; /* only for demonstration, should be removed */
    margin-top: -100px;
  }
 
  /* Clear floats after the columns */
  section::after {
    content: "";
    display: table;
    clear: both;
    
  }
  
  /* back to top button */
  #back-to-top {
    position: fixed;
    bottom: 25px;
    right: 25px;
    display: none;
    background-color: gray;
}
#back-to-top:hover{
  background-color: black;
}

    </style>

    
    <!-- Custom styles for this template -->
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>

 
<a id="back-to-top" href="#" class="btn btn-dark btn-lg back-to-top" role="button"><i class="fas fa-chevron-up"></i></a>


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
        <li class="nav-item"><a href="ResearchesPage.php" class="nav-link active">Researches</a></li>
        <li class="nav-item"><a href="Help.php" class="nav-link">Help</a></li>
        <li class="nav-item"><a href="Account.php" class="nav-link">Account</a></li>
      </ul>
    </header>
  </div>

  <div class="container">
              <br>
              <br>
              <br>
              <br>
              <br>
            <h1 class="hero-title">Researches</h1>
            <br>
      
     
    
    </div>
        </div>
</div>


<br>
<article>

  <div class="container">  
                 
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
    

<footer>
  <div class="sticky-footer">
  <h1 style="font-weight:bold;font-family:lucida console;"><br>LYCEUM OF THE PHILIPPINES UNIVERSITY CAVITE</h1>
  
  <a href="index.php" class="Text-light">Home</a>&nbsp;
  <a href="ResearchesPage.php">Reseaches</a>&nbsp;
  <a href="">Help</a>&nbsp;
  <a href="Account.php">Account</a>
  <br><br>
  <p style="color:white;font-family:lucida console;">© 2021 Copyright</p>
</div>
  </footer> 

<script>  
   $(document).ready(function(){  
        $('#search').keyup(function(){  
             search_table($(this).val());  
        });  
        function search_table(value){  
             $('#research tr').each(function(){  
                  var found = 'false';  
                  $(this).each(function(){  
                       if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)  
                       {  
                            found = 'true';  
                       }  
                  });  
                  if(found == 'true')  
                  {  
                       $(this).show();

                  }  
                  else  
                  {  
                       $(this).hide();  
                  }  
             });  
        }  
   });  
</script> 

<script>
$(document).ready(function(){
	$(window).scroll(function () {
			if ($(this).scrollTop() > 50) {
				$('#back-to-top').fadeIn();
			} else {
				$('#back-to-top').fadeOut();
			}
		});
		// scroll body to 0px on click
		$('#back-to-top').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 400);
			return false;
		});
});
</script>


 
    


    <script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>   
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

 

  </body>
</html>
