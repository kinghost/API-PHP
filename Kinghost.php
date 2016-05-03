<?php
include 'KinghostException.php';

/**
 *    Classe para API Kinghost.net.
 *    Created on 04/11/2009
 * @author Diego B. Pimentel (diego@kinghost.com.br)
 * @version 1.0
 * @access public
 * @package API Kinghost.net
 * @example Classe Kinghost();
 */
class Kinghost
{
    /**
     * Atributo $username (mesmo email de acesso ao seu painel).
     * @var    string
     * @access private
     */
    private $username = 'email@dominio.com.br';

    /**
     * Atributo $password (senha gerada no painel da API).
     * @var    string
     * @access private
     */
    private $password = 'senha';

    // internal constant to enable/disable debugging
    const DEBUG = false;

    // url for the api
    private $KinghostApiUrl = 'https://api.kinghost.net/';

    // port for the Kinghost-api
    private $KinghostApiPort = 443;

    // current version
    const VERSION = '1.0';

    /**
     * Atributo $url.
     * @var string
     * @access private
     */
    private $url;

    /**
     * Atributo $verb.
     * @var string
     * @access private
     */
    private $verb;

    /**
     * Atributo $upload.
     * @var bool
     * @access private
     */
    private $upload;

    /**
     * Atributo $requestBody.
     * @var string
     * @access private
     */
    private $requestBody;

    /**
     * Atributo $requestLength.
     * @var int
     * @access private
     */
    private $requestLength;

    /**
     * Atributo $acceptType.
     * @var string
     * @access private
     */
    private $acceptType;

    /**
     * Atributo $responseBody.
     * @var string
     * @access private
     */
    private $responseBody;

    /**
     * Atributo $responseInfo.
     * @var array
     * @access private
     */
    private $responseInfo;

    /**
     * Atributo $timeOut.
     * @var int
     * @access private
     */
    private $timeOut = 60;


    /**
     * Atributo $userAgent.
     * @var    string
     * @access private
     */
    private $userAgent;

    /**
     * Atributo $options.
     * @var    array
     * @access private
     */
    private $options;

    /**
     * Atributo $typeAuth.
     * @var    string
     * @access private
     */
    private $typeAuth = 'digest';

    // __construct() {{{
    /**
     * Default constructor
     *
     * Example:
     * <code>
     * require_once 'Kinghost.php';
     * $api = new Kinghost('meu@email.com' , '123456');
     * </code>
     *
     * @return    void
     * @param    string [optional] $username
     * @param    string [optional] $password
     * @access    public
     */
    public function __construct($username = null, $password = null)
    {
        $this->requestLength = 0;
        $this->setAcceptType('application/json');
        $this->responseBody = null;
        $this->responseInfo = null;
        if ($username !== null) $this->setUsername($username);
        if ($password !== null) $this->setPassword($password);
    }
    // }}}

    // clear() {{{
    /**
     * limpa atributos populados por retornos da API
     *
     * Example:
     * <code>
     * require_once 'Kinghost.php';
     * $api = new Kinghost();
     * $api->clear();
     * </code>
     *
     * @return void
     * @access public
     */
    public function clear()
    {
        $this->requestBody = null;
        $this->requestLength = 0;
        $this->setVerb('GET');
        unset($this->options[CURLOPT_INFILE]);
        unset($this->options[CURLOPT_INFILESIZE]);
        unset($this->options[CURLOPT_PUT]);
        unset($this->options[CURLOPT_POSTFIELDS]);
        unset($this->options[CURLOPT_POST]);
        unset($this->options[CURLOPT_CUSTOMREQUEST]);
        unset($this->options[CURLOPT_UPLOAD]);
    }
    // }}}

