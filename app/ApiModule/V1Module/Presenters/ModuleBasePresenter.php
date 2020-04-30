<?php

namespace App\ApiModule\V1Module\Presenters;


use App\Presenters\BasePresenter;
use Nette\Application\Responses\JsonResponse;
use Nette\Http\IResponse;
use Nette\Http\Request;
use Nette\Http\Response;

abstract class ModuleBasePresenter extends BasePresenter
{
    const PARAM_DATA = "data";
    const PARAM_ASSOCIATIONS = "associations";

    /**
     * @inject
     * @var Request
     */
    public $httpRequest;

    /**
     * @inject
     * @var Response
     */
    public $httpResponse;

    /**
     * @var array
     */
    private $corsUrl;

    /**
     * @param mixed $corsUrl
     */
    public function setCorsUrl($corsUrl)
    {
        $this->corsUrl = $corsUrl;
    }



    protected function startup()
    {
        parent::startup();
        $origin = $this->getHttpRequest()->getHeader('Origin');
        if (in_array($origin, $this->corsUrl)) {
            $this->httpResponse->addHeader("Access-Control-Allow-Origin", $origin);
        }
        if ($this->httpRequest->getHeader("Access-Control-Request-Headers") !== null) {
            $this->httpResponse->addHeader("Access-Control-Allow-Headers", $this->httpRequest->getHeader("Access-Control-Request-Headers"));
        }
        $this->httpResponse->addHeader("Access-Control-Allow-Methods","GET, POST, PUT, PATCH, DELETE, OPTIONS");
        if ($this->getHttpRequest()->getMethod() == "OPTIONS") {
            $this->setupOptions();
        }
    }


    /**
     * @throws \Nette\Application\AbortException
     */
    protected function sendNoContent() {
        $this->httpResponse->setCode(IResponse::S204_NO_CONTENT);
        $this->terminate();
    }

    /**
     * @param $message
     * @param IResponse $code
     * @throws \Nette\Application\AbortException
     */
    protected function sendError($message, $code) {
        $response = ['message' => $message, 'code' => $code];

        $this->httpResponse->setCode($code);
        $this->sendResponse(new JsonResponse($response));
    }

    /**
     * @param $uri
     * @param $data
     * @throws \Nette\Application\AbortException
     */
    protected function sendCreated($uri,$data) {
        $this->httpResponse->setCode(IResponse::S201_CREATED);
        $this->httpResponse->addHeader("Location",$uri);
        $this->sendJson($data);
    }

    /**
     * @param $data
     * @throws \Nette\Application\AbortException
     */
    protected function sendCollection($data) {
        $this->sendJson(["data" => $data]);
    }

    /**
     * @throws AbortException
     */
    protected function setupOptions()
    {
        $this->terminate();
    }

}