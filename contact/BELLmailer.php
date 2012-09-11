<?php
/* 
	BELLonline PHP MAILER SCRIPT v1.4
	Copyright 2006 Gavin Bell 
	http://www.bellonline.co.uk 
	gavin@bellonline.co.uk

	Set up an email form on your website within minutes - see readme.txt for installation.
*/

extract($_POST);

if (!file_exists("config.php")) 
	{
$host = $_SERVER[HTTP_HOST ];
$path = pathinfo($_SERVER['PHP_SELF']);
$file_path = $path['dirname'];
print "<h1>BELLonline PHP mailer script</h1>
	<h2>There is a problem with your PHP mailer script installation</h2>
	<p>The config.php file seems to be missing!</p>
	<p>For this script to work, you need to upload the config.php file that came with the download of the BELLonline <a href=\"http://www.bellonline.co.uk/web-services/free/scripts/php-mailer-script/\">PHP mailer script</a>.</p>
	<p>The file must be in the following directory of your website:</p>
	<p>$host<span style=\"font-weight: bold; font-size: 150%;\">$file_path/</span></p>
	<p>If you need help installing the script, then feel free to email me at <a href=\"&#x6d;&#x61;&#105;&#108;&#116;&#x6f;&#58;&#x67;&#x61;&#118;&#x69;&#110;&#64;&#98;&#x65;&#x6c;&#x6c;&#x6f;&#110;&#x6c;&#105;&#110;&#101;&#46;&#x63;&#111;&#46;&#x75;&#x6b;\">&#x67;&#x61;&#118;&#x69;&#110;&#64;&#98;&#x65;&#x6c;&#x6c;&#x6f;&#110;&#x6c;&#105;&#110;&#101;&#46;&#x63;&#111;&#46;&#x75;&#x6b;</a></p>";
exit;
	}
include "config.php";


if ($sendto_email == "changeme@example.com")
	{
print "<h1>BELLonline PHP mailer script</h1>
	<h2>Installation nearly complete!</h2>
	<p>Thank you for downloading the <a href=\"http://www.bellonline.co.uk/web-services/free/scripts/php-mailer-script/\" title=\"free PHP mailer script\">free PHP mailer script</a> from <a href=\"http://www.bellonline.co.uk\">BELLonline web services</a>. </p>
	<p>To start using the script, open config.php in a text editor and change the <b>&#36;sendto_email</b> variable to your email address.</p>
	<p>If you did not get a config.php file with this script, then go to the <a href=\"http://www.bellonline.co.uk/web-services/free/scripts/php-mailer-script/\">PHP mailer script page</a> and download the full script.</p>
	<p>If you need help installing the script, then feel free to email me at <a href=\"&#x6d;&#x61;&#105;&#108;&#116;&#x6f;&#58;&#x67;&#x61;&#118;&#x69;&#110;&#64;&#98;&#x65;&#x6c;&#x6c;&#x6f;&#110;&#x6c;&#105;&#110;&#101;&#46;&#x63;&#111;&#46;&#x75;&#x6b;\">&#x67;&#x61;&#118;&#x69;&#110;&#64;&#98;&#x65;&#x6c;&#x6c;&#x6f;&#110;&#x6c;&#105;&#110;&#101;&#46;&#x63;&#111;&#46;&#x75;&#x6b;</a></p>";
exit;
	} 
if (empty ($senders_name)) 
	{
	$error = "1";
	$info_error .= $lang_noname . "<br>"; 
	}
if (empty ($senders_email)) 
	{
	$error = "1";
	$info_error .= $lang_noemail . "<br>";  
	}
if (empty ($mail_subject)) 
	{
	$error = "1";
	$info_error .= $lang_nosubject . "<br>";  
	}
if (empty ($mail_message))  
	{
	$error = "1";
	$info_error .= $lang_nomessage . "<br>";  
	}
if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,6}$", $senders_email))
	{
	$error = "1";
	$info_error .= $lang_invalidemail . "<br>"; 
	}
if (empty ($security_code))  
	{
	$error = "1";
	$info_error .= $lang_nocode . "<br>";  
	}
elseif ($security_code != $randomness)  
	{
	$error = "1";
	$info_error .= $lang_wrongcode . "<br>";  
	}
if ($showlink != "no")
	{
	$link = "<br><span style=\"font-size: 10px;\">Powered by <a href=\"http://www.bellonline.co.uk/web-services/free/scripts/php-mailer-script/\" title=\"free PHP mailer script\">BELLonline PHP mailer script</a></span>";
	}