    // execute() {{{
    /**
     * executa uma chamada a API
     *
     * Example:
     * <code>
     * require_once 'Kinghost.php';
     * $api = new Kinghost();
     * $api->setVerb('GET');
     * $api->setAcceptType('text/html');
     * $api->setUsername('meu@email.com');
     * $api->setPassword('123456');
     * $api->setUrl('https://api.Kinghost.net/olaMundo');
     * $api->execute();
     * </code>
     *
     * @return void
     * @access public
     */
    public function execute()
    {
        $ch = curl_init();
        $this->setAuth();

        try {
            switch (strtoupper($this->verb)) {
                case 'GET':
                    $this->executeGet($ch);
                    break;
                case 'POST':
                    $this->executePost($ch);
                    break;
                case 'PUT':
                    $this->executePut($ch);
                    break;
                case 'DELETE':
                    $this->executeDelete($ch);
                    break;
                default:
                    throw new InvalidArgumentException('O verb (' . $this->verb . ') � invalido para a chamada REST.');
            }
        } catch (InvalidArgumentException $e) {
            curl_close($ch);
            throw $e;
        } catch (Exception $e) {
            curl_close($ch);
            throw $e;
        }
    }
    // }}}

    // buildPostBody() {{{
    /**
     * Popula parametros a serem passados por POST
     *
     * Example:
     * <code>
     * require_once 'Kinghost.php';
     * $api = new Kinghost();
     * $param = array( 'dominio' => 'meusite.com.br' , 'plataforma' => 'linux');
     * $api->buildPostBody( $param );
     * </code>
     *
     * @param array [optional] $data
     * @return void
     * @access public
     */
    public function buildPostBody($data = null)
    {
        $data = ($data !== null) ? $data : $this->requestBody;

        if (!is_array($data)) {
            throw new InvalidArgumentException('Invalid data input for postBody.  Array expected');
        }

        $data = http_build_query($data, '', '&');
        $this->requestBody = $data;
    }
    // }}}

    // buildGetBody() {{{
    /**
     * Popula parametros a serem passados por GET
     *
     * Example:
     * <code>
     * require_once 'Kinghost.php';
     * $api = new Kinghost();
     * $param = array( 'dominio' => 'meusite.com.br' , 'plataforma' => 'linux');
     * $api->buildGetBody( $param );
     * </code>
     *
     * @param array [optional] $data
     * @return void
     * @access public
     */
    public function buildGetBody($data = null)
    {
        $data = ($data !== null) ? $data : $this->requestBody;

        if (!is_array($data)) {
            throw new InvalidArgumentException('Invalid data input for getBody.  Array expected');
        }

        $data = http_build_query($data, '', '&');
        $this->requestBody = '?' . $data;
    }
    // }}}

    // executeGet() {{{
    /**
     * Chamada da API com metodo GET
     *
     * @param object $ch
     * @return void
     * @access protected
     */
    protected function executeGet($ch)
    {
        if (!is_string($this->requestBody)) {
            $this->buildGetBody();
        }
        $this->setUrl($this->getUrl() . $this->requestBody);
        $this->doExecute($ch);
    }
    // }}}

    // executePost() {{{
    /**
     * Chamada da API com metodo POST
     *
     * @param object $ch
     * @return void
     * @access protected
     */
    protected function executePost($ch)
    {
        if (!is_string($this->requestBody)) {
            $this->buildPostBody();
        }
        $this->options[CURLOPT_POSTFIELDS] = $this->requestBody;
        $this->options[CURLOPT_POST] = true;
        $this->doExecute($ch);
    }
    // }}}

    // executePut() {{{
    /**
     * Chamada da API com metodo PUT
     *
     * @param object $ch
     * @return void
     * @access protected
     */
    protected function executePut($ch)
    {
        if (!is_string($this->requestBody)) {
            $this->buildPostBody();
        }

        $this->requestLength = strlen($this->requestBody);
        $this->options[CURLOPT_CUSTOMREQUEST] = 'PUT';
        $this->options[CURLOPT_POSTFIELDS] = $this->requestBody;
        $this->doExecute($ch);
    }
    // }}}

