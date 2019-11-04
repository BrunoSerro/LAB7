<?php
include 'db.php';

$db = dbconnect($hostname,$db_name,$db_user,$db_passwd);
$Error = null;
if($db && !empty($_REQUEST))
  $Error = statement($db);
mysql_close($db);
if($Error == 1)
  redirect("",$_REQUEST['username'],$Error);
elseif($Error == 2)
  redirect("",$_REQUEST['username'],$Error);
elseif($Error == 5)
  redirect($_REQUEST['email'],$_REQUEST['username'],$Error);
elseif($Error == -1) header("Location: register_success.html");
elseif($Error == null) header("Location: index.php");

function statement($db) 
{
  $Email = $_REQUEST['email'];
  $Username = $_REQUEST['username'];
  
  $eState = checkEmail($db,$Email);
  if($eState !== -1)
    return $eState;
  
  
  $pwdState = checkPasswords($_REQUEST['password'],$_REQUEST['password_confirm']);
  if($pwdState !== -1)
    return $pwdState;
  
  $pwd = substr(md5($_REQUEST['password']),0,32);
  
  $insert = "INSERT INTO users (name,email,password_digest,created_at,updated_at) 
           VALUES ('$Username','$Email','$pwd',NOW(),NOW())";
  if(!($result = @ mysql_query($insert,$db)))
   showerror();
  return -1;
}

function checkEmail($db,$Email) 
{
  $isEmail = false;
  $find1 = strpos($Email, '@');
  if($find1 !== false && $find1>0)
    $isEmail = true;
  else return 2;
  $query = "SELECT * FROM users WHERE email='$Email'";
  if(!($result = @ mysql_query($query,$db))) 
   showerror();
  
  $nrows  = mysql_num_rows($result);
  if($nrows > 0)
    return 1;
  return -1;;
}

function checkPasswords($password,$password_confirm) 
{
  if($password == $password_confirm)
    return -1;
  return 5;
}

function redirect($Email,$Username,$Error) 
{
    header("Location: register.php?Error=$Error&Email=$Email&Username=$Username");
}
?>