<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if($_GET['name'] && $_GET['password'] && $_GET['email']){

    $file_key="password";
    //Server Variables
    $receiver_name = $_GET["name"];
    $receiver_email = $_GET["email"];

    //Fetching HTML Values
    $sender_name = "Ebenezer Isaac";
    $sender_mail = "mail@ebenezer-isaac.com";

    //Checking if File is uploaded

    //Main Content
    $main_subject = "Contact Number Puzzle";
    $main_body = "Hello $receiver_name,<br><br> 
    Congrats on proceeding to the next part of the puzzle <br><br> 
    Please Check Attachment Files";
    echo "Variable Set <br>";
//#############################DO NOT CHANGE ANYTHING BELOW THIS LINE#############################
    $zip = new ZipArchive();
    $filename = "./final-level.zip";
    if ($zip->open($filename, ZipArchive::CREATE)===TRUE) {
        $zip->setPassword($file_key);
        $zip->addFile("./9fe3034e5f05a704e01518c5e122bd0e034032e92ede511adcdb30f66f7d12d1/image.jpg");
        $zip->setEncryptionName('./9fe3034e5f05a704e01518c5e122bd0e034032e92ede511adcdb30f66f7d12d1/image.jpg', ZipArchive::EM_AES_256);
        $zip->close();
    }else{
        echo "Cannot open Zip file <br>";
        exit("cannot open <$filename>\n");
    }
    echo "Created Zip File <br>";
    $file = chunk_split(base64_encode(file_get_contents($filename)));
    $uid = md5(uniqid(time()));
    //Sending mail to Server
    echo "Prepared Zip File <br>";
    $retval = mail($receiver_email, $main_subject, "--$uid\r\nContent-type:text/html; charset=iso-8859-1\r\nContent-Transfer-Encoding: 7bit\r\n\r\n$main_body \r\n\r\n--$uid\r\nContent-Type: application/octet-stream; name=\"$filename\"\r\nContent-Transfer-Encoding: base64\r\nContent-Disposition: attachment; filename=\"$filename\"\r\n\r\n$file\r\n\r\n--$uid--", "From: $sender_name <$sender_mail>\r\nReply-To: $sender_mail\r\nMIME-Version: 1.0\r\nContent-Type: multipart/mixed; boundary=\"$uid\"\r\n\r\n");

//#############################DO NOT CHANGE ANYTHING ABOVE THIS LINE#############################

    echo "Mail Executed <br>";
    //Output
    if ($retval == true) {
        echo "Message sent successfully...";
        echo "<script>window.location.replace('index.html');</script>";
    } else {
        echo "Error<br>";
        echo "Message could not be sent...Try again later";
        echo "<script>window.location.replace('index.html');</script>";
    }
    echo "Deleting File <br>";
    if (file_exists($filename)) {
//        header('Content-Type: application/zip');
//        header('Content-Disposition: attachment; filename="'.basename($filename).'"');
//        header('Content-Length: ' . filesize($filename));
//        flush();
        readfile($filename);
        unlink($filename);
    }
    echo "Done <br>";
}else{
    echo "Error<br>";
    echo "Unauthorised Access";
}