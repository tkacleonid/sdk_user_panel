<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	session_start();

	require_once("../utils/utils.users.php");


	if(!empty($_GET['logout']))
	{
		clean_adm_cookie();
		unset($_SESSION['id_user_adm']);
		unset($_SESSION['login_adm']);
	}
	
	
	if(!empty($_SESSION['id_user_adm']) && !empty($_SESSION['login_adm']))
    {
      $user = get_user_adm($_SESSION['id_user_adm'],$_SESSION['login_adm']);
      
      if($user == false)
      {
        header("Location: ../utils/page_enter.php");
      }
      
    }
	else 
	{
		if(!empty($_COOKIE['adm_psw']) && !empty($_COOKIE['adm_user']) && empty($_POST['login_enter_adm'])) 
		{
		  $user = enter($_COOKIE['adm_user'],$_COOKIE['adm_psw']);
		  
		  if($user == false)
		  {
			header("Location: ../utils/page_enter.php");
		  }
		}
		else
		{
      
			if(!empty($_POST['login_enter_adm']) && !empty($_POST['psw_enter_adm']))
			{
			  $user = enter($_POST['login_enter_adm'],$_POST['psw_enter_adm']);
			  
			  if($user == false)
			  {
                header("Location: ../utils/page_enter.php?p={$_POST['login_enter_adm']}");
			  }
			  if($_POST['remember_adm'])
			  {
				set_adm_cookie($_POST['login_enter_adm'],$_POST['psw_enter_adm']);
			  }
			}
			else
			{
              header("Location: ../utils/page_enter.php");
			}
		}
	}
	
	$query = "update $tbl_adm_accounts set date_last_enter=NOW(), date_last_activity=NOW() where id={$_SESSION['id_user_adm']}";

	if(!mysql_query($query))
	{
	  exit("Произошла ошибка при обращении к базе данных");
	}

?>