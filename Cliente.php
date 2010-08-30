<?php
require_once 'Kinghost.php';
class Cliente extends Kinghost
{
	// addCliente() {{{
	/**
	* Chama o metodo que adiciona um cliente de revenda em sua conta
	* 
	* Example:
	* <code>
	* require_once 'Cliente.php';
	* $cliente = new Cliente('meu@email.com' , '123456');
	* print_r($cliente->addCliente($param));
	* </code>
	*
	* @access public
	* @return object
	*/
	public function addClientes( $param )
	{
		$this->doCall( 'cliente/' , $param , 'POST');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
	// setClientes() {{{
	/**
	* Chama o metodo que adiciona um cliente de revenda em sua conta
	* 
	* Example:
	* <code>
	* require_once 'Cliente.php';
	* $cliente = new Cliente('meu@email.com' , '123456');
	* print_r($cliente->addCliente($param));
	* </code>
	*
	* @access public
	* @return object
	*/
	public function setClientes( $param )
	{
		$this->doCall( 'cliente/' , $param , 'PUT');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}	

	// delCliente() {{{
	/**
	* Chama o metodo que adiciona um cliente de revenda em sua conta
	* 
	* Example:
	* <code>
	* require_once 'Cliente.php';
	* $cliente = new Cliente('meu@email.com' , '123456');
	* print_r($cliente->delCliente($idCliente));
	* </code>
	*
	* @access public
	* @return object
	*/
	public function delClientes( $idCliente )
	{
		$this->doCall( 'cliente/'.$idCliente , '' , 'DELETE');
		return @json_decode($this->getResponseBody() ,  true);
	}
	// }}}		
	
	// getClientes() {{{
	/**
	* Retorna todos os clientes de sua conta
	* 
	* Example:
	* <code>
	* require_once 'Cliente.php';
	* $cliente = new Cliente('meu@email.com' , '123456');
	* print_r($cliente->getClientes());
	* </code>
	*
	* @access public
	* @return object
	*/
	public function getClientes( $idCliente = false)
	{
		if($idCliente !== false)
		{
			$this->doCall( 'cliente/'.$idCliente , '' , 'GET');
		}else{
			$this->doCall( 'cliente/' , '' , 'GET');
		}
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}

	// autenticaCliente() {{{
	/**
	* Retorna todos os clientes de sua conta
	* 
	* Example:
	* <code>
	* require_once 'Cliente.php';
	* $cliente = new Cliente('meu@email.com' , '123456');
	* print_r($cliente->autenticaCliente());
	* </code>
	*
	* @access public
	* @return object
	*/
	public function autenticaCliente( $param )
	{
		$this->doCall( 'cliente/autentica' , $param , 'PUT');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
}
?>