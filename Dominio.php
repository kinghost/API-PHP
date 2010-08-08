<?php
require_once 'Kinghost.php';
class Dominio extends Kinghost
{
	// getDominios() {{{
	/**
	* Retorna todos os dominios de sua conta
	*
	* Example:
	* <code>
	* require_once 'Dominio.php';
	* $adsl = new Dominio('meu@email.com' , '123456');
	* print_r($adsl->getDominios());
	* </code>
	*
	* @access public
	* @return object
	*/
	public function getDominios( $idCliente = null)
	{
		if( $idCliente === null)
		{
			$this->doCall( 'dominio/' , '' , 'GET');
		}else{
			$this->doCall( 'dominio/'.$idCliente , '' , 'GET');
		}
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}

	// getStatusSSH() {{{
	/**
	* Chama o metodo que retorna o status do SSH do domino
	*
	* Example:
	* <code>
	* require_once 'Dominio.php';
	* $adsl = new Dominio('meu@email.com' , '123456');
	* print_r($adsl->getDominios());
	* </code>
	*
	* @access public
	* @return object
	*/
	public function getStatusSSH( $idDominio = false)
	{
		$this->doCall( 'dominio/ssh/'.$idDominio.'/status/' , '' , 'GET');		
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
	// getDadosDominio() {{{
	/**
	* Retorna os dados de um dominio
	*
	* Example:
	* <code>
	* require_once 'Dominio.php';
	* $adsl = new Dominio('meu@email.com' , '123456');
	* print_r($adsl->getDadosDominio('14542'));
	* </code>
	*
	* @access public
	* @return object
	*/
	public function getDadosDominio( $idDominio )
	{
		$this->doCall( 'dominio/informacoes/'.$idDominio , '' , 'GET');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
	
	// getEspacoOcupado() {{{
	/**
	* Retorna o espaco ocupado por um dominio
	*
	* Example:
	* <code>
	* require_once 'Dominio.php';
	* $adsl = new Dominio('meu@email.com' , '123456');
	* print_r($adsl->getEspacoOcupado('14542'));
	* </code>
	*
	* @access public
	* @return object
	*/
	public function getEspacoOcupado( $idDominio )
	{
		$this->doCall( 'dominio/espacoOcupado/'.$idDominio , '' , 'GET');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
	// adicionarDominio() {{{
	/**
	* Retorna o espaco ocupado por um dominio
	*
	* Example:
	* <code>
	* require_once 'Dominio.php';
	* $dominio = new Dominio('meu@email.com' , '123456');
	* $param = array(
	* 				'idCliente' => '1224',
	* 				'dominio' => 'meudominio.com.br',
	* 				'senha' => '123mudar',
	* 				'planoId' => '12589',
	* 				'pagoAte' => date ('Y-m-d')
	* );
	* print_r($dominio->adicionarDominio($param));
	* </code>
	*
	* @access public
	* @return object
	*/
	public function adicionarDominio( $param )
	{
		$this->doCall( 'dominio/' , $param , 'POST');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
	// excluirDominio() {{{
	/**
	* Retorna o espaco ocupado por um dominio
	*
	* Example:
	* <code>
	* require_once 'Dominio.php';
	* $dominio = new Dominio('meu@email.com' , '123456');
	* print_r($dominio->excluirDominio($idDominio));
	* </code>
	*
	* @access public
	* @return object
	*/
	public function excluirDominio( $idDominio )
	{
		$this->doCall( 'dominio/'.$idDominio , '' , 'DELETE');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
	// editarDominio() {{{
	/**
	* Retorna o espaco ocupado por um dominio
	*
	* Example:
	* <code>
	* require_once 'Dominio.php';
	* $dominio = new Dominio('meu@email.com' , '123456');
	* print_r($dominio->editarDominio($param));
	* </code>
	*
	* @access public
	* @return object
	*/
	public function editaDominio( $param )
	{
		$this->doCall( 'dominio/' , $param , 'PUT');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
	// modSecurity() {{{
	/**
	* Retorna o espaco ocupado por um dominio
	*
	* Example:
	* <code>
	* require_once 'Dominio.php';
	* $dominio = new Dominio('meu@email.com' , '123456');
	* print_r($dominio->modSecurity($param));
	* </code>
	*
	* @access public
	* @return object
	*/
	public function modSecurity( $idDominio , $status )
	{
		$this->doCall( 'dominio/modSecurity/'.$idDominio.'/'.$status , '' , 'PUT');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
	// modRewrite() {{{
	/**
	* Retorna o espaco ocupado por um dominio
	*
	* Example:
	* <code>
	* require_once 'Dominio.php';
	* $dominio = new Dominio('meu@email.com' , '123456');
	* print_r($dominio->modRewrite($param));
	* </code>
	*
	* @access public
	* @return object
	*/
	public function modRewrite( $idDominio , $status )
	{
		$this->doCall( 'dominio/modRewrite/'.$idDominio.'/'.$status , '' , 'PUT');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}

	// modDeflate() {{{
	/**
	* Retorna o espaco ocupado por um dominio
	*
	* Example:
	* <code>
	* require_once 'Dominio.php';
	* $dominio = new Dominio('meu@email.com' , '123456');
	* print_r($dominio->modDeflate($param));
	* </code>
	*
	* @access public
	* @return object
	*/
	public function modDeflate( $idDominio , $status )
	{
		$this->doCall( 'dominio/modDeflate/'.$idDominio.'/'.$status , '' , 'PUT');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}

	// setStatusSsh() {{{
	/**
	* Retorna o espaco ocupado por um dominio
	*
	* Example:
	* <code>
	* require_once 'Dominio.php';
	* $dominio = new Dominio('meu@email.com' , '123456');
	* print_r($dominio->Ssh($param));
	* </code>
	*
	* @access public
	* @return object
	*/
	public function setStatusSsh( $array )
	{
		$idDominio = $array['idDominio'];
		$status = $array['dominioSSH'];
		$this->doCall( 'dominio/ssh/'.$idDominio.'/'.$status , '' , 'PUT');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	}
?>