<?
class SigninForm extends BaseForm
{

  public function configure()
  {
    $this->setWidgets(array(
      'username' => new sfWidgetFormInputText(),
      'password' => new sfWidgetFormInputPassword(array('type' => 'password')),
      'remember' => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'username' => new sfValidatorString(array('max_length' => 50), array('required' => '(Campo requerido)')),
      'password' => new sfValidatorString(array('max_length' => 50), array('required' => '(Campo requerido)')),
      'remember' => new sfValidatorBoolean(),
    ));

    $this->validatorSchema->setPostValidator(new ValidatorUser());

    $this->widgetSchema->setNameFormat('signin[%s]');
	}	
}
?>