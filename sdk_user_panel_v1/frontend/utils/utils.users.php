<?php
	error_reporting(E_ALL & ~E_NOTICE);

	
	//It's checking if user is with that name
	function check_user_adm($user)
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
			return "-1";
		}
		
		if(@mysql_num_rows($res)) return "К сожалению, данное имя уже используется. Попробуйте другое";
		else return "";
	}
	
	function check_user($user)
	{
		global $tbl_users;
		
		$rus = array("А","а","В","Е","е","К","М","Н","О","о","Р","р","С","с","Т","Х","х");
    
		$eng = array("A","a","B","E","e","K","M","H","O","o","P","p","C","c","T","X","x");
		
		$eng_user = str_replace($rus,$eng,$user);
		$rus_user = str_replace($eng,$rus,$user);
		
		$query = "select *from $tbl_users WHERE login LIKE '$user' OR login LIKE '$eng_user' OR login LIKE '$rus_user'";
		
		$res = @mysql_query($query);
		
		if(!$res)
		{
			return "-1";
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
	
	function get_user($id,$login)
	{
		global $tbl_adm_accounts;
		
		$query = "SELECT * FROM $tbl_users WHERE id = '$id' AND login = '$login'";
		
		$res = @mysql_query($query);
		
		if(!$res)
		{
			return false;
		}
		
		if(@mysql_num_rows($res)) return @mysql_fetch_array($res);
		else return false;		 
	}
	
	function get_key_hasp($key_hasp_id)
	{
		global $tbl_hasp;
		
		$key_hasp_id = mysql_real_escape_string($key_hasp_id);
		$query = "SELECT * FROM $tbl_hasp where id_hasp='$key_hasp_id'";
		
		$res = @mysql_query($query);
		
		if(!$res)
		{
			return false;
		}
		
		if(@mysql_num_rows($res)) return @mysql_fetch_array($res);
		else return false;		 
	}
	
	function initialize_key_hasp($key_hasp_id,$key_hasp_contain)
	{
		global $tbl_hasp;
		
		$key_hasp_id = mysql_real_escape_string($key_hasp_id);
		$key_hasp_contain = mysql_real_escape_string($key_hasp_contain);
		
		$bytes_hasp_contain = explode(";",$key_hasp_contain);
		
		if(intval($bytes_hasp_contain[28]) == 255)
		{
			$bytes_hasp_contain[28] = "1";
		}
		
		if(intval($bytes_hasp_contain[29]) == 255)
		{
			$bytes_hasp_contain[29] = "00";
		}
		
		$date_end = "31-".$bytes_hasp_contain[28]."-".$bytes_hasp_contain[29];
		
		
		
		$query = "INSERT into $tbl_hasp(id_hasp,date_end,text_contain) 
					VALUES(
						'$key_hasp_id',
						STR_TO_DATE('$date_end', '%d-%c-%y'),
						'$key_hasp_contain'	
		)";
		
		$res = @mysql_query($query);
		
		if(!$res)
		{
			return false;
		}
		
		mkdir("../../user_data/hasp/".$key_hasp_id,0600);
		
		return true;		 
	}
	
	function enter_hasp($key_hasp_id)
    {
      global $tbl_hasp;
	  
	  $key_hasp_id = mysql_real_escape_string($key_hasp_id);
      
      $query = "select * from $tbl_hasp where id_hasp='$key_hasp_id'";
      
      $res = @mysql_query($query);
      
      
      if(!$res)
      {
         return false;
      }

      if(mysql_num_rows($res))
      {
        $hasp = mysql_fetch_array($res);
        
		$query = "update $tbl_hasp SET date_last_activity=NOW() where id={$hasp['id']}";
      
		$res = @mysql_query($query);
	  
        $_SESSION['key_hasp_id'] = $hasp["id_hasp"];
        $_SESSION['key_id'] = $hasp["id"];

        return $hasp;
      }
      
      return false;
    }
	
	
	
	function set_adm_cookie($user,$psw)
	{
		/*
			$tmp_pos = strrpos($_SERVER['PHP_SELF'],'/');
			$path = substr($_SERVER['PHP_SELF'],0,$tmp_pos);
			$tmp_pos = strrpos($path,'/') + 1;
			$path = substr($_SERVER['PHP_SELF'],0,$tmp_pos);
		*/
		
		setcookie("adm_user",$user,time() + 3600*24*7,"/");
		setcookie("adm_psw",$psw,time() + 3600*24*7,"/");
	}
	
	function set_user_cookie($user,$psw)
	{
		/*
			$tmp_pos = strrpos($_SERVER['PHP_SELF'],'/');
			$path = substr($_SERVER['PHP_SELF'],0,$tmp_pos);
			$tmp_pos = strrpos($path,'/') + 1;
			$path = substr($_SERVER['PHP_SELF'],0,$tmp_pos);
		*/
		
		setcookie("user_user",$user,time() + 3600*24*7,"/");
		setcookie("user_psw",$psw,time() + 3600*24*7,"/");
	}
	
	function clean_adm_cookie()
	{
		/*
			$tmp_pos = strrpos($_SERVER['PHP_SELF'],'/');
			$path = substr($_SERVER['PHP_SELF'],0,$tmp_pos);
			$tmp_pos = strrpos($path,'/') + 1;
			$path = substr($_SERVER['PHP_SELF'],0,$tmp_pos);
		*/
		
		setcookie("adm_user","",0,"/");
		setcookie("adm_psw","",0,"/");
		
		unset($_COOKIE['adm_psw']);
	}
	
	function clean_user_cookie()
	{
		/*
			$tmp_pos = strrpos($_SERVER['PHP_SELF'],'/');
			$path = substr($_SERVER['PHP_SELF'],0,$tmp_pos);
			$tmp_pos = strrpos($path,'/') + 1;
			$path = substr($_SERVER['PHP_SELF'],0,$tmp_pos);
		*/
		
		setcookie("user_user","",0,"/");
		setcookie("user_psw","",0,"/");
		
		unset($_COOKIE['user_psw']);
	}

	function enter_adm($login,$psw)
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
	
	function enter_user($login,$psw)
    {
      global $tbl_users;
      
      $query = "select * from $tbl_users where login='$login' and psw='$psw'";
      
      $res = @mysql_query($query);
      
      
      if(!$res)
      {
         return false;
      }
      
      if(mysql_num_rows($res))
      {
        $user = mysql_fetch_array($res);
        
        $_SESSION['id_user_user'] = $user["id"];
        $_SESSION['login_user'] = $user["login"];
        return $user;
      }
      
      return false;
    }
	
?>