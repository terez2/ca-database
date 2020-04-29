<?php


class ApiException extends \Exception{

    private $errorMessage;
    private $httpCode = \Nette\Http\IResponse::S500_INTERNAL_SERVER_ERROR;
    private $errorCode;

    public function __construct($errorMessage, $httpCode, $errorCode = NULL) {
        parent::__construct($errorMessage,$httpCode);
        $this->errorMessage = $errorMessage;
        $this->httpCode = $httpCode;
        $this->errorCode = $errorCode;
    }

    public function getErrorMessage() {
        return $this->errorMessage;
    }

    public function getHttpCode() {
        return $this->httpCode;
    }

    public function toJsonResponse() {
        $data = array();
        $data['message'] = $this->errorMessage;
        $data['code'] = $this->errorCode;
        return new \Nette\Application\Responses\JsonResponse($data);
    }

}