    // executeDelete() {{{
    /**
     * Chamada da API com metodo DELETE
     *
     * @param object $ch
     * @return void
     * @access protected
     */
    protected function executeDelete($ch)
    {
        $this->options[CURLOPT_CUSTOMREQUEST] = 'DELETE';
        $this->doExecute($ch);
    }
    // }}}

    // setAuth() {{{
    /**
     * Metodo para setar autenticacao para a API
     *
     * @return void
     * @access protected
     */
    protected function setAuth()
    {
        if ($this->getUsername() !== null && $this->getPassword() !== null) {
            if ($this->getTypeAuth() == 'digest') {
                $this->options[CURLOPT_HTTPAUTH] = CURLAUTH_DIGEST;
            } else {
                $this->options[CURLOPT_HTTPAUTH] = CURLAUTH_BASIC;
            }
            $this->options[CURLOPT_USERPWD] = $this->getUsername() . ':' . $this->getPassword();
        } else {
            throw new InvalidArgumentException('Usuario e senha nao setados');
        }
    }

    // }}}

    public function doCall($url = null, $aParameters, $verb = 'GET')
    {
        if ($url !== null) {
            $this->setUrl($this->getKinghostApiUrl() . $url);
        } elseif (trim($this->getUrl()) != '') {
            $this->setUrl($this->getKinghostApiUrl() . $this->getUrl());
        } else {
            throw new InvalidArgumentException('Invalid Url');
        }
        $this->setVerb($verb);
        if (!empty($aParameters)) {
            $this->requestBody = (array)$aParameters;
        } else {
            $this->requestBody = '';
        }
        $this->execute();
    }

    // doExecute() {{{
    /**
     * Executa a chamda API por curl com as options definidas
     *
     * @param object $curlHandle
     * @return void
     * @access protected
     */
    protected function doExecute(&$curlHandle)
    {
        $this->options[CURLOPT_URL] = (string)$this->getUrl();
        $this->options[CURLOPT_PORT] = $this->getKinghostApiPort();
        $this->options[CURLOPT_USERAGENT] = (string)$this->getUserAgent();
        if (!ini_get('open_basedir') && !ini_get('safe_mode')) {
            $this->options[CURLOPT_FOLLOWLOCATION] = true;
        }
        $this->options[CURLOPT_RETURNTRANSFER] = true;
        $this->options[CURLOPT_SSL_VERIFYPEER] = false;
        $this->options[CURLOPT_SSL_VERIFYHOST] = 2;
        $this->options[CURLOPT_TIMEOUT] = (int)$this->getTimeOut();
        $this->options[CURLOPT_HTTPHEADER] = array('Accept: ' . $this->getAcceptType(), 'Expect:');
        curl_setopt_array($curlHandle, $this->options);
        $this->responseBody = curl_exec($curlHandle);
        $this->responseInfo = curl_getinfo($curlHandle);
        $errorNumber = curl_errno($curlHandle);
        $errorMessage = curl_error($curlHandle);
        curl_close($curlHandle);


        $this->clear();

        // invalid headers
        /*		if(!in_array($this->responseInfo['http_code'], array(0, 200)))
                {
                    // should we provide debug information
                    if(self::DEBUG)
                    {
                        // make it output proper
                        echo '<pre>';

                        // dump the header-information
                        print_r($this->responseInfo);

                        // dump the raw response
                        print_r($this->responseBody);

                        // end proper format
                        echo '</pre>';
                        // throw error
                        throw new KinghostException(null, (int) $this->responseInfo['http_code']);
                        // stop the script
                        // error?
                        if($errorNumber != '') throw new KinghostException($errorMessage, $errorNumber);
                        exit;
                    }
                }*/
    }
    // }}}

