<?php

namespace App\ApiModule\V1Module\Presenters;

use Nette\Application\Responses\JsonResponse;
use Nette\Http\IResponse;
use Nette\Http\Request;
use Nette\Http\Response;
use Nette\Security\AuthenticationException;
use Nette\Security\User;

abstract class ModuleBaseSecuredPresenter extends ModuleBasePresenter
{

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

//    /**
//     * @inject
//     * @var ApiTokenModel
//     */
//    public $tokenModel;


    /**
     * @throws \ApiException
     * @throws \Nette\Application\AbortException
     */
    protected function startup()
    {
        parent::startup();
        if ($this->httpRequest->getMethod() != "OPTIONS") {
            $token = $this->httpRequest->getHeader("X-Api-Key");
            if ($token) {
                try {
                    $this->getUser()->login($token);
                    $user = $this->getUser();
                    $this->checkPermission($user);
                } catch (AuthenticationException $ex) {
                    throw new \ApiException($ex->getMessage(), IResponse::S401_UNAUTHORIZED, $ex->getCode());
                }

            } else {
                $this->checkPermission($this->getUser());
            }
        } else {
            $this->terminate();
        }

    }


    /**
     * @param User $user
     * @throws \Nette\Application\AbortException
     */
    protected function checkPermission(User $user)
    {
        $this->checkSignalPermission($user);
        $this->checkActionPermission($user);
    }

    /**
     * @param User $user
     * @throws \Nette\Application\AbortException
     */
    protected function checkSignalPermission(User $user)
    {
        if ($this->isSignalReceiver($this)) {
            if (!$user->isAllowed($this->getReflection()->name, $this->getSignalModifiedName())) {
                $this->httpResponse->setCode(IResponse::S403_FORBIDDEN);
                $this->sendResponse(new JsonResponse(["message" => "You are not allowed to access this resource. Signal permission denied"]));
            }
        }
    }

    /**
     * @param User $user
     * @throws \Nette\Application\AbortException
     */
    protected function checkActionPermission(User $user)
    {
        if (!$user->isAllowed($this->getReflection()->name, $this->getAction())) {
            $this->httpResponse->setCode(IResponse::S403_FORBIDDEN);
            $this->sendResponse(new JsonResponse(["message" => "You are not allowed to access this resource. Action permission denied " . $this->getAction()]));
        }
    }

    protected function shutdown(\Nette\Application\IResponse $response)
    {
        parent::shutdown($response);
        $this->getUser()->logout(true);
    }

    protected function getUserOrganizationId()
    {
        $data = $this->getUser()->getIdentity()->getData();
        return $data['current_organization_id'];
    }

    protected function getUserBranchId()
    {
        $data = $this->getUser()->getIdentity()->getData();
        return $data['current_branch_id'];
    }

    /**
     * @throws \Nette\Application\AbortException
     */
    protected function sendNoContent()
    {
        $this->httpResponse->setCode(IResponse::S204_NO_CONTENT);
        $this->terminate();
    }

    /**
     * @param $uri
     * @param $data
     * @throws \Nette\Application\AbortException
     */
    protected function sendCreated($uri, $data)
    {
        $this->httpResponse->setCode(IResponse::S201_CREATED);
        $this->httpResponse->addHeader("Location", $uri);
        $this->sendJson($data);
    }

}