if ($error == "1") 
	{
	$info_notice = "<span style=\"color: " . $error_colour . "; font-weight: bold;\">" . $lang_error . "</span><br>"; 
	
	if (empty ($submit)) 
		{
		$info_error = "";
		$info_notice = $lang_notice;
		}	

	function Random() 
		{
		$chars = "ABCDEFGHJKLMNPQRSTUVWZYZ23456789";
		srand((double)microtime()*1000000);
		$i = 0;
		$pass = '' ;
		while ($i <= 4) 
			{
			$num = rand() % 32;
			$tmp = substr($chars, $num, 1);
			$pass = $pass . $tmp;
			$i++; 
			} 
		return $pass; 
		}
	$random_code = Random();
	$mail_message = stripslashes($mail_message);

	print "<form name=\"BELLonline_email\" method=\"post\" style=\"margin: 0;\" action=\"\">
  <table  border=\"0\" cellspacing=\"2\" cellpadding=\"2\">
    <tr align=\"$title_align\" valign=\"top\">
      <td colspan=\"2\"><span style=\"$title_css\">$lang_title</span></td>
    </tr>
    <tr align=\"left\" valign=\"top\">
      <td colspan=\"2\">$info_notice$info_error</td>
    </tr>
    <tr valign=\"top\">
      <td align=\"right\">$lang_name</td>
      <td align=\"left\"><input name=\"senders_name\" type=\"text\" class=\"mailform_input\" id=\"senders_name\" style=\"width: $input_width;\" value=\"$senders_name\" maxlength=\"32\"></td>
    </tr>
    <tr valign=\"top\">
      <td width=\"100\" align=\"right\">$lang_youremail</td>
      <td align=\"left\"><input name=\"senders_email\" type=\"text\" class=\"mailform_input\" id=\"senders_email\" style=\"width: $input_width;\" value=\"$senders_email\" maxlength=\"64\"></td>
    </tr>
    <tr valign=\"top\">
      <td width=\"100\" align=\"right\">$lang_subject</td>
      <td align=\"left\"><input name=\"mail_subject\" type=\"text\" class=\"mailform_input\" id=\"mail_subject\" style=\"width: $input_width;\" value=\"$mail_subject\" maxlength=\"64\"></td>
    </tr>
    <tr valign=\"top\">
      <td width=\"100\" align=\"right\">$lang_message</td>
      <td align=\"left\"><textarea name=\"mail_message\" cols=\"36\" rows=\"5\" style=\"width: $input_width;\" class=\"mailform_input\">$mail_message</textarea></td>
    </tr>
    <tr align=\"left\" valign=\"top\">
      <td width=\"100\">$lang_confirmation</td>
      <td><input name=\"security_code\" type=\"text\" id=\"security_code\" size=\"5\"> 
        &nbsp;&nbsp;&nbsp;&nbsp;<b>$random_code</b></td>
    </tr>
    <tr valign=\"top\">
      <td colspan=\"2\" align=\"right\"><input name=\"randomness\" type=\"hidden\" id=\"randomness\" value=\"$random_code\">
      <input name=\"submit\" type=\"submit\" id=\"submit\" value=\"$lang_submit\" class=\"mailform_button\"></td>
    </tr>
  </table>
</form>";
	}
else
	{
	
	
	
	if ($checkdomain == "yes") 
		{
		$sender_domain = substr($senders_email, (strpos($senders_email, '@')) +1);
		$recipient_domain = substr($sendto_email, (strpos($sendto_email, '@')) +1);
		if ($sender_domain == $recipient_domain)
			{
			print "Sorry, you cannot send messages from this domain ($sender_domain)";
			exit;
			}		
		}
		
		
	$info_notice = $lang_sent;
	$mail_message = stripslashes($mail_message);
	$senders_email = preg_replace("/[^a-zA-Z0-9s.@-]/", " ", $senders_email);
	$senders_name = preg_replace("/[^a-zA-Z0-9s]/", " ", $senders_name);
	$headers = "From: $senders_name <$senders_email> \r\n";
	$headers .= "X-Mailer: BELLonline.co.uk PHP mailer \r\n";
	mail($sendto_email, $mail_subject, $mail_message, $headers);
	print "  <table  border=\"0\" cellspacing=\"2\" cellpadding=\"2\">
    <tr align=\"$title_align\" valign=\"top\">
      <td colspan=\"2\"><span style=\"$title_css\">$lang_title</span></td>
    </tr>
    <tr align=\"$title_align\" valign=\"top\">
      <td colspan=\"2\">$info_notice</td>
    </tr>
    <tr valign=\"top\">
      <td width=\"100\" align=\"right\">$lang_name</td>
      <td align=\"left\"><b>$senders_name</b></td>
    </tr>
    <tr valign=\"top\">
      <td width=\"100\" align=\"right\">$lang_youremail</td>
      <td align=\"left\"><b>$senders_email</b></td>
    </tr>
    <tr valign=\"top\">
      <td width=\"100\" align=\"right\">$lang_subject</td>
      <td align=\"left\"><b>$mail_subject</b></td>
    </tr>
    <tr valign=\"top\">
      <td width=\"100\" align=\"right\">$lang_message</td>
      <td align=\"left\"><b>$mail_message</b></td>
    </tr>
  </table>";
	}
print $link;
?>
