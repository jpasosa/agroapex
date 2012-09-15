<?
// lib/form/ContactForm.class.php
class ContactForm extends BaseForm
{
  public function configure()
  {

		$this->setWidgets(array(
      'nombre'	=> new sfWidgetFormInputText(),
      'empresa'	=> new sfWidgetFormInputText(),
      'telefono'	=> new sfWidgetFormInputText(),
      'email'	=> new sfWidgetFormInputText(),
      'comentarios'	=> new sfWidgetFormTextarea(array(), array('class' => 'textarea-contacto')),
    ));
    $this->widgetSchema->setNameFormat('contact[%s]');
 
    $this->setValidators(array(
      'nombre'	=> new sfValidatorString(array('max_length' => 50), array('required' => '(Campo requerido)')),
			'empresa'	=> new sfValidatorPass(),
      'telefono'	=> new sfValidatorPass(),
      'email'	=> new sfValidatorEmail(array(), array('required' => '(Campo requerido)', 'invalid' => '(email incorrecto)')),
      'comentarios'	=> new sfValidatorString(array(), array('required' => '(Campo requerido)')),
    ));

		$this->widgetSchema->setLabel('nombre', 'Nombre y Apellido');
		$this->widgetSchema->setLabel('email', 'E-mail (*)');
		$this->widgetSchema->setLabel('telefono', 'Teléfono');
		
		$this->widgetSchema->setFormFormatterName('list');
	}
}





?>