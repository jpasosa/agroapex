<?php

/**
 * contacto actions.
 *
 * @package    symfony
 * @subpackage contacto
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contactoActions extends aEngineActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
	
  public function executeIndex(sfWebRequest $request)
  {
		$this->form = new ContactForm();
  }

  public function executeSend(sfWebRequest $request)
  {
		$this->form = new ContactForm();
//		$this->form->bind($request->getPostParameters());
		//echo var_export($this->form->hasErrors(),true);
		//echo var_export($request->getPostParameters(),true);
		
		$this->form->bind($request->getParameter('contact'));
		//$this->form->renderGlobalErrors() ;die;
		if ($this->form->isValid()){
			$cuerpo = 'Nombre: '.$this->form->getValue('nombre')."\n\n";
			$cuerpo .= 'Email: '.$this->form->getValue('email')."\n\n";
			$cuerpo .= 'Teléfono: '.$this->form->getValue('telefono')."\n\n";
			$cuerpo .= 'Comentarios: '.$this->form->getValue('comentarios')."\n";
			
			//todo: pasar al app.yml
			$from = array($this->form->getValue('email') => $this->form->getValue('nombre'));
			
			$this->getMailer()->composeAndSend(
				$from,
				'ferbal@cooperativahormigon.com.ar',
				'Agroapex :: agroapex',
				$cuerpo
			);
		}else{
			$this->setTemplate('index');
		}
  }
}












