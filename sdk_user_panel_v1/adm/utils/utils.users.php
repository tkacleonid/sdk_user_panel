<?php
	error_reporting(E_ALL & ~E_NOTICE);

	
	//It's checking if user is with that name
	function check_user($user)
	{
		global $tbl_adm_accounts;
		
		$rus = array("А","а","В","Е","е","К","М","Н","О","о","Р","р","С","с","Т","Х","х");
    
		$eng = array("A","a","B","E","e","K","M","H","O","o","P","p","C","c","T","X","x");
		
		$eng_user = str_replace($rus,$eng,$user);
		$rus_user = str_replace($eng,$rus,$user);
		
		$query = "select *from $tbl_adm_accounts WHERE login LIKE '$user' OR login LIKE '$eng_user' OR login LIKE '$rus_user'";
		
		$res = @mysql_query($query);
		
		if(!$res)
		{
			echo "EROOR!";
			exit;
		}
		
		if(@mysql_num_rows($res)) return "К сожалению, данное имя уже используется. Попробуйте другое";
		else return "";
	}
	
	function get_user_adm($id,$login)
	{
		global $tbl_adm_accounts;
		
		$query = "SELECT * FROM $tbl_adm_accounts WHERE id = '$id' AND login = '$login'";
		
		$res = @mysql_query($query);
		
		if(!$res)
		{
			return false;
		}
		
		if(@mysql_num_rows($res)) return @mysql_fetch_array($res);
		else return false;		 
	}
	
	
	function set_adm_cookie($user,$psw)
	{
		$tmp_pos = strrpos($_SERVER['PHP_SELF'],'/');
		$path = substr($_SERVER['PHP_SELF'],0,$tmp_pos);
		$tmp_pos = strrpos($path,'/') + 1;
		$path = substr($_SERVER['PHP_SELF'],0,$tmp_pos);
		
		setcookie("adm_user",$user,time() + 3600*24*7,$path);
		setcookie("adm_psw",$psw,time() + 3600*24*7,$path);
	}
	
	function clean_adm_cookie()
	{
		$tmp_pos = strrpos($_SERVER['PHP_SELF'],'/');
		$path = substr($_SERVER['PHP_SELF'],0,$tmp_pos);
		$tmp_pos = strrpos($path,'/') + 1;
		$path = substr($_SERVER['PHP_SELF'],0,$tmp_pos);
		
		setcookie("adm_user","",0,$path);
		setcookie("adm_psw","",0,$path);
		
		unset($_COOKIE['adm_psw']);
	}

	function enter($login,$psw)
    {
      global $tbl_adm_accounts;
      
      $query = "select * from $tbl_adm_accounts where login='$login' and psw='$psw'";
      
      $res = @mysql_query($query);
      
      
      if(!$res)
      {
         return false;
      }
      
      if(mysql_num_rows($res))
      {
        $user = mysql_fetch_array($res);
        
        $_SESSION['id_user_adm'] = $user["id"];
        $_SESSION['login_adm'] = $user["login"];
        return $user;
      }
      
      return false;
    }
	
?>