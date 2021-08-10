<?php

$to = "contact@ebenezer-isaac.com";
$subject = filter_input(INPUT_POST, "subject");
$name = filter_input(INPUT_POST, "name");
$email = filter_input(INPUT_POST, "email");
$message = filter_input(INPUT_POST, "message");
$main .= "Hello Ebenezer,<br>Name : ".$name."<br>Email : ".$email."<br>Subject : ".$subject."<br><br>".$message;
$header = "From: ".$email."\r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-type: text/html\r\n";
$retval = mail($to, "Website Contact Request", $main, $header);
$header = "From: Ebenezer Isaac <contact@ebenezer-isaac.com>\r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-type: text/html\r\n";
$sendmess = "Hello ".$name.",<br> \t Thank you for filling the contact form.I will revert back to you shortly.<br><br>This is an auto generated mail sent from my Mail Server.<br>Please do not reply to this mail.<br>Regards<br>Ebenezer Isaac";
$retval = mail($email, "Contact Request to Ebenezer",$sendmess , $header);
if ($retval == true) {
    echo "Message sent successfully...";
} else {
    echo "Message could not be sent...Try again later";
}
