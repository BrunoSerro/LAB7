<?php
include 'db.php';
require('libs/Smarty.class.php');

$smarty = buildSmarty();

$Form = array (
  "ErrorTxt" => "",
  "Error" => -1,
  "isError" => 0,
  "Username" => "",
  "Email" => ""
);

$Form = checkREQUEST($Form);
smartyAssign($Menu,$Form,$smarty);
smartyDisplay($smarty);

function checkREQUEST($Form) 
{
  if(isset($_REQUEST['Error'])) 
  {
  	$Form = fillCorrect($Form);
    $Form = errorCase($Form);
  } 
  else { $Form['Error']=0; }
  return $Form;
}

function errorCase($Form) 
{
  switch ($Form['Error']) {
    case 0:
        $Form['ErrorTxt'] = "Todos os campos devem ser preenchidos";
        break;
    case 1:
        $Form['ErrorTxt'] = "Email já se encontra registado";
        break;
    case 2:
        $Form['ErrorTxt'] = "Email tem formato incorrecto";
        break;
    case 4:
        $Form['ErrorTxt'] = "Password em branco";
        break;
    case 5:
        $Form['ErrorTxt'] = "Passwords não coincidem";
        break;
  }
  $Form['isError'] = 1;
  return $Form;
}

function fillCorrect($Form)
{
  foreach ($_REQUEST as $key => $value) 
  {
    $Form[$key] = $value;
  }
  return $Form;
}

function displayError($Form, $Error) 
{
  if(true) {
    $Form['Menu0'] = $Error;
  }
}

function simulateError($Form, $Ecode) 
{
  errorCase($Ecode,$Form['Error']);
  echo $Form['Error'];
}

function buildSmarty()
{
  $smarty = new Smarty();
  $smarty->template_dir = 'templates';
  $smarty->compile_dir = 'templates_c';
  $smarty->cache_dir = 'cache';
  $smarty->config_dir = 'configs';
  return $smarty;
}

function smartyAssign($Menu,$Form,$smarty) 
{
  foreach ($Menu as $key => $value) 
  {
    $smarty->assign($key,$value);
  }

  $smarty->assign('username',$Form['Username']);
  $smarty->assign('email',$Form['Email']);
  $smarty->assign('isError',$Form['isError']);
  $smarty->assign('Error',$Form['ErrorTxt']);
  $smarty->assign('password',"");
  $smarty->assign('password_confirm',"");
  
}

function smartyDisplay($smarty) 
{
  $smarty->display('templates/register_template.tpl');
}
?>