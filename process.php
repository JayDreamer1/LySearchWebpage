<?php

session_start();


$inter;
$setuser ="";
$errors = array();
$vari = 2;
$update = false;
#to connect database

$db = mysqli_connect('localhost','root','','logininfodb');

if(isset($_POST['LoginBtn']))
{
	$leaddress = mysqli_real_escape_string($db,$_POST['LogEmailAdd']);
	$lpassword = mysqli_real_escape_string($db,$_POST['LogPass']);

	if(empty($_POST['LogEmailAdd'])) {array_push($errors, "Please input Email Address");}
	if(empty($_POST['LogPass'])) {array_push($errors, "Please input Password");}

			$queryLoginUpdate = "SELECT * FROM accountstbl Where AccountEmail = '$leaddress' AND AccountPassword = '$lpassword'";
			$resultUpdate = mysqli_query($db,$queryLoginUpdate);

			if(mysqli_num_rows($resultUpdate) == 1){
				$_SESSION['EmailAdd'] = $leaddress;
				$_SESSION['Password'] = $lpassword;
				header('location: UpdateAccount.php');
				array_push($errors, "Update Your Account.");
			}

	if(count($errors) == 0)
	{

		$queryLoginChecker = "SELECT * FROM accountstbl Where AccountEmail = '$leaddress'";
		$resultCheck = mysqli_query($db,$queryLoginChecker);

		$queryLoginCheckerAdmin = "SELECT * FROM adminacctbl Where AdminEmailAdd = '$leaddress' AND AdminPassword = '$lpassword'";
		$resultCheckAdmin = mysqli_query($db,$queryLoginCheckerAdmin);
//PASSWORD HASH WORKING NA HEHE
		if(mysqli_num_rows($resultCheck) == 1)
		{
			while($rows=mysqli_fetch_assoc($resultCheck))
			{
				if(password_verify($lpassword, $rows['AccountUPassword'])){
			$_SESSION['EmailAdd'] = $leaddress;
			header('location: index.php');
		}
			else{
				array_push($errors, "Email or Password didn't match. Please try again.");
			}
			}
		}
		else if(mysqli_num_rows($resultCheckAdmin) == 1)
		{
			$_SESSION['EmailAdd'] = $leaddress;
			header('location: admin.php');
		}
		else
		{
			array_push($errors, "Email or Password didn't match. Please try again.");
		}
	}


	
}

if(isset($_POST['UpdateBtn']))
{
  $OldPassword = mysqli_real_escape_string($db,$_POST['OldPass']);
	$NewPassword1 = mysqli_real_escape_string($db,$_POST['UpPass1']);
	$NewPassword2 = mysqli_real_escape_string($db,$_POST['UpPass2']);

	$pass = $_SESSION['Password'];
	$email = $_SESSION['EmailAdd'];
	$NewAccPass = md5("RegisterAccountSuccessful2021");

	$NewHashPass = password_hash($NewPassword1, PASSWORD_BCRYPT);

	if($OldPassword != $pass)
	{
		array_push($errors, "Old Password didn't match");
	}

	if($NewPassword1 != $NewPassword2) 
	{
		array_push($errors, "Passwords didn't match");
	}

 if(count($errors) == 0)
 {
	$queryUpdatePass = "UPDATE accountstbl SET AccountUPassword = '$NewHashPass' , AccountPassword = '$NewAccPass' WHERE AccountEmail = '$email'";
  $resultUPass = mysqli_query($db, $queryUpdatePass);
    
    if($resultUPass)
  	  {
  	  	header('location: NewLogin.php');
      }

}


}

#For Account Creation

	if (isset($_POST['CAcc'])) {
			

	$AccName = mysqli_real_escape_string($db,$_POST['AName']);
	$AccEmail = mysqli_real_escape_string($db,$_POST['AEmail']);
	$AccUserType = mysqli_real_escape_string($db,$_POST['AUserType']);
	$AccDepart = mysqli_real_escape_string($db,$_POST['ADepart']);
	$AccPassW = mysqli_real_escape_string($db,$_POST['APass']);

	

	if(empty($_POST['AName'])) {array_push($errors, "Please Input Name");}
	if(empty($_POST['AEmail'])) {array_push($errors, "Please Input Email Address");}
	if(empty($_POST['APass'])) {array_push($errors, "Please Input Password");}


	$queryEmaiLChecker = "SELECT AccountEmail FROM accountstbl Where AccountEmail = '$AccEmail'";
	$eCheckerResult = mysqli_query($db,$queryEmaiLChecker);

	if(mysqli_num_rows($eCheckerResult) == 1){
		array_push($errors, "The Email Address is already used.");
	}

	if(count($errors) == 0)
	{
		$querysCreate = "INSERT INTO accountstbl (AccountName,AccountEmail,AccountUserType,AccountDepartment,AccountPassword) VALUES ('$AccName','$AccEmail','$AccUserType','$AccDepart', '$AccPassW')";
			mysqli_query($db,$querysCreate);
			if($querysCreate)
			{
				header('location: accounts.php');
			}
	}

	}

