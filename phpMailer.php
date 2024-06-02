<?php 

$conn= mysqli_connect("localhost", 
				"root", "", "mailer"); 

require "PHPMailer.php"; 
require "SMTP.php" ; 
require "PHPMailer-master/src/Exception.php" ; 

// Server settings 
$mail = new PHPMailer\PHPMailer\PHPMailer(); 

// Enable verbose debug output 
$mail->isSMTP(); 

// Send using SMTP 
$mail->Host = "smtp.gmail.com"; 
$mail->SMTPAuth = true; 

// SMTP username 
$mail->Username = "YOUR SMTP USERNAME"; 

// SMTP password				 
$mail->Password = "YOUR PASSWORD"; 
$mail->SMTPAuth = "tls"; 
$mail->Port = 587;		 

//Recipients 
// This email-id will be taken 
// from your database 
$mail->setFrom("###"); 

// Selecting the mail-id having 
// the send-mail =1 
$sql = "select * from users where send_mail=1"; 

// Query for the making the connection. 
$res = mysqli_query($conn, $sql); 

if(mysqli_num_rows($res) > 0) { 
	while($x = mysqli_fetch_assoc($res)) { 
		$mail->addAddress($x['email']); 
	} 

	// Set email format to HTML 
	$mail->isHTML(true); 
	$mail->Subject = 
		"Mailer Multiple address in php"; 
		
	$mail->Body = "Hii </p>Myself </h1>Rohit 
	sahu</h1> your Article has been acknowledge 
	by me and shortly this article will be 
	contributing in</p> <h1>Geeks for Geeks !</h1>"; 
	
	$mail->AltBody = "Welcome to Geeks for geeks"; 
	
	if($mail->send()) 
	{ 
	echo "Message has been sent check mailbox"; 
	} 
	else{ 
		echo "failure due to the google security"; 
	} 
} 
	
?> 
