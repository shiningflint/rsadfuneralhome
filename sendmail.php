<?php
$err = null;
$email = $_POST['email'];
$content = $_POST['mcontent'];
$name = $_POST['name'];
$to = "adam.keristoper@gmail.com";
$subject = "Mail inquiry from rsadfuneralhome.com";
$body = "<p>This is an inquiry mail from rsadfuneralhome.com</p>
<p>Sender's email address: ".$email."</p>
<p>Sender's name: ".$name."</p>

<p>Message content:</p>
<p>".$content."</p>
<p>End of message</p>
";
$headers = "From: RSAD Funeral Home <no-reply@rsadfuneralhome.com> \r\n";
$headers .= "Reply-To: ".$email;
$headers .= "X-Mailer: PHP/" . phpversion();
$headers .= "X-Priority: 1\n"; // Urgent message!
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\n";

if($email == '' || $content == '') {
	$err = 1;
	header("Location: index.php?err=".urlencode($err)."#contact");
	exit();
}

if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
	$err = 2;
	header("Location: index.php?err=".urlencode($err)."#contact");
	exit();
}

mail($to, $subject, $body, $headers);
$err = 3;
header("Location: index.php?err=".urlencode($err)."#contact");
exit();
?>