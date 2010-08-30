<?php
require_once 'Kinghost.php';
class Pgsql extends Kinghost
{
	
	// addBanco() {{{
	/**
	* Retorna os bancos pgsql referente ao dominio passado como parametro
	* 
	* Example:
	* <code>
	* require_once 'Pgsql.php';
	* $pgsql = new Pgsql('meu@email.com' , '123456');
	* print_r($pgsql->addBanco($idDominio));
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
			$this->doCall( 'pgsql/' , $param , 'POST');
			return @json_decode($this->getResponseBody() , true);
		}
		return false;
	}
	// }}}
	
	// alteraSenha() {{{
	/**
	* Retorna os bancos pgsql referente ao dominio passado como parametro
	* 
	* Example:
	* <code>
	* require_once 'Pgsql.php';
	* $pgsql = new Pgsql('meu@email.com' , '123456');
	* print_r($pgsql->alteraSenha($param));
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
			$this->doCall( 'pgsql/senha' , $param , 'PUT');
			return @json_decode($this->getResponseBody() , true);
		}
		return false;
	}
	// }}}

	// delBanco() {{{
	/**
	* Retorna os bancos pgsql referente ao dominio passado como parametro
	* 
	* Example:
	* <code>
	* require_once 'Pgsql.php';
	* $pgsql = new Pgsql('meu@email.com' , '123456');
	* print_r($pgsql->delBanco($idDominio , $nomeBanco));
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
			$this->doCall( 'pgsql/'.$idDominio.'/'.$nomeBanco , '' , 'DELETE');
			return @json_decode($this->getResponseBody() , true);
		}
		return false;
	}
	// }}}

	// getBancos() {{{
	/**
	* Retorna os bancos pgsql referente ao dominio passado como parametro
	* 
	* Example:
	* <code>
	* require_once 'Pgsql.php';
	* $pgsql = new Pgsql('meu@email.com' , '123456');
	* print_r($pgsql->getVersao($idDominio));
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
			$this->doCall( 'pgsql/'.$idDominio , '' , 'GET');
			return @json_decode($this->getResponseBody() , true);
		}
		return false;
	}
	// }}}

	// getVersao() {{{
	/**
	* Retorna a versão dos bancos pgsql referente ao dominio passado como parametro
	* 
	* Example:
	* <code>
	* require_once 'Pgsql.php';
	* $pgsql = new Pgsql('meu@email.com' , '123456');
	* print_r($pgsql->getVersao($idDominio));
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
			$this->doCall( 'pgsql/versao/'.$idDominio , '' , 'GET');
			return @json_decode($this->getResponseBody() , true);
		}
		return false;
	}
	// }}}
	
	// getDadosBancos() {{{
	/**
	* Retorna os bancos pgsql referente ao dominio passado como parametro
	* 
	* Example:
	* <code>
	* require_once 'Pgsql.php';
	* $pgsql = new Pgsql('meu@email.com' , '123456');
	* print_r($pgsql->getDadosBancos($idDominio , $nomeBanco));
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
			$this->doCall( 'pgsql/dados/'.$idDominio.'/'.$nomeBanco , '' , 'GET');
			return @json_decode($this->getResponseBody() , true);
		}
		return false;
	}
	// }}}	
}
?>