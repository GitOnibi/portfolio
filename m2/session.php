<?
session_start();

$fuserid = $_POST['fuserid'];
$fpasswd = $_POST['fpasswd'];

$_SESSION['ses_userid'] = $fuserid;
$_SESSION['ses_pass'] = $fpasswd;

?>