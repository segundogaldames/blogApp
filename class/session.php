<?php

class Session
{
	public static function init()
	{
		session_start();
	}

	public static function destroy($clave = false)
	{
		if($clave):
			if(is_array($clave)):
				for($i = 0;$i < count($clave);$i++):
					if(isset($_SESSION[$clave[$i]])):
						unset($_SESSION[$clave[$i]]);
					endif;
				endfor;
			else:
				if(isset($_SESSION[$clave])):
					unset($_SESSION[$clave]);
				endif;
			endif;
		else:
			session_destroy();
		endif;
	}

	public static function set($clave, $valor)
	{
		if(!empty($clave)):
			$_SESSION[$clave] = $valor;
		endif;
	}

	public static function get($clave)
	{
		if(isset($_SESSION[$clave])):
			return $_SESSION[$clave];
		endif;
	}

	public static function tiempo()
	{
		if(!Session::get('tiempo') || !defined('SESSION_TIME')):
			throw new Exception("Tiempo de session no definido");
			
		endif;

		if(SESSION_TIME == 0): //se asume que el tiempo de session es indefinido
			return;
		endif;

		if(time() - Session::get('tiempo') > (SESSION_TIME * 60)):
			Session::destroy();
			header('Location: ' . BASE_URL . 'error/access/8080');
		else:
			Session::set('tiempo', time());
		endif;
	}
}