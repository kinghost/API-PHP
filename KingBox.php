<?php
require_once 'Kinghost.php';
class KingBox extends Kinghost
{
	// getInstalacoes() {{{
	/**
	* Retorna todas as instalaões realizadas via KingBox
	* 
	* Example:
	* <code>
	* require_once 'KingBox.php';
	* $kingbox = new KingBox('meu@email.com' , '123456');
	* print_r($kingbox->getInstalacoes('1234'));
	* </code>
	*
	* @access public
	* @return object
	*/		
	public function getInstalacoes($idDominio)
	{
		$this->doCall( 'kingbox/'.$idDominio , '' , 'GET');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}

	// getInstalacao() {{{
	/**
	* Retorna os dados de uma instalação KingBox em específico
	* 
	* Example:
	* <code>
	* require_once 'KingBox.php';
	* $kingbox = new KingBox('meu@email.com' , '123456');
	* print_r($kingbox->getInstalacao('123456','1234'));
	* </code>
	*
	* @access public
	* @return object
	*/		
	public function getInstalacao($idinstalacao, $idDominio)
	{
		$this->doCall( 'kingbox/instalacao/'.$idinstalacao."/".$idDominio , '' , 'GET');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
	

	// instalaWordpress() {{{
	/**
	* Instala CMS wordpress
	* 
	* Example:
	* <code>
	* require_once 'KingBox.php';
	* $kingbox = new KingBox('meu@email.com' , '123456');
	* $param = array(
	* 	'idDominio' 	=> '123',
	* 	'diretorio' 	=> 'wordpress',
	* 	'senha'			=> '102030'
	* );	
	* print_r($kingbox->instalaWordpress($param));
	* </code>
	*
	* @access public
	* @return object
	*/	
	public function instalaWordpress( $param )
	{
		$this->doCall( 'kingbox/wordpress' , $param , 'POST');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
	// instalaJoomla() {{{
	/**
	* Instala CMS joomla
	* 
	* Example:
	* <code>
	* require_once 'KingBox.php';
	* $kingbox = new KingBox('meu@email.com' , '123456');
	* $param = array(
	* 	'idDominio' 	=> '123',
	* 	'diretorio' 	=> 'joomla',
	* 	'senha'			=> '102030'
	* );	
	* print_r($kingbox->instalaJoomla($param));
	* </code>
	*
	* @access public
	* @return object
	*/	
	public function instalaJoomla( $param )
	{
		$this->doCall( 'kingbox/joomla' , $param , 'POST');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
	// instalaOsCommerce() {{{
	/**
	* Instala CMS oscommerce
	* 
	* Example:
	* <code>
	* require_once 'KingBox.php';
	* $kingbox = new KingBox('meu@email.com' , '123456');
	* $param = array(
	* 	'idDominio' 	=> '123',
	* 	'diretorio' 	=> 'oscommerce',
	* 	'senha'			=> '102030'
	* );	
	* print_r($kingbox->instalaOsCommerce($param));
	* </code>
	*
	* @access public
	* @return object
	*/	
	public function instalaOsCommerce( $param )
	{
		$this->doCall( 'kingbox/oscommerce' , $param , 'POST');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
	// instalaPhpBB() {{{
	/**
	* Instala CMS phpbb
	* 
	* Example:
	* <code>
	* require_once 'KingBox.php';
	* $kingbox = new KingBox('meu@email.com' , '123456');
	* $param = array(
	* 	'idDominio' 	=> '123',
	* 	'diretorio' 	=> 'phpbb',
	* 	'senha'			=> '102030'
	* );	
	* print_r($kingbox->instalaPhpBB($param));
	* </code>
	*
	* @access public
	* @return object
	*/	
	public function instalaPhpBB( $param )
	{
		$this->doCall( 'kingbox/phpbb' , $param , 'POST');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
	// instalaDotProject() {{{
	/**
	* Instala CMS dotproject
	* 
	* Example:
	* <code>
	* require_once 'KingBox.php';
	* $kingbox = new KingBox('meu@email.com' , '123456');
	* $param = array(
	* 	'idDominio' 	=> '123',
	* 	'diretorio' 	=> 'dotproject',
	* 	'senha'			=> '102030'
	* );	
	* print_r($kingbox->instalaDotProject($param));
	* </code>
	*
	* @access public
	* @return object
	*/	
	public function instalaDotProject( $param )
	{
		$this->doCall( 'kingbox/dotproject' , $param , 'POST');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
	// instalaCoopermine() {{{
	/**
	* Instala CMS coopermine
	* 
	* Example:
	* <code>
	* require_once 'KingBox.php';
	* $kingbox = new KingBox('meu@email.com' , '123456');
	* $param = array(
	* 	'idDominio' 	=> '123',
	* 	'diretorio' 	=> 'coopermine',
	* 	'senha'			=> '102030'
	* );	
	* print_r($kingbox->instalaCoopermine($param));
	* </code>
	*
	* @access public
	* @return object
	*/	
	public function instalaCoopermine( $param )
	{
		$this->doCall( 'kingbox/coopermine' , $param , 'POST');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
	// instalaDrupal() {{{
	/**
	* Instala CMS drupal
	* 
	* Example:
	* <code>
	* require_once 'KingBox.php';
	* $kingbox = new KingBox('meu@email.com' , '123456');
	* $param = array(
	* 	'idDominio' 	=> '123',
	* 	'diretorio' 	=> 'drupal',
	* 	'senha'			=> '102030'
	* );	
	* print_r($kingbox->instalaDrupal($param));
	* </code>
	*
	* @access public
	* @return object
	*/	
	public function instalaDrupal( $param )
	{
		$this->doCall( 'kingbox/drupal' , $param , 'POST');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
	// instalaMagento() {{{
	/**
	* Instala CMS magento
	* 
	* Example:
	* <code>
	* require_once 'KingBox.php';
	* $kingbox = new KingBox('meu@email.com' , '123456');
	* $param = array(
	* 	'idDominio' 	=> '123',
	* 	'diretorio' 	=> 'magento',
	* 	'senha'			=> '102030'
	* );	
	* print_r($kingbox->instalaMagento($param));
	* </code>
	*
	* @access public
	* @return object
	*/	
	public function instalaMagento( $param )
	{
		$this->doCall( 'kingbox/magento' , $param , 'POST');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
	// instalaMoodle() {{{
	/**
	* Instala CMS moodle
	* 
	* Example:
	* <code>
	* require_once 'KingBox.php';
	* $kingbox = new KingBox('meu@email.com' , '123456');
	* $param = array(
	* 	'idDominio' 	=> '123',
	* 	'diretorio' 	=> 'moodle',
	* 	'senha'			=> '102030'
	* );	
	* print_r($kingbox->instalaMoodle($param));
	* </code>
	*
	* @access public
	* @return object
	*/	
	public function instalaMoodle( $param )
	{
		$this->doCall( 'kingbox/moodle' , $param , 'POST');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
	// instalaMambo() {{{
	/**
	* Instala CMS mambo
	* 
	* Example:
	* <code>
	* require_once 'KingBox.php';
	* $kingbox = new KingBox('meu@email.com' , '123456');
	* $param = array(
	* 	'idDominio' 	=> '123',
	* 	'diretorio' 	=> 'mambo',
	* 	'senha'			=> '102030'
	* );	
	* print_r($kingbox->instalaMambo($param));
	* </code>
	*
	* @access public
	* @return object
	*/	
	public function instalaMambo( $param )
	{
		$this->doCall( 'kingbox/mambo' , $param , 'POST');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
	// instalaPhpNuke() {{{
	/**
	* Instala CMS phpnuke
	* 
	* Example:
	* <code>
	* require_once 'KingBox.php';
	* $kingbox = new KingBox('meu@email.com' , '123456');
	* $param = array(
	* 	'idDominio' 	=> '123',
	* 	'diretorio' 	=> 'phpnuke',
	* 	'senha'			=> '102030'
	* );	
	* print_r($kingbox->instalaPhpNuke($param));
	* </code>
	*
	* @access public
	* @return object
	*/	
	public function instalaPhpNuke( $param )
	{
		$this->doCall( 'kingbox/phpnuke' , $param , 'POST');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
	// instalaDragonFly() {{{
	/**
	* Instala CMS dragonfly
	* 
	* Example:
	* <code>
	* require_once 'KingBox.php';
	* $kingbox = new KingBox('meu@email.com' , '123456');
	* $param = array(
	* 	'idDominio' 	=> '123',
	* 	'diretorio' 	=> 'dragonfly',
	* 	'senha'			=> '102030'
	* );	
	* print_r($kingbox->instalaDragonFly($param));
	* </code>
	*
	* @access public
	* @return object
	*/	
	public function instalaDragonFly( $param )
	{
		$this->doCall( 'kingbox/dragonfly' , $param , 'POST');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
	// instalaExpressionEngine() {{{
	/**
	* Instala CMS expressionengine
	* 
	* Example:
	* <code>
	* require_once 'KingBox.php';
	* $kingbox = new KingBox('meu@email.com' , '123456');
	* $param = array(
	* 	'idDominio' 	=> '123',
	* 	'diretorio' 	=> 'expressionengine',
	* 	'senha'			=> '102030'
	* );	
	* print_r($kingbox->instalaExpressionEngine($param));
	* </code>
	*
	* @access public
	* @return object
	*/	
	public function instalaExpressionEngine( $param )
	{
		$this->doCall( 'kingbox/expressionengine' , $param , 'POST');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
	// instalaNucleus() {{{
	/**
	* Instala CMS nucleus
	* 
	* Example:
	* <code>
	* require_once 'KingBox.php';
	* $kingbox = new KingBox('meu@email.com' , '123456');
	* $param = array(
	* 	'idDominio' 	=> '123',
	* 	'diretorio' 	=> 'nucleus',
	* 	'senha'			=> '102030'
	* );	
	* print_r($kingbox->instalaNucleus($param));
	* </code>
	*
	* @access public
	* @return object
	*/	
	public function instalaNucleus( $param )
	{
		$this->doCall( 'kingbox/nucleus' , $param , 'POST');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
	// instalaXoops() {{{
	/**
	* Instala CMS xoops
	* 
	* Example:
	* <code>
	* require_once 'KingBox.php';
	* $kingbox = new KingBox('meu@email.com' , '123456');
	* $param = array(
	* 	'idDominio' 	=> '123',
	* 	'diretorio' 	=> 'xoops',
	* 	'senha'			=> '102030'
	* );	
	* print_r($kingbox->instalaXoops($param));
	* </code>
	*
	* @access public
	* @return object
	*/	
	public function instalaXoops( $param )
	{
		$this->doCall( 'kingbox/xoops' , $param , 'POST');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
	// instalaB2Evolution() {{{
	/**
	* Instala CMS b2evolution
	* 
	* Example:
	* <code>
	* require_once 'KingBox.php';
	* $kingbox = new KingBox('meu@email.com' , '123456');
	* $param = array(
	* 	'idDominio' 	=> '123',
	* 	'diretorio' 	=> 'b2evolution',
	* 	'senha'			=> '102030'
	* );	
	* print_r($kingbox->instalaB2Evolution($param));
	* </code>
	*
	* @access public
	* @return object
	*/	
	public function instalaB2Evolution( $param )
	{
		$this->doCall( 'kingbox/b2evolution' , $param , 'POST');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
	// instalaSugarCRM() {{{
	/**
	* Instala CMS sugarcrm
	* 
	* Example:
	* <code>
	* require_once 'KingBox.php';
	* $kingbox = new KingBox('meu@email.com' , '123456');
	* $param = array(
	* 	'idDominio' 	=> '123',
	* 	'diretorio' 	=> 'sugarcrm',
	* 	'senha'			=> '102030'
	* );	
	* print_r($kingbox->instalaSugarCRM($param));
	* </code>
	*
	* @access public
	* @return object
	*/	
	public function instalaSugarCRM( $param )
	{
		$this->doCall( 'kingbox/sugarcrm' , $param , 'POST');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
	// instalaOneOrZero() {{{
	/**
	* Instala CMS oneorzero
	* 
	* Example:
	* <code>
	* require_once 'KingBox.php';
	* $kingbox = new KingBox('meu@email.com' , '123456');
	* $param = array(
	* 	'idDominio' 	=> '123',
	* 	'diretorio' 	=> 'oneorzero',
	* 	'senha'			=> '102030'
	* );	
	* print_r($kingbox->instalaOneOrZero($param));
	* </code>
	*
	* @access public
	* @return object
	*/	
	public function instalaOneOrZero( $param )
	{
		$this->doCall( 'kingbox/oneorzero' , $param , 'POST');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
	// instalaMediaWiki() {{{
	/**
	* Instala CMS mediawiki
	* 
	* Example:
	* <code>
	* require_once 'KingBox.php';
	* $kingbox = new KingBox('meu@email.com' , '123456');
	* $param = array(
	* 	'idDominio' 	=> '123',
	* 	'diretorio' 	=> 'mediawiki',
	* 	'senha'			=> '102030'
	* );	
	* print_r($kingbox->instalaMediaWiki($param));
	* </code>
	*
	* @access public
	* @return object
	*/	
	public function instalaMediaWiki( $param )
	{
		$this->doCall( 'kingbox/mediawiki' , $param , 'POST');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
	// instalaPrestaShop() {{{
	/**
	* Instala CMS prestashop
	* 
	* Example:
	* <code>
	* require_once 'KingBox.php';
	* $kingbox = new KingBox('meu@email.com' , '123456');
	* $param = array(
	* 	'idDominio' 	=> '123',
	* 	'diretorio' 	=> 'prestashop',
	* 	'senha'			=> '102030'
	* );	
	* print_r($kingbox->instalaPrestaShop($param));
	* </code>
	*
	* @access public
	* @return object
	*/	
	public function instalaPrestaShop( $param )
	{
		$this->doCall( 'kingbox/prestashop' , $param , 'POST');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
	// instalaFengOffice() {{{
	/**
	* Instala CMS fengoffice
	* 
	* Example:
	* <code>
	* require_once 'KingBox.php';
	* $kingbox = new KingBox('meu@email.com' , '123456');
	* $param = array(
	* 	'idDominio' 	=> '123',
	* 	'diretorio' 	=> 'fengoffice',
	* 	'senha'			=> '102030'
	* );	
	* print_r($kingbox->instalaFengOffice($param));
	* </code>
	*
	* @access public
	* @return object
	*/	
	public function instalaFengOffice( $param )
	{
		$this->doCall( 'kingbox/fengoffice' , $param , 'POST');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
	// instalaLiveZilla() {{{
	/**
	* Instala CMS livezilla
	* 
	* Example:
	* <code>
	* require_once 'KingBox.php';
	* $kingbox = new KingBox('meu@email.com' , '123456');
	* $param = array(
	* 	'idDominio' 	=> '123',
	* 	'diretorio' 	=> 'livezilla',
	* 	'senha'			=> '102030'
	* );	
	* print_r($kingbox->instalaLiveZilla($param));
	* </code>
	*
	* @access public
	* @return object
	*/	
	public function instalaLiveZilla( $param )
	{
		$this->doCall( 'kingbox/livezilla' , $param , 'POST');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
	// instalaVirtuaStore() {{{
	/**
	* Instala CMS virtuastore
	* 
	* Example:
	* <code>
	* require_once 'KingBox.php';
	* $kingbox = new KingBox('meu@email.com' , '123456');
	* $param = array(
	* 	'idDominio' 	=> '123',
	* 	'diretorio' 	=> 'virtuastore',
	* 	'senha'			=> '102030'
	* );	
	* print_r($kingbox->instalaVirtuaStore($param));
	* </code>
	*
	* @access public
	* @return object
	*/	
	public function instalaVirtuaStore( $param )
	{
		$this->doCall( 'kingbox/virtuastore' , $param , 'POST');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
	// instalaBlogEngine() {{{
	/**
	* Instala CMS blogengine
	* 
	* Example:
	* <code>
	* require_once 'KingBox.php';
	* $kingbox = new KingBox('meu@email.com' , '123456');
	* $param = array(
	* 	'idDominio' 	=> '123',
	* 	'diretorio' 	=> 'blogengine',
	* 	'senha'			=> '102030'
	* );	
	* print_r($kingbox->instalaBlogEngine($param));
	* </code>
	*
	* @access public
	* @return object
	*/	
	public function instalaBlogEngine( $param )
	{
		$this->doCall( 'kingbox/blogengine' , $param , 'POST');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
	// instalaDasBlog() {{{
	/**
	* Instala CMS dasblog
	* 
	* Example:
	* <code>
	* require_once 'KingBox.php';
	* $kingbox = new KingBox('meu@email.com' , '123456');
	* $param = array(
	* 	'idDominio' 	=> '123',
	* 	'diretorio' 	=> 'dasblog',
	* 	'senha'			=> '102030'
	* );	
	* print_r($kingbox->instalaDasBlog($param));
	* </code>
	*
	* @access public
	* @return object
	*/	
	public function instalaDasBlog( $param )
	{
		$this->doCall( 'kingbox/dasblog' , $param , 'POST');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
	// excluiInstalacao() {{{
	/**
	* Exclui uma instalação KingBox
	* 
	* Example:
	* <code>
	* require_once 'KingBox.php';
	* $kingbox = new KingBox('meu@email.com' , '123456');
	* print_r($kingbox->excluiInstalacao('123456','1234'));
	* </code>
	*
	* @access public
	* @return object
	*/	
	public function excluiInstalacao( $idinstalacao, $idDominio )
	{
		$this->doCall( 'kingbox/delete/'.$idinstalacao."/".$idDominio , '' , 'DELETE');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
}
?>