    // getAcceptType() {{{
    /**
     * Chama o metodo que retorna o tipo de retorno da chamada a API
     *
     * Example:
     * <code>
     * require_once 'Kinghost.php';
     * $api = new Kinghost();
     * echo $api->getAcceptType();
     * </code>
     *
     * @access public
     * @return string
     */
    public function getAcceptType()
    {
        return (string)$this->acceptType;
    }
    // }}}

    // setAcceptType() {{{
    /**
     * Chama o metodo que seta o tipo de retorno da chamada a API
     *
     * Example:
     * <code>
     * require_once 'Kinghost.php';
     * $api = new Kinghost();
     * $api->setAcceptType('text/xml');
     * </code>
     *
     * @param string $acceptType
     * @access public
     * @return void
     */
    public function setAcceptType($acceptType)
    {
        $this->acceptType = (string)$acceptType;
    }
    // }}}

    // getPassword() {{{
    /**
     * Chama o metodo que retorna a senha setada
     *
     * Example:
     * <code>
     * require_once 'Kinghost.php';
     * $api = new Kinghost();
     * echo $api->getPassword();
     * </code>
     *
     * @access public
     * @return string
     */
    public function getPassword()
    {
        return (string)$this->password;
    }
    // }}}

    // setPassword() {{{
    /**
     * Chama o metodo que seta a senha
     *
     * Example:
     * <code>
     * require_once 'Kinghost.php';
     * $api = new Kinghost();
     * $api->setPassword('123456');
     * </code>
     *
     * @param string $password
     * @access public
     * @return void
     */
    public function setPassword($password)
    {
        $this->password = (string)$password;
    }
    // }}}

    // getResponseBody() {{{
    /**
     * Chama o metodo que retorna dados recebidos pela chamada a API
     *
     * Example:
     * <code>
     * require_once 'Kinghost.php';
     * $api = new Kinghost();
     * var_dump($api->getResponseBody());
     * </code>
     *
     * @access public
     * @return array
     */
    public function getResponseBody()
    {
        return $this->responseBody;
    }
    // }}}

    // ObjtoArray() {{{
    /**
     * Chama o metodo que retorna objeto para array
     *
     * Example:
     * <code>
     * require_once 'Kinghost.php';
     * array_walk($array, 'Kinghost::remUtf8');
     * </code>
     *
     * @access public
     * @return array
     */
    public static function ObjtoArray(&$toArray)
    {
        if (is_array($toArray)) {
            array_walk($toArray, 'Kinghost::ObjtoArray');
        } elseif (is_object($toArray)) {
            array_walk($toArray, 'Kinghost::ObjtoArray');
        }
    }
    // }}}

    // remUtf8() {{{
    /**
     * Chama o metodo que remove codifica��o utf8
     *
     * Example:
     * <code>
     * require_once 'Kinghost.php';
     * array_walk($array, 'Kinghost::remUtf8');
     * </code>
     *
     * @access public
     * @return array
     */
    public static function remUtf8(&$item1)
    {
        $item1 = utf8_decode(stripslashes($item1));
    }
    // }}}

    // getResponseInfo() {{{
    /**
     * Chama o metodo que retorna informa��es da requisi��o feita a API
     *
     * Example:
     * <code>
     * require_once 'Kinghost.php';
     * $api = new Kinghost();
     * var_dump($api->getResponseInfo());
     * </code>
     *
     * @access public
     * @return array
     */
    public function getResponseInfo()
    {
        return (array)$this->responseInfo;
    }
    // }}}

    // getUrl() {{{
    /**
     * Chama o metodo que retorna a URL setada para chamada a API
     *
     * Example:
     * <code>
     * require_once 'Kinghost.php';
     * $api = new Kinghost();
     * echo $api->getUrl();
     * </code>
     *
     * @access public
     * @return string
     */
    public function getUrl()
    {
        return (string)$this->url;
    }
    // }}}

