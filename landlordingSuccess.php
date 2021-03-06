<?php
  /*
  extract(array('name' =>'','email' =>'','phone' =>''));
  */
  ini_set('display_errors',1);
  error_reporting(E_ALL);
  if(isset($_GET['submitted'])){
    $formsubmitted2 = true;
  }
  $err_array = array();
  if(isset($_POST['submit'])){
    require_once("{$_SERVER['DOCUMENT_ROOT']}/lib/includes/phpmailer.php");
    //Strip Tags
    $name = strip_tags($_POST['name']);
    $email = strip_tags($_POST['email']);
    $phone = strip_tags($_POST['phone']);
    $errors = false;
    //Throw Errors if Empty
    if(empty($name)){
      $errors = true;
      array_push($err_array, 'name');
    }
    if(empty($email)){
      $errors = true;
      array_push($err_array, 'email');
    }
	if(empty($phone)){
      $errors = true;
      array_push($err_array, 'phone');
    }
    if(!$errors){
      //Srtip Slashes
      $name = stripslashes($_POST['name']);
      $email = stripslashes($_POST['email']);
      $phone = stripslashes($_POST['phone']);


			//Email Content
     	$body = "<table width='500' border='0' cellspacing='0' cellpadding='0' align='center'>
								<tr>
									<td>Name:</td>
									<td>$name</td>
								</tr>
								<tr>
									<td>Email:</td>
									<td>$email</td>
								</tr>
								<tr>
									<td>Phone:</td>
									<td>$phone</td>
								</tr>
							</table>";
      //Send Email

      //Email Title Information
      $objMail          = new PHPMailer();

			$objMail->SetFrom("noreply@goodlifemgmt.com", "Good Life Property Management");
			$objMail->AddReplyTo("info@goodlifemgmt.com", "Good Life Property Management");
			$objMail->AddAddress("info@goodlifemgmt.com", "Good Life Property Management");
            $objMail->AddAddress("new-leadcf58848c08@newlead.leadsimple.com", "Good Life Property Management");
			$objMail->Subject = "Good Life Free Management Quote Submission";
			$objMail->MsgHTML($body);
      $objMail->Send(); // send message
      header('Location: /lib/includes/landlordingSuccess.php?submitted=true');
    }
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Management Services | GOOD LIFE Property Management - Your Property Management Solution - San Diego, CA</title>
  <meta name="description" content="San Diego Property Management Services, Property Management Leasing, Property Mangement Full Service, Leasing Only Property Management, Full Service Property Management, Free Rental Analysis, Promote Your Property, San Diego Property Consultation" />
  <meta name="keywords" content="Good Life Property Management is a San Diego property management company, providing professional, full service management services to the San Diego community. Our San Diego property management team provides two main services: Leasing Only Service and Full Service Property Management." />
  <?php include("{$_SERVER['DOCUMENT_ROOT']}/lib/includes/head.php"); ?>
</head>
<body>
  <div id="ManagementQuote">
    <?php require_once("{$_SERVER['DOCUMENT_ROOT']}/lib/includes/phpmailer.class.php"); ?>
    <?php if(!isset($formsubmitted2)){ ?>
    <p>Complete the form below to download PDF</p>
    <form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post"  id="ContactForm" class="clearfix">
      <input type='hidden' name='contact_post' value='1' />
      <input type='hidden' name='support' value='Yes' />
      <div class="ContactInput <?php if(in_array('name', $err_array)){echo("errorField");} ?>">
        <label>Name*</label>
        <input type="text" name="name" />
      </div>
      <div class="ContactInput <?php if(in_array('email', $err_array)){echo("errorField");} ?>">
        <label>Email*</label>
        <input type="text" name="email" />
      </div>
      <div class="ContactInput">
        <label>Phone</label>
        <input type="text" name="phone" maxlength="14" />
      </div>


      <div class="Submit" style="clear: both;padding-left: 22px;text-align: left;">
        <input type="submit" name="submit" value="Submit" onClick="_gaq.push(['_trackEvent', 'contact', 'analysis', 'rental']);" />
      </div>
    </form><?php
    } else { ?>
	    <div class="formSuccess ownerpdf"><h1>Thank you</h1> <br>

	    </div>
	    <a class="downloadbtn" href="../../lib/pdf/Good_Life_Landlording_in_San_Diego_A_How_To_Guide_for_Success.pdf" download>Download here</a>
	  <?php } ?>
  </div>
</body>
</html>
