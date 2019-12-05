<?php
error_reporting(0);
include "connect.php";

function rand_string( $length ) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";  
    $size = strlen( $chars );
    for( $i = 0; $i < $length; $i++ ) {
        $str .= $chars[ rand( 0, $size - 1 ) ];
    }
    return $str;
}

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$occupation = $_POST['occupation'];
$id = rand_string( 10 );

$cek_email=mysql_num_rows(mysql_query("SELECT email FROM User WHERE email='$email'"));

if ($cek_email > 0){
    echo "<div id='gagal' class='alert alert-danger'>Email Has Been Registered<button type='button' class='close' data-dismiss='alert'><i class='fa fa-times'></i></button></div>";

}else {
    $input = mysql_query("INSERT INTO User (id, name, email, phone, occupation)
	                               VALUES('$id','$name', '$email', '$phone', '$occupation')");


require_once('library/PHPMailerAutoload.php');
include 'library/class.smtp.php';
include 'library/class.phpmailer.php';

        $mail             = new PHPMailer();
        $body             = 
        "<body style='margin: 10px;'>
        <div style='width: 640px; font-family: Helvetica, sans-serif; font-size: 13px; padding:10px; line-height:150%; border:#eaeaea solid 10px;'>
        <strong>New Registration Details</strong>
        <br>
        <br>
        <b>ID : </b>".$id."<br>
        <b>Nama : </b>".$name."<br>
        <b>Email : </b>".$email."<br>
        <b>Phone : </b>".$phone."<br>
        <b>Occupation : </b>".$occupation."<br>
        </div>
        <br>
        <b>Automatic Email by TalentBox Concept</b>
        </body>";
        
        $mail->IsSMTP();    //  SMTP
        $mail->SMTPDebug  = 0;   //  debug SMTP

        $mail->SMTPAuth   = true;   //  auth SMTP
        $mail->SMTPSecure = "tls";                 
        $mail->Host       = "smtp.gmail.com";      // GMAIL SMTP server
        $mail->Port       = 587; 
        $mail->Username   = "noreplyaccemailconfirm@gmail.com"; // username email
        $mail->Password   = "passwordsaya";        // password email 

        $mail->SetFrom($email, "No-Reply Email Registration");  // sent from
        $mail->Subject    = "New Registration ($id)"; // email subject
        $mail->IsHTML(true);
        $mail->Body=$body;

        $address = 'talentboxconcept@gmail.com'; //(admin email)
        $mail->AddAddress($address, "Admin");  //(admin name)

        if(!$mail->Send()) {
            echo "";
        }
}


    if ($input > 0) {
        echo "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'><i class='fa fa-times'></i></button><strong><i class='fa fa-check'></i> SUCCESS </strong><br/></div>";
    }
?>  