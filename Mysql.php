<?php
require_once 'Kinghost.php';

class Mysql extends Kinghost
{

    // addBanco() {{{
    /**
     * Retorna os bancos mysql referente ao dominio passado como parametro
     *
     * Example:
     * <code>
     * require_once 'Mysql.php';
     * $mysql = new Mysql('meu@email.com' , '123456');
     * print_r($mysql->addBanco($idDominio , $obs));
     * </code>
     *
     * @param  string [optional]
     * @access public
     * @return object
     */
    public function addBanco($param = false)
    {
        if ($param !== false && is_array($param)) {
            $this->doCall('mysql/', $param, 'POST');
            return @json_decode($this->getResponseBody(), true);
        }
        return false;
    }
    // }}}

    // alteraSenha() {{{
    /**
     * Retorna os bancos mysql referente ao dominio passado como parametro
     *
     * Example:
     * <code>
     * require_once 'Mysql.php';
     * $mysql = new Mysql('meu@email.com' , '123456');
     * print_r($mysql->alteraSenha($param));
     * </code>
     *
     * @param  string [optional]
     * @access public
     * @return object
     */
    public function alteraSenha($param = false)
    {
        if ($param !== false && is_array($param)) {
            $this->doCall('mysql/senha', $param, 'PUT');
            return @json_decode($this->getResponseBody(), true);
        }
        return false;
    }
    // }}}

    // alteraObs() {{{
    /**
     * Retorna os bancos mysql referente ao dominio passado como parametro
     *
     * Example:
     * <code>
     * require_once 'Mysql.php';
     * $mysql = new Mysql('meu@email.com' , '123456');
     * print_r($mysql->alteraObs($param));
     * </code>
     *
     * @param  string [optional]
     * @access public
     * @return object
     */
    public function alteraObs($param = false)
    {
        if ($param !== false && is_array($param)) {
            $this->doCall('mysql/obs', $param, 'PUT');
            return @json_decode($this->getResponseBody(), true);
        }
        return false;
    }
    // }}}

    // delBanco() {{{
    /**
     * Retorna os bancos mysql referente ao dominio passado como parametro
     *
     * Example:
     * <code>
     * require_once 'Mysql.php';
     * $mysql = new Mysql('meu@email.com' , '123456');
     * print_r($mysql->delBanco($idDominio , $nomeBanco));
     * </code>
     *
     * @param  string [optional]
     * @access public
     * @return object
     */
    public function delBanco($idDominio, $nomeBanco)
    {
        if ($idDominio !== false) {
            $this->doCall('mysql/' . $idDominio . '/' . $nomeBanco, '', 'DELETE');
            return @json_decode($this->getResponseBody(), true);
        }
        return false;
    }
    // }}}

    // getBancos() {{{
    /**
     * Retorna os bancos mysql referente ao dominio passado como parametro
     *
     * Example:
     * <code>
     * require_once 'Mysql.php';
     * $mysql = new Mysql('meu@email.com' , '123456');
     * print_r($mysql->getVersao($idDominio));
     * </code>
     *
     * @param  string [optional]
     * @access public
     * @return object
     */
    public function getBancos($idDominio = false)
    {
        if ($idDominio !== false) {
            $this->doCall('mysql/' . $idDominio, '', 'GET');
            return @json_decode($this->getResponseBody(), true);
        }
        return false;
    }
    // }}}

    // getVersao() {{{
    /**
     * Retorna a vers�o dos bancos mysql referente ao dominio passado como parametro
     *
     * Example:
     * <code>
     * require_once 'Mysql.php';
     * $mysql = new Mysql('meu@email.com' , '123456');
     * print_r($mysql->getVersao($idDominio));
     * </code>
     *
     * @param  string [optional]
     * @access public
     * @return object
     */
    public function getVersao($idDominio = false)
    {
        if ($idDominio !== false) {
            $this->doCall('mysql/versao/' . $idDominio, '', 'GET');
            return @json_decode($this->getResponseBody(), true);
        }
        return false;
    }
    // }}}

    // getSuporteInnodb() {{{
    /**
     * Retorna a vers�o dos bancos mysql referente ao dominio passado como parametro
     *
     * Example:
     * <code>
     * require_once 'Mysql.php';
     * $mysql = new Mysql('meu@email.com' , '123456');
     * print_r($mysql->getSuporteInnodb($idDominio));
     * </code>
     *
     * @param  string [optional]
     * @access public
     * @return object
     */
    public function getSuporteInnodb($idDominio = false)
    {
        if ($idDominio !== false) {
            $this->doCall('mysql/suporteInnodb/' . $idDominio, '', 'GET');
            return @json_decode($this->getResponseBody(), true);
        }
        return false;
    }
    // }}}

    // getDadosBancos() {{{
    /**
     * Retorna os bancos mysql referente ao dominio passado como parametro
     *
     * Example:
     * <code>
     * require_once 'Mysql.php';
     * $mysql = new Mysql('meu@email.com' , '123456');
     * print_r($mysql->getDadosBancos($idDominio , $nomeBanco));
     * </code>
     *
     * @param  string [optional]
     * @access public
     * @return object
     */
    public function getDadosBancos($idDominio = false, $nomeBanco = false)
    {
        if ($idDominio !== false) {
            $this->doCall('mysql/dados/' . $idDominio . '/' . $nomeBanco, '', 'GET');
            return @json_decode($this->getResponseBody(), true);
        }
        return false;
    }
    // }}}
}