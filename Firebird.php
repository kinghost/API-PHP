<?php
require_once 'Kinghost.php';
class Firebird extends Kinghost
{
	
	// addBanco() {{{
	/**
	* Retorna os bancos firebird referente ao dominio passado como parametro
	* 
	* Example:
	* <code>
	* require_once 'Firebird.php';
	* $firebird = new Firebird('meu@email.com' , '123456');
	* print_r($firebird->addBanco($idDominio));
	* </code>
	*
	* @param  string[optional]
	* @access public
	* @return object
	*/
	public function addBanco( $param = false)
	{
		if($param !== false && is_array($param))
		{
			$this->doCall( 'firebird/' , $param , 'POST');
			return @json_decode($this->getResponseBody() , true);
		}
		return false;
	}
	// }}}
	
	// alteraSenha() {{{
	/**
	* Retorna os bancos firebird referente ao dominio passado como parametro
	* 
	* Example:
	* <code>
	* require_once 'Firebird.php';
	* $firebird = new Firebird('meu@email.com' , '123456');
	* print_r($firebird->alteraSenha($param));
	* </code>
	*
	* @param  string[optional]
	* @access public
	* @return object
	*/
	public function alteraSenha( $param = false)
	{
		if($param !== false && is_array($param))
		{
			$this->doCall( 'firebird/senha' , $param , 'PUT');
			return @json_decode($this->getResponseBody() , true);
		}
		return false;
	}
	// }}}

	// delBanco() {{{
	/**
	* Retorna os bancos firebird referente ao dominio passado como parametro
	* 
	* Example:
	* <code>
	* require_once 'Firebird.php';
	* $firebird = new Firebird('meu@email.com' , '123456');
	* print_r($firebird->delBanco($idDominio , $nomeBanco));
	* </code>
	*
	* @param  string[optional]
	* @access public
	* @return object
	*/
	public function delBanco($idDominio , $nomeBanco)
	{
		if($idDominio !== false )
		{
			$this->doCall( 'firebird/'.$idDominio.'/'.$nomeBanco , '' , 'DELETE');
			return @json_decode($this->getResponseBody() , true);
		}
		return false;
	}
	// }}}

	// getBancos() {{{
	/**
	* Retorna os bancos firebird referente ao dominio passado como parametro
	* 
	* Example:
	* <code>
	* require_once 'Firebird.php';
	* $firebird = new Firebird('meu@email.com' , '123456');
	* print_r($firebird->getVersao($idDominio));
	* </code>
	*
	* @param  string[optional]
	* @access public
	* @return object
	*/
	public function getBancos( $idDominio = false)
	{
		if($idDominio !== false)
		{
			$this->doCall( 'firebird/'.$idDominio , '' , 'GET');
			return @json_decode($this->getResponseBody() , true);
		}
		return false;
	}
	// }}}

	// getVersao() {{{
	/**
	* Retorna a versão dos bancos firebird referente ao dominio passado como parametro
	* 
	* Example:
	* <code>
	* require_once 'Firebird.php';
	* $firebird = new Firebird('meu@email.com' , '123456');
	* print_r($firebird->getVersao($idDominio));
	* </code>
	*
	* @param  string[optional]
	* @access public
	* @return object
	*/
	public function getVersao( $idDominio = false)
	{
		if($idDominio !== false)
		{
			$this->doCall( 'firebird/versao/'.$idDominio , '' , 'GET');
			return @json_decode($this->getResponseBody() , true);
		}
		return false;
	}
	// }}}
	
	// getDadosBancos() {{{
	/**
	* Retorna os bancos firebird referente ao dominio passado como parametro
	* 
	* Example:
	* <code>
	* require_once 'Firebird.php';
	* $firebird = new Firebird('meu@email.com' , '123456');
	* print_r($firebird->getDadosBancos($idDominio , $nomeBanco));
	* </code>
	*
	* @param  string[optional]
	* @access public
	* @return object
	*/
	public function getDadosBancos( $idDominio = false , $nomeBanco = false)
	{
		if($idDominio !== false)
		{
			$this->doCall( 'firebird/dados/'.$idDominio.'/'.$nomeBanco , '' , 'GET');
			return @json_decode($this->getResponseBody() , true);
		}
		return false;
	}
	// }}}
}
?>