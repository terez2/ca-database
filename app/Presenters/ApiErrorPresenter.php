<?php

namespace App\Presenters;

use ApiException;
use Error;
use Nette\Application\Responses\JsonResponse;
use Nette\Http\Response;
use Tracy\Debugger;

final class ApiErrorPresenter extends BasePresenter
{


    /**
     * @inject
     * @var Response
     */
    public $httpResponse;

    /**
     * @param Error $exception
     */
    public function actionDefault($exception)
    {

        if ($exception instanceof ApiException) {
            $this->httpResponse->setCode($exception->getHttpCode());
            $this->sendResponse($exception->toJsonResponse());
        }
        else {
            Debugger::log($exception);
            $data = array();
            $data['message'] = $exception->getMessage();
            $data['code'] = $exception->getCode();
            $this->sendResponse(new JsonResponse($data));
        }
    }

}