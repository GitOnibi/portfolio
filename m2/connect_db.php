<?
$host = "localhost";
$user = "dope";
$passwd = "dbwls12!Q";

$connect = mysql_connect($host, $user, $passwd) or die ("mysql Server Connection Error");
mysql_select_db('dope',$connect) or die ("DB Connection Error");
?>