    // setUrl() {{{
    /**
     * Chama o metodo que seta a URL para chamada a API
     *
     * Example:
     * <code>
     * require_once 'Kinghost.php';
     * $api = new Kinghost();
     * $api->setUrl('https://api.Kinghost.net/');
     * </code>
     *
     * @param string $url
     * @access public
     * @return void
     */
    public function setUrl($url)
    {
        $this->url = (string)$url;
    }
    // }}}

    // getUsername() {{{
    /**
     * Chama o metodo que retorna o Username setado para chamada a API
     *
     * Example:
     * <code>
     * require_once 'Kinghost.php';
     * $api = new Kinghost();
     * echo $api->getUsername();
     * </code>
     *
     * @access public
     * @return string
     */
    public function getUsername()
    {
        return (string)$this->username;
    }
    // }}}

    // setUsername() {{{
    /**
     * Chama o metodo que seta o Username para chamada a API
     *
     * Example:
     * <code>
     * require_once 'Kinghost.php';
     * $api = new Kinghost();
     * $api->setUsername('meu@email.com');
     * </code>
     *
     * @param string $username
     * @access public
     * @return void
     */
    public function setUsername($username)
    {
        $this->username = (string)$username;
    }
    // }}}

    // getVerb() {{{
    /**
     * Chama o metodo que retorna o metodo de chamada a API
     *
     * Example:
     * <code>
     * require_once 'Kinghost.php';
     * $api = new Kinghost();
     * echo $api->getVerb();
     * </code>
     *
     * @access public
     * @return string
     */
    public function getVerb()
    {
        return (string)$this->verb;
    }
    // }}}

    // setVerb() {{{
    /**
     * Chama o metodo que seta o metodo para chamada a API
     *
     * Example:
     * <code>
     * require_once 'Kinghost.php';
     * $api = new Kinghost();
     * $api->setVerb('GET');
     * </code>
     *
     * @param string $verb
     * @access public
     * @return void
     */
    public function setVerb($verb)
    {
        $this->verb = (string)$verb;
    }
    // }}}

    // getUserAgent() {{{
    /**
     * Chama o metodo que retorna o user-agent da sua aplica��o
     *
     * @access public
     * @return string
     */
    public function getUserAgent()
    {
        return (string)'PHP Kinghost/' . self::VERSION . ' ' . $this->userAgent;
    }
    // }}}

    // setUserAgent() {{{
    /**
     * Seta o user-agent para sua aplica��o
     *
     * @param    string $userAgent
     * @return    void
     */
    public function setUserAgent($userAgent)
    {
        $this->userAgent = (string)$userAgent;
    }
    // }}}

    // getTimeOut() {{{
    /**
     * Chama o metodo que retorna o timeOut da sua aplica��o
     *
     * @access public
     * @return int
     */
    public function getTimeOut()
    {
        return (int)$this->timeOut;
    }
    // }}}

    // setTimeOut() {{{
    /**
     * Seta o user-agent para sua aplica��o
     *
     * @param    int $seconds
     * @return    void
     */
    public function setTimeOut($seconds)
    {
        $this->timeOut = (int)$seconds;
    }
    // }}}

    // getTypeAuth() {{{
    /**
     * Chama o metodo que retorna o typeAuth da sua aplica��o
     *
     * @access public
     * @return string
     */
    public function getTypeAuth()
    {
        return (string)$this->typeAuth;
    }
    // }}}

    // setTypeAuth() {{{
    /**
     * Seta o typeAuth para sua aplica��o
     *
     * @param    string $typeAuth
     * @return    void
     */
    public function setTypeAuth($typeAuth)
    {
        $this->typeAuth = (string)$typeAuth;
    }

    // }}}

    public function setKinghostApiUrl($url)
    {
        $this->KinghostApiUrl = (string)$url;
    }

    public function setKinghostApiPort($port)
    {
        $this->KinghostApiPort = (int)$port;
    }

    public function getKinghostApiUrl()
    {
        return (string)$this->KinghostApiUrl;
    }

    public function getKinghostApiPort()
    {
        return (int)$this->KinghostApiPort;
    }
}