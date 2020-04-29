<?php


namespace App\Utils\Http;

use Nette\SmartObject;

class Response
{
    use SmartObject;

    /**
     *
     * @var string
     */
    private $content;
    /**
     *
     * @var int
     */
    private $httpCode;
    /**
     *
     * @var array
     */
    private $headers;

    private $createdId;

    function getContent() {
        return $this->content;
    }

    function getHttpCode() {
        return $this->httpCode;
    }

    function getHeaders() {
        return $this->headers;
    }

    function setContent($content) {
        $this->content = $content;
    }

    function setHttpCode($httpCode) {
        $this->httpCode = $httpCode;
    }

    function setHeaders($headers) {
        $this->headers = $headers;
        if (isset($this->headers) && isset($this->headers["Location"])) {
            $location = $this->headers["Location"];
            $locationParts = explode("/", $location);
            $this->createdId = $locationParts[count($locationParts)-1];
        }
    }

    public function getCreatedId() {
        return $this->createdId;
    }


    function isOk() {
        $code = intval($this->httpCode);
        return 300 >  $code && $code  >= 200;
    }

    function isNoContent() {
        return intval($this->httpCode) == 204;
    }

    function isCreated() {
        return intval($this->httpCode) == 201;
    }

}