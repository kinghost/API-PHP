<?php
require_once 'Kinghost.php';
class Ftp extends Kinghost
{
	// alteraSenhaFtp() {{{
	/**
	* Altera a senha de FTP do dominio passado com o parametro ID
	* 
	* Example:
	* <code>
	* require_once 'Dominio.php';
	* $adsl = new Dominio('meu@email.com' , '123456');
	*
	* print_r($adsl->alteraSenhaFtp($param));
	* </code>
	*
	* @access public
	* @return object
	*/		
	public function alteraSenhaFtp( $param )
	{
		$this->doCall( 'ftp/senha' , $param , 'PUT');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}

	// getUsuarios() {{{
	/**
	* Altera a senha de FTP do dominio passado com o parametro ID
	* 
	* Example:
	* <code>
	* require_once 'Dominio.php';
	* $adsl = new Dominio('meu@email.com' , '123456');
	* print_r($adsl->getUsuarios($idDominio));
	* </code>
	*
	* @access public
	* @return object
	*/	
	public function getUsuarios( $idDominio )
	{
		$this->doCall( 'ftp/'.$idDominio , '' , 'GET');
		return @json_decode($this->getResponseBody() , true);			
	}
	// }}}
}
?>