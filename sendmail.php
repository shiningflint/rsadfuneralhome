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
$headers = "from: $email\r\n";
$headers .= "Content-type: text/html\r\n";

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