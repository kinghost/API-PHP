<?php
require_once 'Kinghost.php';
class Adsl extends Kinghost
{
	// getPlanos() {{{
	/**
	* Retorna todos os planos disponiveis para contratar
	* 
	* Example:
	* <code>
	* require_once 'Adsl.php';
	* $adsl = new Adsl('meu@email.com' , '123456');
	* print_r($adsl->getPlanos());
	* </code>
	*
	* @access public
	* @return object
	*/		
	public function getPlanos()
	{
		$this->doCall( 'adsl/planos' , '' , 'GET');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}

	// getContas() {{{
	/**
	* Retorna todas as contas de adsl de seu cadastro
	* 
	* Example:
	* <code>
	* require_once 'Adsl.php';
	* $adsl = new Adsl('meu@email.com' , '123456');
	* print_r($adsl->getContas());
	* </code>
	*
	* @access public
	* @return object
	*/		
	public function getContas()
	{
		$this->doCall( 'adsl/' , '' , 'GET');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
	// verificaDisponibilidade() {{{
	/**
	* Verifica se um login de adsl esta disponivel para registro
	* 
	* Example:
	* <code>
	* require_once 'Adsl.php';
	* $adsl = new Adsl('meu@email.com' , '123456');
	* print_r($adsl->verificaDisponibilidade('meunovologin'));
	* </code>
	*
	* @access public
	* @return object
	*/
	public function verificaDisponibilidade( $usuario )
	{
		$this->doCall( 'adsl/disponibilidade/'.$usuario , '' , 'GET');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
	// trocaSenhaAdsl() {{{
	/**
	* Troca a senha de uma conta de adsl passando como parametro o id e a nova senha da mesma.
	* 
	* Example:
	* <code>
	* require_once 'Adsl.php';
	* $adsl = new Adsl('meu@email.com' , '123456');
	* print_r($adsl->trocaSenhaAdsl('1212' , '123456'));
	* </code>
	*
	* @access public
	* @return object
	*/	
	public function trocaSenhaAdsl( $idAdsl , $senha )
	{
		$param['idAdsl'] = $idAdsl;
		$param['senha'] = $senha;
		$this->doCall( 'adsl/senha', $param, 'PUT');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
	// getUltimasConexoes() {{{
	/**
	* Retorna o registro das ultimas conexoes efetuadas por uma conta
	* 
	* Example:
	* <code>
	* require_once 'Adsl.php';
	* $adsl = new Adsl('meu@email.com' , '123456');
	* print_r($adsl->getUltimasConexoes('1212'));
	* </code>
	*
	* @access public
	* @return object
	*/	
	public function getUltimasConexoes( $idAdsl )
	{
		$this->doCall( 'adsl/ultimasConexoes/'.$idAdsl , '' , 'GET');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}

	// cadastroAdsl() {{{
	/**
	* Cadastra uma nova conta de adsl passando os dados da mesma por array
	* 
	* Example:
	* <code>
	* require_once 'Adsl.php';
	* $adsl = new Adsl('meu@email.com' , '123456');
	* $param = array(
	* 	'login' => 'newuser',
	* 	'operadora' => 'BrasilTelecom',
	* 	'planoId'	=> 3,
	* 	'periodicidade'	=> 'trimensal'
	* );	
	* print_r($adsl->cadastroAdsl($param));
	* </code>
	*
	* @access public
	* @return object
	*/	
	public function cadastroAdsl( $param )
	{
		$this->doCall( 'adsl/' , $param , 'POST');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
	// excluiAdsl() {{{
	/**
	* Exclui o registro de uma conta de adsl informada pelo Id passado como parametro
	* 
	* Example:
	* <code>
	* require_once 'Adsl.php';
	* $adsl = new Adsl('meu@email.com' , '123456');
	* print_r($adsl->excluiAdsl('1212'));
	* </code>
	*
	* @access public
	* @return object
	*/	
	public function excluiAdsl( $idAdsl )
	{
		$this->doCall( 'adsl/'.$idAdsl , '' , 'DELETE');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
}
?>