<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {
	private $_id;
	const ERROR_DISABLED = 69;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate() {
		$user = Usuario::model() -> find('LOWER(username)=?', array(strtolower($this -> username)));
		$clie = Cliente::model() -> find('LOWER(username)=?', array(strtolower($this -> username)));
		if (is_null($user) && is_null($clie))
			$this -> errorCode = self::ERROR_USERNAME_INVALID;
		else if (is_null($user))
			$user = Cliente::model() -> find('LOWER(username)=?', array(strtolower($this -> username)));
		if (!is_null($user))
			if (!$user -> validatePassword($this -> password))
				$this -> errorCode = self::ERROR_PASSWORD_INVALID;
			else if (!$user -> estado === 0) {
				$this -> errorCode = self::ERROR_DISABLED;
			} else {
				$this -> _id = $user -> id;
				$this -> username = $user -> username;
				$this -> errorCode = self::ERROR_NONE;
				$this -> setState('last_login', $user -> last_login);
				if ($clie !== null) {
					$this -> setState('tipoUsuario', 'cliente');
					$this -> setState('nombre', $user -> razon_social);
					$this -> setState('codigo', $user -> codigo);
					$sql = "update cliente set last_login = now() where username='$user->username'";
				} else {
					$this -> setState('tipoUsuario', 'usuario');
					$this -> setState('nombre', $user -> nombre . ' ' . $user -> apellido);
					$sql = "update usuario set last_login = now() where username='$user->username'";
				}
				$connection = Yii::app() -> db;
				$command = $connection -> createCommand($sql);
				$command -> execute();
			}
		return $this -> errorCode == self::ERROR_NONE;
	}

	public function getId() {
		return $this -> _id;
	}

}
