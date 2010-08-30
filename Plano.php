<?php
require_once 'Kinghost.php';
class Plano extends Kinghost
{
	// getPlanos() {{{
	/**
	* Retorna todos os planos de sua conta
	* 
	* Example:
	* <code>
	* require_once 'Plano.php';
	* $plano = new Plano('meu@email.com' , '123456');
	* print_r($plano->getPlanos());
	* </code>
	*
	* @param  string[optional]
	* @access public
	* @return object
	*/
	public function getPlanos( $idPlano = false)
	{
		if($idPlano !== false)
		{
			$this->doCall( 'plano/'.$idPlano , '' , 'GET');
		}else{
			$this->doCall( 'plano/' , '' , 'GET');
		}
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
	// setPlanos() {{{
	/**
	* Altera um plano de sua conta
	* 
	* Example:
	* <code>
	* require_once 'Plano.php';
	* $plano = new Plano('meu@email.com' , '123456');
	* print_r($plano->setPlanos($arrayPlano));
	* </code>
	*
	* @param  string[optional]
	* @access public
	* @return object
	*/
	public function setPlanos( $arrayPlano = false)
	{
		if($arrayPlano !== false)
		{
			$this->doCall( 'plano/' , $arrayPlano , 'PUT');
		}
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
	// addPlanos() {{{
	/**
	* Adiciona um plano a sua conta
	* 
	* Example:
	* <code>
	* require_once 'Plano.php';
	* $plano = new Plano('meu@email.com' , '123456');
	* print_r($plano->addPlanos($arrayPlano));
	* </code>
	*
	* @param  string[optional]
	* @access public
	* @return object
	*/
	public function addPlanos( $arrayPlano = false)
	{
		if($arrayPlano !== false)
		{
			$this->doCall( 'plano/' , $arrayPlano , 'POST');
		}
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
	// delPlanos() {{{
	/**
	* Exclui um plano de sua conta
	* 
	* Example:
	* <code>
	* require_once 'Plano.php';
	* $plano = new Plano('meu@email.com' , '123456');
	* print_r($plano->delPlanos($idPlano));
	* </code>
	*
	* @param  string[optional]
	* @access public
	* @return object
	*/
	public function delPlanos( $idPlano = false)
	{
		if($idPlano !== false)
		{
			$this->doCall( 'plano/'.$idPlano , '' , 'DELETE');
		}
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}	
	
	// getTecnologias() {{{
	/**
	* Retorna todas as tecnologias disponiveis para a plataforma informada
	* 
	* Example:
	* <code>
	* require_once 'Plano.php';
	* $plano = new Plano('meu@email.com' , '123456');
	* print_r($plano->getTecnologias('linux'));
	* </code>
	*
	* @param  string[optional]
	* @access public
	* @return object
	*/
	public function getTecnologias( $plataforma )
	{
		$this->doCall( 'plano/tecnologias/'.$plataforma , '' , 'GET');	
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}

	// getFormasPagamentos() {{{
	/**
	* Retorna todas as formas de pagamento disponiveis
	* 
	* Example:
	* <code>
	* require_once 'Plano.php';
	* $plano = new Plano('meu@email.com' , '123456');
	* print_r($plano->getFormasPagamentos());
	* </code>
	*
	* @param  string[optional]
	* @access public
	* @return object
	*/
	public function getFormasPagamentos()
	{
		$this->doCall( 'plano/pagamentos/formas' , '' , 'GET');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
}
?>