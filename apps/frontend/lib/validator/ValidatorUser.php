<?php

class ValidatorUser extends sfGuardValidatorUser
{
  public function configure($options = array(), $messages = array())
  {
    $this->addOption('username_field', 'username');
    $this->addOption('password_field', 'password');
    $this->addOption('throw_global_error', true);

    $this->setMessage('invalid', 'Nombre de usuario o contraseña incorrecto.');
  }
}
