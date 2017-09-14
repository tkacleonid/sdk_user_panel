<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	session_start();
	
	require_once("../../config/config.php");
	
	require_once("../utils/utils.users.php");
	
	
	if(!empty($_GET['logout']))
	{
		//clean_adm_cookie();
		clean_user_cookie();
		//unset($_SESSION['id_user_adm']);
		unset($_SESSION['id_user_user']);
		//unset($_SESSION['login_adm']);
		unset($_SESSION['login_user']);
		unset($_SESSION['key_hasp_id']);
		unset($_SESSION['key_id']);
	}

	if(!empty($_GET["key_hasp_id"]) && ($_GET["user_authority_key"] == md5("DIAGNOSTICS")))
	{
		$hasp = get_key_hasp($_GET["key_hasp_id"]);
		$key_hasp_contain = $_GET["key_hasp_contain"];
		
		if($hasp == false)
		{
			$status = initialize_key_hasp($_GET["key_hasp_id"],$key_hasp_contain);
			
			if($status == false)
			{
				
              //header("Location: ../../index_enter.php");
			}
		}
		$hasp = enter_hasp($_GET["key_hasp_id"]);
		
		if($hasp == false)
		{
          //header("Location: ../../index_enter.php");
		}
		
	}
	else if(!empty($_SESSION['key_hasp_id']))
	{
		$hasp = get_key_hasp($_SESSION['key_hasp_id']);
		
		if($hasp == false)
		{
          //header("Location: ../../index_enter.php");
		}
		
		
	}
	else if(!empty($_SESSION['id_user_user']) && !empty($_SESSION['login_user']))
    {
      $user = get_user($_SESSION['id_user_user'],$_SESSION['login_user']);
      
      if($user == false)
      {
        //header("Location: ../../index_enter.php");
      }  
    }
	else if(!empty($_COOKIE['user_psw']) && !empty($_COOKIE['user_user']) && empty($_POST['login'])) 
	{
		$user = enter_user($_COOKIE['user_user'],$_COOKIE['user_psw']);
		  
		if($user == false)
		{
          //header("Location: ../../index_enter.php");
		}
	}
	else if(!empty($_POST['login']) && !empty($_POST['psw']))
	{
		$user = enter_user($_POST['login'],$_POST['psw']);
			  
		if($user == false)
		{
            $user = enter_adm($_POST['login'],$_POST['psw']);
			if($user == false)
			{
              //header("Location: ../../index_enter.php");
			}
			else
			{
				if($_POST['remember'])
				{
					set_adm_cookie($_POST['login'],$_POST['psw']);
				}
			}
		}
		else
		{
			if($_POST['remember'])
			{
				set_user_cookie($_POST['login'],$_POST['psw']);
			}
		}
	}
	else if(!empty($_SESSION['id_user_adm']) && !empty($_SESSION['login_adm']))
    {
      $user = get_user_adm($_SESSION['id_user_adm'],$_SESSION['login_adm']);
      
      if($user == false)
      {
        //header("Location: ../../index_enter.php");
      }  
    }
	else if(!empty($_COOKIE['adm_psw']) && !empty($_COOKIE['adm_user']) && empty($_POST['login'])) 
	{
		$user = enter_adm($_COOKIE['adm_user'],$_COOKIE['adm_psw']);
		  
		if($user == false)
		{
          //header("Location: ../../index_enter.php");
		}
	}
	else
	{
      //header("Location: ../../index_enter.php");
	}
		
	
	

?>