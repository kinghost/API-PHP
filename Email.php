<?php
require_once 'Kinghost.php';
class Email extends Kinghost
{
	// getEmails() {{{
	/**
	* Retorna todos os emails, redirecionamentos e conta pega-tudo (se existir)
	* 
	* Example:
	* <code>
	* require_once 'Email.php';
	* $email = new EMail('meu@email.com' , '123456');
	* print_r($email->getEmails('1234'));
	* </code>
	*
	* @access public
	* @return object
	*/		
	public function getEmails($idDominio)
	{
		$this->doCall( 'email/'.$idDominio , '' , 'GET');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
	
	// addEmail() {{{
	/**
	* Adiciona caixa postal. Tamanho em MB
	* 
	* Example:
	* <code>
	* require_once 'Email.php';
	* $email = new Email('meu@email.com' , '123456');
	* $param = array(
	* 	'idDominio' 	=> '123',
	* 	'caixa' 		=> 'email@dominio.com.br',
	* 	'senha'			=> '1q2w3eabc',
	* 	'tamanho'		=> '10'
	* );	
	* print_r($email->addEmail($param));
	* </code>
	*
	* @access public
	* @return object
	*/	
	public function addEmail( $param )
	{
		$this->doCall( 'email/addmailbox' , $param , 'POST');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
	// addAlias() {{{
	/**
	* Adiciona alias (redirecionamento) de email.
	* 
	* Example:
	* <code>
	* require_once 'Email.php';
	* $email = new Email('meu@email.com' , '123456');
	* $param = array(
	* 	'idDominio' 	=> '123',
	* 	'caixa' 		=> 'email@dominio.com.br',
	* 	'destino'		=> 'email1@dominio.com.br,email2@dominio.com.br,email3@dominio.com.br,email4@dominio.com.br'
	* );	
	* print_r($email->addAlias($param));
	* </code>
	*
	* @access public
	* @return object
	*/	
	public function addAlias( $param )
	{
		$this->doCall( 'email/addredir' , $param , 'POST');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}

	// addPegaTudo() {{{
	/**
	* Adiciona um conta pega-tudo.
	* 
	* Example:
	* <code>
	* require_once 'Email.php';
	* $email = new Email('meu@email.com' , '123456');
	* $param = array(
	* 	'idDominio' 	=> '123',
	* 	'destino'		=> 'email1@dominio.com.br'
	* );	
	* print_r($email->addPegaTudo($param));
	* </code>
	*
	* @access public
	* @return object
	*/	
	public function addPegaTudo( $param )
	{
		$this->doCall( 'email/addpegatudo' , $param , 'POST');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
	// addAutoResposta() {{{
	/**
	* Adiciona auto repsosta para um email
	* 
	* Example:
	* <code>
	* require_once 'Email.php';
	* $email = new Email('meu@email.com' , '123456');
	* $param = array(
	* 	'idDominio' 	=> '123',
	* 	'destino'		=> 'email@dominio.com.br',
	* 	'assunto'		=> 'Auto-Resposta',
	* 	'corpo'			=> 'Essa é uma auto-resposta'
	* );	
	* print_r($email->addAutoResposta($param));
	* </code>
	*
	* @access public
	* @return object
	*/	
	public function addAutoResposta( $param )
	{
		$this->doCall( 'email/addautoresposta' , $param , 'POST');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
	// addMulti() {{{
	/**
	* Adiciona adiciona multiplos recebimentos
	* 
	* Example:
	* <code>
	* require_once 'Email.php';
	* $email = new Email('meu@email.com' , '123456');
	* $param = array(
	* 	'idDominio' 	=> '123',
	* 	'caixa'			=> 'email@dominio.com.br',
	* 	'destino'		=> 'email1@dominio.com.br,email2@dominio.com.br,email3@dominio.com.br,email4@dominio.com.br'
	* );	
	* print_r($email->addMulti($param));
	* </code>
	*
	* @access public
	* @return object
	*/	
	public function addMulti( $param )
	{
		$this->doCall( 'email/addmulti' , $param , 'POST');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
	
	// editRedir() {{{
	/**
	* edita redirecionamento
	* 
	* Example:
	* <code>
	* require_once 'Email.php';
	* $email = new Email('meu@email.com' , '123456');
	* $param = array(
	* 	'idDominio' 	=> '123',
	* 	'caixa'			=> 'email@dominio.com.br',
	* 	'destino'		=> 'email1@dominio.com.br,email2@dominio.com.br,email3@dominio.com.br,email4@dominio.com.br'
	* );	
	* print_r($email->editRedir($param));
	* </code>
	*
	* @access public
	* @return object
	*/	
	public function editRedir( $param )
	{
		$this->doCall( 'email/editredir' , $param , 'PUT');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
	// editSenha() {{{
	/**
	* edita a senha de uma caixa postal
	* 
	* Example:
	* <code>
	* require_once 'Email.php';
	* $email = new Email('meu@email.com' , '123456');
	* $param = array(
	* 	'idDominio' 	=> '123',
	* 	'caixa'			=> 'email@dominio.com.br',
	* 	'senha'			=> '1qaz2wer43'
	* );	
	* print_r($email->editSenha($param));
	* </code>
	*
	* @access public
	* @return object
	*/	
	public function editSenha( $param )
	{
		$this->doCall( 'email/editsenha' , $param , 'PUT');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
	
	// editTamanho() {{{
	/**
	* edita tamanho de uma caixa postal (em MB)
	* 
	* Example:
	* <code>
	* require_once 'Email.php';
	* $email = new Email('meu@email.com' , '123456');
	* $param = array(
	* 	'idDominio' 	=> '123',
	* 	'caixa'			=> 'email@dominio.com.br',
	* 	'tamanho'		=> '15'
	* );	
	* print_r($email->editTamanho($param));
	* </code>
	*
	* @access public
	* @return object
	*/	
	public function editTamanho( $param )
	{
		$this->doCall( 'email/edittamanho' , $param , 'PUT');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
	// editStatus() {{{
	/**
	* edita status de uma caixa postal (ativo/inativo)
	* 
	* Example:
	* <code>
	* require_once 'Email.php';
	* $email = new Email('meu@email.com' , '123456');
	* $param = array(
	* 	'idDominio' 	=> '123',
	* 	'caixa'			=> 'email@dominio.com.br'
	* );	
	* print_r($email->editStatus($param));
	* </code>
	*
	* @access public
	* @return object
	*/	
	public function editStatus( $param )
	{
		$this->doCall( 'email/alterstatus' , $param , 'PUT');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
	// editPegaTudoStatus() {{{
	/**
	* edita status de uma caixa postal (ativo/inativo)
	* 
	* Example:
	* <code>
	* require_once 'Email.php';
	* $email = new Email('meu@email.com' , '123456');
	* $param = array(
	* 	'idDominio' 	=> '123'	
	* );	
	* print_r($email->editPegaTudoStatus($param));
	* </code>
	*
	* @access public
	* @return object
	*/	
	public function editPegaTudoStatus( $param )
	{
		$this->doCall( 'email/pegatudo/alterstatus' , $param , 'PUT');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
	// edutMulti() {{{
	/**
	* edita status de uma caixa postal (ativo/inativo)
	* 
	* Example:
	* <code>
	* require_once 'Email.php';
	* $email = new Email('meu@email.com' , '123456');
	* $param = array(
	* 	'idDominio' 	=> '123',
	* 	'caixa'			=> 'email@dominio.com.br',
	* 	'destino'		=> 'email1@dominio.com.br,email2@dominio.com.br,email3@dominio.com.br,email4@dominio.com.br'	
	* );	
	* print_r($email->edutMulti($param));
	* </code>
	*
	* @access public
	* @return object
	*/	
	public function edutMulti( $param )
	{
		$this->doCall( 'email/editmulti' , $param , 'PUT');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
	
	
	// delEmail() {{{
	/**
	* edita status de uma caixa postal (ativo/inativo)
	* 
	* Example:
	* <code>
	* require_once 'Email.php';
	* $email = new Email('meu@email.com' , '123456');
	* print_r($email->delEmail(123, 'email@dominio.com.br'));
	* </code>
	*
	* @access public
	* @return object
	*/	
	public function delEmail( $idDominio , $email )
	{
		$this->doCall( 'email/removemailbox/'.$idDominio.'/'.$email , '' , 'DELETE');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
	// delRedir() {{{
	/**
	* edita status de uma caixa postal (ativo/inativo)
	* 
	* Example:
	* <code>
	* require_once 'Email.php';
	* $email = new Email('meu@email.com' , '123456');
	* print_r($email->delRedir(123, 'email@dominio.com.br'));
	* </code>
	*
	* @access public
	* @return object
	*/	
	public function delRedir( $idDominio , $email )
	{
		$this->doCall( 'email/removeredir/'.$idDominio.'/'.$email , '' , 'DELETE');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
	// delAutoResposta() {{{
	/**
	* edita status de uma caixa postal (ativo/inativo)
	* 
	* Example:
	* <code>
	* require_once 'Email.php';
	* $email = new Email('meu@email.com' , '123456');
	* print_r($email->delAutoResposta(123, 'email@dominio.com.br'));
	* </code>
	*
	* @access public
	* @return object
	*/	
	public function delAutoResposta( $idDominio , $email )
	{
		$this->doCall( 'email/removeautoresposta/'.$idDominio.'/'.$email , '' , 'DELETE');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
	// delPegaTudo() {{{
	/**
	* edita status de uma caixa postal (ativo/inativo)
	* 
	* Example:
	* <code>
	* require_once 'Email.php';
	* $email = new Email('meu@email.com' , '123456');
	* print_r($email->delPegaTudo(123));
	* </code>
	*
	* @access public
	* @return object
	*/	
	public function delPegaTudo( $idDominio )
	{
		$this->doCall( 'email/removepegatudo/'.$idDominio.'/'.$email , '' , 'DELETE');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}	
}
?>