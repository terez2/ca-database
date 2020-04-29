<?php



namespace App\Utils\Http;


use Nette\SmartObject;

class Request {

    use SmartObject;

    const HTTP_METHOD_GET = 'GET';
    const HTTP_METHOD_PUT = 'PUT';
    const HTTP_METHOD_POST = 'POST';
    const HTTP_METHOD_DELETE = 'DELETE';

    /**
     *
     * @var string
     */
    private $method;
    /**
     *
     * @var array
     */
    private $parameters;
    /**
     * @var array
     */
    private $headers = array();
    /**
     * @var
     */
    private $content;
    /**
     *
     * @var string
     */
    private $url;

    function __construct($method, $url) {
        $this->method = $method;
        $this->url = $url;
    }


    function setHeaders($headers) {
        $this->headers = $headers;
    }

    function setParameters($parameters) {
        $this->parameters = $parameters;
    }

    function getHeaders() {
        if (isset($this->headers)) {
            return $this->headers;
        }
        else {
            return array();
        }

    }

    function hasContent() {
        return isset($this->content);
    }

    function hasParameters() {
        return isset($this->parameters) && count($this->parameters) > 0;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }



    function getContent() {
        return $this->content;
    }

    function setContent($content = null) {
        $this->content = $content;
    }


    function getParameters() {
        return $this->parameters;
    }


    function isPost() {
        return $this->method === self::HTTP_METHOD_POST;
    }

    function isPut() {
        return $this->method === self::HTTP_METHOD_PUT;
    }

    function isDelete() {
        return $this->method === self::HTTP_METHOD_DELETE;
    }

    /**
     * @param $url
     * @param null $parameters
     * @param null $headers
     * @return Request
     */
    static function get($url,$parameters = null,$headers = null) {
        return self::createRequest(self::HTTP_METHOD_GET, $url,$parameters,$headers);
    }

    /**
     * @param $url
     * @param null $parameters
     * @param null $headers
     * @param null $content
     * @return Request
     */
    static function post($url,$parameters = null, $headers = null, $content = null) {
        return self::createRequest(self::HTTP_METHOD_POST, $url,$parameters,$headers,$content);
    }

    /**
     * @param $url
     * @param null $parameters
     * @param null $headers
     * @param null $content
     * @return Request
     */
    static function put($url,$parameters = null, $headers = null, $content = null) {
        return self::createRequest(self::HTTP_METHOD_PUT, $url,$parameters,$headers,$content);
    }

    /**
     * @param $url
     * @param null $parameters
     * @param null $headers
     * @return Request
     */
    static function delete($url,$parameters = null, $headers = null) {
        return self::createRequest(self::HTTP_METHOD_DELETE, $url,$headers,$parameters);
    }

    private static function createRequest($method,$url,$parameters = null,$headers = null, $content = null) {
        $request = new Request($method,$url);
        $request->setHeaders($headers);
        $request->setParameters($parameters);
        $request->setContent($content);
        return $request;
    }



}