#FOR UPDATE GIVEN PASSWORDS // THIS SHOULD BE MONTHLY //

 if(isset($_POST['UpdateGPass']))
 {
 	 $GPassword = mysqli_real_escape_string($db,$_POST['GivenPass']);
	 $NewGPass = mysqli_real_escape_string($db,$_POST['NewDPass']);
	 $RNewGPass = mysqli_real_escape_string($db,$_POST['RNewDPass']);

	 $queryPassChecker = "SELECT AccountPassword FROM accountstbl WHERE AccountPassword = '$GPassword'";
	 $resultPassCheck = mysqli_query($db,$queryPassChecker);

	 if(mysqli_num_rows($resultPassCheck) == 0)
	 {
	 	array_push($errors, "The Given Password didn't match.");
	 }


	if(count($errors) == 0)
	{

	 $queryUpdateGivenPass = "UPDATE accountstbl SET AccountPassword = '$NewGPass', AccountUPassword = ''";
	 $resultUpdatePass = mysqli_query($db,$queryUpdateGivenPass);
    
    if($resultUpdatePass)
  	  {
  	  	header('location: accounts.php');
      }

	}
 }

#For logout

	if(isset($_GET['Logout']))
	{
		session_destroy();
		unset($_SESSION['Username']);
		header("location: NewLogin.php");
	}


#For Thesis Upload Admin

	if (isset($_POST['UploadA'])) {
			

	$thesisTitle = mysqli_real_escape_string($db,$_POST['Ttitle']);
	$thesisA = mysqli_real_escape_string($db,$_POST['Tauth']);
	$thesisAbs = mysqli_real_escape_string($db,htmlspecialchars($_POST['Tabs']));
	$thesisKeyW = mysqli_real_escape_string($db,$_POST['Tkw']);
	$thesisY = mysqli_real_escape_string($db,$_POST['Tyr']);

	if(empty($_POST['Ttitle'])) {array_push($errors, "Please input Title Name");}
	if(empty($_POST['Tauth'])) {array_push($errors, "Please input Author/s");}
	if(empty($_POST['Tabs'])) {array_push($errors, "Please input Abstract");}
	if(empty($_POST['Tkw'])) {array_push($errors, "Please input Keywords");}
	if(empty($_POST['Tyr'])) {array_push($errors, "Please input Year");}

	$querryTitleChecker = "SELECT ThesisTitle FROM thesistbl Where ThesisTitle = '$thesisTitle'";
	$tCheckerResult = mysqli_query($db,$querryTitleChecker);

	if(mysqli_num_rows($tCheckerResult) == 1){
		array_push($errors, "The Thesis Title is already used");
	}

	if(count($errors) == 0)
	{
		$querysUpl = "INSERT INTO thesistbl (ThesisTitle,ThesisAuthor,ThesisAbstract, ThesisKeyW , ThesisYear) VALUES ('$thesisTitle','$thesisA', '$thesisAbs', '$thesisKeyW' , '$thesisY')";
			mysqli_query($db,$querysUpl);
			if($querysUpl)
			{
				header('location: Thesis.php');
			}
	}

	}
#For User Uploads

