<?php session_start(); ?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Dance Baltimore Form</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="includes/screen.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
@import url("ruppert_data/style_01.css");
.dkRedText {color: #B15C34;}
.style5 {font-size: 14px}
-->
</style>
<link href="../style_01.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="maincontainer">
	<div id="topheader">
	  <?php
   if ($_SERVER['REQUEST_METHOD'] != 'POST'){
      $me = $_SERVER['PHP_SELF'];
?>

      
      <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="agreementFRM">
      <?php
  // session_register("SESSION");
	session_start();
?>  
      
      <table >
  </div>
	
	<tr>
    <td ><strong class="style4 style5">If you'd like to send a message, please use the form below.</strong></td>
    <td width="11">&nbsp;</td>
  </tr>
  <tr>
    <td height="37"><label><span class="style4">Name<br />
    </span>
        <input type="text" name="Name" />
    </label></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="35"><span class="style4">
      <label>E-Mail</label>
    </span>
      <label><br />
        <input type="text" name="email" />
    </label></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><label><span class="style4">Message<br />
    </span>
        <textarea name="message" rows="4"></textarea>
    </label></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="83">  <form id="form1" name="form1" method="post" action="">
        <label class="style4"></label>
        <table width="100" border="0">
          <tr>
            <td><label class="style4">
              <input name="Submit2" type="reset" class="style4" value="Reset" />
            </label>
              <input name="Submit" type="submit" class="style4" value="Submit" /></td>
          </tr>
        </table>
        <p>Or you can <a href='mailto:christopher@christopherruppert.com'>email him directly</a></p>
      </form>
      <p>
<?
	} else {
	error_reporting(0);
   // initialize a variable to 
   // put any errors we encounter into an array
   $errors = array();
   
   // check to see if a first name was entered
   if (!$_POST['Name'])
      // if not, add that error to our array
      $errors[] = "A name is required";
	  
   // check to see if a last name was entered
   //if (!$_POST['lastname'])
      // if not, add that error to our array
      //$errors[] = "A last name is required";
	  
   // check to see if the address was entered
   //if (!$_POST['address'])
      // if not, add that error to our array
      //$errors[] = "An address is required";
	  
   // check to see if city was entered
   //if (!$_POST['city'] 
      // if not, add that error to our array
      //$errors[] = "A city is required";
      
    // check to see if a state was entered
   //if (!$_POST['state'])
      // if not, add that error to our array
      //$errors[] = "A state is required";
      
    // check to see if a zip was entered
   //if (!$_POST['zip'])
      // if not, add that error to our array
      //$errors[] = "A zip code is required";

    // check to see if a phone number was entered
   //if (!$_POST['phone_#'])
      // if not, add that error to our array
      //$errors[] = "A phone number is required";
	  
    // check to see if an e-mail was entered
   if (!$_POST['email'])
      // if not, add that error to our array
      $errors[] = "A valid e-mail is required";
      
   if (!session_is_registered("SESSION"))
     $errors[] = "Invalid form submission";
	  
   // if there are any errors, display them
   if (count($errors)>0){
      echo "<strong>ERROR:<br>\n";
      foreach($errors as $err)
        echo "$err<br>\n";
		echo "<br><br>Please use your browser's Back button to fix this.";
   } else {
    
      $recipient = 'c.ruppert@christopherruppert.com';
      $subject = "Christopher Ruppert Portfolio Site ";
	  //$subject .= stripslashes($_POST['fldSubject'])
      $from = stripslashes($_POST['email']);
     
	  $Name = stripslashes($_POST['Name']);
	  $email = stripslashes($_POST['email']);
	  $message = stripslashes($_POST['message']);
	 $msg = "Message from: $from\n\nName: $Nname\n\nE-Mail: $from <$email>\n\nmessage;\n$message";

if (mail($recipient, $subject, $msg, "From: $from <$email>\r\n")){
         echo ("Your request has been sent. You will receive a reply within a few days.");
           //else
         //echo ("Message failed to send");

}
}
}
?>
</body>
</html>
