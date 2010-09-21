<?php
require_once 'Kinghost.php';
class Mssql extends Kinghost
{
	
	// addBanco() {{{
	/**
	* Retorna os bancos mssql referente ao dominio passado como parametro
	* 
	* Example:
	* <code>
	* require_once 'Mssql.php';
	* $mssql = new Mssql('meu@email.com' , '123456');
	* print_r($mssql->addBanco($idDominio));
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
			$this->doCall( 'mssql/' , $param , 'POST');
			return @json_decode($this->getResponseBody() , true);
		}
		return false;
	}
	// }}}

	// alteraSenha() {{{
	/**
	* Retorna os bancos mssql referente ao dominio passado como parametro
	* 
	* Example:
	* <code>
	* require_once 'Mssql.php';
	* $mssql = new Mssql('meu@email.com' , '123456');
	* print_r($mssql->alteraSenha($param));
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
			$this->doCall( 'mssql/senha' , $param , 'PUT');
			return @json_decode($this->getResponseBody() , true);
		}
		return false;
	}
	// }}}

	// delBanco() {{{
	/**
	* Retorna os bancos mssql referente ao dominio passado como parametro
	* 
	* Example:
	* <code>
	* require_once 'Mssql.php';
	* $mssql = new Mssql('meu@email.com' , '123456');
	* print_r($mssql->delBanco($idDominio , $nomeBanco));
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
			$this->doCall( 'mssql/'.$idDominio.'/'.$nomeBanco , '' , 'DELETE');
			return @json_decode($this->getResponseBody() , true);
		}
		return false;
	}
	// }}}

	// getBancos() {{{
	/**
	* Retorna os bancos mssql referente ao dominio passado como parametro
	* 
	* Example:
	* <code>
	* require_once 'Mssql.php';
	* $mssql = new Mssql('meu@email.com' , '123456');
	* print_r($mssql->getVersao($idDominio));
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
			$this->doCall( 'mssql/'.$idDominio , '' , 'GET');
			return @json_decode($this->getResponseBody() , true);
		}
		return false;
	}
	// }}}

	// getVersao() {{{
	/**
	* Retorna a versão dos bancos mssql referente ao dominio passado como parametro
	* 
	* Example:
	* <code>
	* require_once 'Mssql.php';
	* $mssql = new Mssql('meu@email.com' , '123456');
	* print_r($mssql->getVersao($idDominio));
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
			$this->doCall( 'mssql/versao/'.$idDominio , '' , 'GET');
			return @json_decode($this->getResponseBody() , true);
		}
		return false;
	}
	// }}}

	// getDadosBancos() {{{
	/**
	* Retorna os bancos mssql referente ao dominio passado como parametro
	* 
	* Example:
	* <code>
	* require_once 'Mssql.php';
	* $mssql = new Mssql('meu@email.com' , '123456');
	* print_r($mssql->getDadosBancos($idDominio , $nomeBanco));
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
			$this->doCall( 'mssql/dados/'.$idDominio.'/'.$nomeBanco , '' , 'GET');
			return @json_decode($this->getResponseBody() , true);
		}
		return false;
	}
	// }}}
}
?>