if(isset($_POST['btn-upload']))
{    

     

 $file = $_FILES['file']['name'];
 $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="uploads/";


 
  // make file name in lower case
 $new_file_name = strtolower($file);
 // make file name in lower case
 
 $final_file=str_replace(' ','-',$new_file_name);

 $EmailUp = mysqli_real_escape_string($db, $_POST['UpEmail']);
 $TitleUp = mysqli_real_escape_string($db, $_POST['UpTitle']);
 $AuthorUp = mysqli_real_escape_string($db, $_POST['UpAuthor']);
 $AbstractUp = mysqli_real_escape_string($db, $_POST['UpAbstract']);
 $DepartmentUp = mysqli_real_escape_string($db, $_POST['UpDepartment']);
 $KeywordsUp = mysqli_real_escape_string($db, $_POST['UpKeywords']);
 $YearUp = mysqli_real_escape_string($db, $_POST['UpYear']);

 $StudentUserType = "Student";

 $queryLimitUps = "SELECT * FROM uploadtbl WHERE REmail = '$EmailUp'";
 $resultLimitUps = mysqli_query($db,$queryLimitUps);

 $queryLimitGetUsertype = "SELECT AccountUserType FROM accountstbl WHERE AccountUserType = '$StudentUserType' AND AccountEmail = '$EmailUp'";
 $resultLimitGetUsertype = mysqli_query($db,$queryLimitGetUsertype);

 if(mysqli_num_rows($resultLimitUps) == 1 && mysqli_num_rows( $resultLimitGetUsertype) == 1){
 	array_push($errors, "Already uploaded a thesis.");
 } 
 else{
 	 
 }	

 if(count($errors) == 0 && move_uploaded_file($file_loc,$folder.$final_file))
	{
		$queryUpldT = "INSERT INTO uploadtbl(REmail,RTitle,RAuthor,RAbstract,RDepartment,RKeyword,RYear,Rfile) VALUES ('$EmailUp','$TitleUp','$AuthorUp','$AbstractUp','$DepartmentUp','$KeywordsUp','$YearUp','$final_file')";
		$resultUpldT = mysqli_query($db,$queryUpldT);

		header('location:UploadSuccess.php');
  }
  }

 #For Admin Uploads

  if(isset($_POST['btn-upload-thesis']))
{    
     

 $file = $_FILES['file']['name'];
 $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="ThesisUploads/";


 
  // make file name in lower case
 $new_file_name = strtolower($file);
 // make file name in lower case
 
 $final_filers=str_replace(' ','-',$new_file_name);

 $ThesTitle = mysqli_real_escape_string($db, $_POST['ThesisNT']);
 $ThesAuthor = mysqli_real_escape_string($db, $_POST['ThesisNAu']);
 $ThesAbstract = mysqli_real_escape_string($db, $_POST['ThesisNAb']);
 $ThesKeyWord = mysqli_real_escape_string($db, $_POST['ThesisNKw']);
 $ThesYear = mysqli_real_escape_string($db, $_POST['ThesisNYr']);


 if(count($errors) == 0 && move_uploaded_file($file_loc,$folder.$final_filers))
	{
		$queryUpldTAd = "INSERT INTO thesistbl(ThesisTitle,ThesisAuthor,ThesisAbstract,ThesisKeyW,ThesisYear,ThesisFile) VALUES ('$ThesTitle','$ThesAuthor','$ThesAbstract','$ThesKeyWord','$ThesYear','$final_filers')";
		$resultUpldTAd = mysqli_query($db,$queryUpldTAd);

		header('location:Thesis.php');
  }
  }

#For Colloquium Uploads

  if(isset($_POST['BtnUploadColloquium']))
{    
     

 $file = $_FILES['Cfile']['name'];
 $file_loc = $_FILES['Cfile']['tmp_name'];
 $file_size = $_FILES['Cfile']['size'];
 $file_type = $_FILES['Cfile']['type'];
 $folder="ColloquiumUploads/";


 
  // make file name in lower case
 $new_file_name = strtolower($file);
 // make file name in lower case
 
 $final_files=str_replace(' ','-',$new_file_name);

 $ColTitle = mysqli_real_escape_string($db, $_POST['CTitle']);
 $ColAuthor = mysqli_real_escape_string($db, $_POST['CAuthor']);
 $ColAbstract = mysqli_real_escape_string($db, $_POST['CAbstract']);
 $ColKeyWord = mysqli_real_escape_string($db, $_POST['CKeyword']);
 $ColYear = mysqli_real_escape_string($db, $_POST['CYear']);
 $ColDepartment = mysqli_real_escape_string($db, $_POST['CDepartment']);


 if(count($errors) == 0 && move_uploaded_file($file_loc,$folder.$final_files))
	{
		$queryUpldCol = "INSERT INTO colloquiumtbl(CTitle,CAuthor,CAbstract,CKeyword,CYear,CDepartment,CFile) VALUES 
		('$ColTitle','$ColAuthor','$ColAbstract','$ColKeyWord','$ColYear','$ColDepartment','$final_files')";
		$resultUpldCol = mysqli_query($db,$queryUpldCol);

		header('location:Colloquium.php');
  }
  }


?>