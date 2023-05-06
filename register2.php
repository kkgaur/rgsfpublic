
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--



-->
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" http-equiv="Content-Type">
<title>Raginee Gaur Smriti Foundation - Registration</title>
<meta name="keywords" content="Registration, Raginee, Gaur, Foundation, India" />
<meta name="description" content="Registration Page of Raginee Gaur Smriti Foundation" />
<link rel="stylesheet" type="text/css" href="style/style2.css" />
</head>
<body>
<div class="formcenter">
<?php
// Store values and validate
include ('clean.php');
$name = clean($_POST['name']);
$person = clean($_POST['person']);
$usertype = $_POST['usertype'];
$mobile = $_POST['mobile'];
if ($mobile <6000000000 OR $mobile >= 9999999999 OR $usertype == Null) { 
    echo "<h2>The Mobile Number entered is not proper OR No check box is selected.</h2>";
    ?>
     <button onclick="goBack()">Go Back</button>
    <script>
    function goBack() {
     window.history.back();
    }
    </script> 
    <?php
    }
    else {
        // Converting the Party Type
        switch ($usertype) {
		case (11): $typename = "Support Seeker";
		break;
		case (12): $typename = "Contributor";
		break;
		case (13): $typename = "Well wisher";
		break;
		case (14): $typename = "Annonymous Doner";
		break;
		case (19): $typename = "Others";
		break;
		}
    //Connect to database
    $link=mysqli_connect("mysql.hostinger.in","u121985162_rgsf_users","u121985162_rgsf_super","Raginee@74324Gaur");
    //$link=mysqli_connect("localhost","root","","myyucan");
    //push data
    $find = mysqli_query ($link, "SELECT user_name FROM usergroup WHERE user_class='$usertype' AND user_mobile = '$mobile' AND user_active = 1");
    $yes = mysqli_num_rows($find);
    $data = mysqli_fetch_assoc($find); 
    $name1 = $data['name']; 
   

    if ($yes >= 1) {
  
    echo "<h2>This $typename is already registerd: <br>Name: $name1 <br> Mobile Number: $mobile </h2>";
    ?>
     <button onclick="goBack()">Go Back</button>

    <script>
    function goBack() {
     window.history.back();
    }
    </script> 
    <?php
    
    } 
    
    else 
    
    { 
        include 'register3.php';
        
    }
    
    }
echo "<BR>";
echo"</div>";

mysqli_close($link);
?>

<!--form code ends here -->
</body>
</html>