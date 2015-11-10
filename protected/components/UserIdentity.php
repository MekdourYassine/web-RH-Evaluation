<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {

    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    private $id;

    public function authenticate() {
        $record = Compte::model()->findByAttributes(array('email' => $this->username,
        ));

        if ($record === null)
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        //else if ($record->mdp !=($this->password))
         else if (!$record->validatePassword($this->password))
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        else {
            $this->id = $record->id_compte;
            $this->setState('roles', $record->roles);
            $this->errorCode = self::ERROR_NONE;
        }
        return !$this->errorCode;
    }

    public function getId() {
        return $this->id;
    }
}
