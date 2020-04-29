<?php


namespace App\ApiModule\V1Module\Presenters;


use App\ApiModule\V1Module\Presenters\ModuleBaseSecuredPresenter;
//use App\Models\UserModel;
//use App\Services\UserService;
use App\Presenters\BasePresenter;
use App\Utils\Json\JsonValidator;
use Nette\Http\IResponse;
use Nette\Utils\Json;
use Ublaboo\ApiRouter\ApiRoute;


/**
 * @ApiRoute(
 *    "/api/v1/users",
 *     presenter="Api:V1:Users"
 * )
 */
class UsersPresenter extends ModuleBasePresenter //extends ModuleBaseSecuredPresenter
{


//    /**
//     * @inject
//     * @var UserService
//     */
//    public $userService;
//
//    /**
//     * @inject
//     * @var UserModel
//     */
//    public $userModel;

    /**
     * @inject
     * @var JsonValidator
     */
    public $jsonValidator;


    /**
     * @ApiRoute(
     *    "/api/v1/users",
     *  method="GET",
     *  presenter="Api:V1:Users"
     * )
     * @throws \Nette\Application\AbortException
     * @throws \ApiException
     * @throws \Nette\MemberAccessException
     */
    public function actionReadAll()
    {

//        $page = $this->getParameter("page", 1);
//        $itemsPerPage = $this->getParameter("itemsPerPage", 10);
//
//        $filter = $this->getParameter("filter", []);
//        $organizationId = $this->getUserOrganizationId();
//        $sort = $this->getParameter("sort", 'id');
//        $sortDirection = $this->getParameter("sortDirection", 'DESC');
//        $users = $this->userModel->getDataByFilter($filter)
//            ->where(':user_organization.organization_id = ?', $organizationId)
//            ->order($sort . ' ' . strtoupper($sortDirection))
//            ->page($page, $itemsPerPage)
//            ->fetchAll();
//        $count = $this->userModel->getDataByFilter($filter)
//            ->where(':user_organization.organization_id = ?', $organizationId)->count();
//        $data = [];
//        foreach ($users as $user) {
//            $item = $user->toArray();
//            unset($item['password']);
//            unset($item['rowSalt']);
//            $data[] = $item;
//        }
//        $this->sendJson([
//            "data" => $data,
//            "pagination" => [
//                "total" => $count,
//                "page" => intval($page),
//                "itemsPerPage" => intval($itemsPerPage),
//            ],
//        ]);
        $this->sendJson([]);
    }

    /**
     * @ApiRoute(
     *    "/api/v1/users/current",
     *  method="GET",
     *  presenter="Api:V1:Users"
     * )
     * @throws \Nette\Application\AbortException
     * @throws \ApiException
     * @throws \Nette\MemberAccessException
     */
    public function actionReadCurrent()
    {
        dump('actionReadCurrent'); die();
        $user = $this->userService->getUser($this->getUser()->getId());
        $this->sendJson($user);
    }

    /**
     * @ApiRoute(
     *    "/api/v1/users/<id>",
     *     method="GET",
     *     presenter="Api:V1:Users",
     *     parameters={
     * 		"id"={
     * 			"requirement": "\d+"
     * 		}
     * 	   }
     * )
     * @param $id
     * @throws \ApiException
     * @throws \Nette\Application\AbortException
     */
    public function actionRead($id)
    {
        $user = $this->userModel->getTable()
            ->where('id = ?', $id)
            ->where(':user_organization.organization_id', $this->getUserOrganizationId())
            ->fetch();

        if ($user) {
            $data = $user->toArray();
            unset($data['password']);
            unset($data['rowSalt']);
            $this->sendJson($data);
        } else {
            throw new \ApiException('User not found.', IResponse::S404_NOT_FOUND);
        }
    }

    /**
     * @ApiRoute(
     *    "/api/v1/users/current",
     *  method="PATCH",
     *  presenter="Api:V1:Users"
     * )
     * @throws \Nette\Application\AbortException
     * @throws \Nette\Utils\JsonException
     * @throws \ApiException
     * @throws \Exception
     */
    public function actionPatchCurrent()
    {
        $this->jsonValidator->validateJson($this->httpRequest->getRawBody(), 'current-user-update');
        $userData = Json::decode($this->httpRequest->getRawBody(), Json::FORCE_ARRAY);
        $this->userService->updateCurrent($this->getUser()->getId(), $userData);
        $this->sendNoContent();
    }

    /**
     * @ApiRoute(
     *     "/api/v1/users",
     *     method="POST",
     *     presenter="Api:V1:Users"
     *     )
     * @throws \Nette\Application\AbortException
     * @throws \Nette\Utils\JsonException
     * @throws \ApiException
     * @throws \Exception
     * @throws \Nette\MemberAccessException
     */
    public function actionCreate()
    {
        $this->jsonValidator->validateJson($this->httpRequest->getRawBody(), 'user-update');
        $userData = Json::decode($this->httpRequest->getRawBody(), Json::FORCE_ARRAY);
        $user = $this->userService->create($this->getUserOrganizationId(), $userData);
        $this->sendCreated('', $user);

    }

    /**
     * @ApiRoute(
     *     "/api/v1/users/<id>",
     *     method="PATCH",
     *     presenter="Api:V1:Users",
     *     parameters={
     *        "id"={
     *            "requirement": "\d+"
     *        }
     *       }
     *     )
     * @throws \Nette\Application\AbortException
     * @throws \Nette\Utils\JsonException
     * @throws \ApiException
     * @throws \Exception
     */
    public function actionPatch($id)
    {
        $user = $this->userModel->getTable()
            ->where('id = ?', $id)
            ->where(':user_organization.organization_id', $this->getUserOrganizationId())
            ->fetch();

        if ($user) {
            $this->jsonValidator->validateJson($this->httpRequest->getRawBody(), 'user-update');
            $userData = Json::decode($this->httpRequest->getRawBody(), Json::FORCE_ARRAY);
            $this->userService->update($id, $this->getUserOrganizationId(), $userData);
            $this->sendNoContent();
        } else {
            throw new \ApiException('User not found.', IResponse::S404_NOT_FOUND);
        }

    }

    /**
     * @ApiRoute(
     *     "/api/v1/users/<id>",
     *     method="DELETE",
     *     presenter="Api:V1:Users",
     *     parameters={
     *        "id"={
     *            "requirement": "\d+"
     *        }
     *       }
     *     )
     * @throws \Nette\Application\AbortException
     * @throws \ApiException
     * @throws \Exception
     */
    public function actionDelete($id)
    {
        $user = $this->userModel->getTable()
            ->where('id = ?', $id)
            ->where(':user_organization.organization_id', $this->getUserOrganizationId())
            ->fetch();

        if ($user) {
            $user->delete();
            $this->sendNoContent();
        } else {
            throw new \ApiException('User not found.', IResponse::S404_NOT_FOUND);
        }

    }

    /**
     * @ApiRoute(
     *    "/api/v1/users/token",
     *  method="POST",
     *  presenter="Api:V1:Users"
     * )
     * @throws \Nette\Application\AbortException
     * @throws \Nette\Utils\JsonException
     * @throws \Exception
     */
    public function actionGenerateToken()
    {
        $this->jsonValidator->validateJson($this->httpRequest->getRawBody(), 'reset-token');
        $userData = Json::decode($this->httpRequest->getRawBody(), Json::FORCE_ARRAY);
        $this->userService->sendTokenForResetPassword($userData['email']);
        $this->sendNoContent();
    }

    /**
     * @ApiRoute(
     *    "/api/v1/users/password",
     *  method="PUT",
     *  presenter="Api:V1:Users"
     * )
     * @throws \Nette\Application\AbortException
     * @throws \Nette\Utils\JsonException
     * @throws \Exception
     */
    public function actionResetPassword()
    {
        $this->jsonValidator->validateJson($this->httpRequest->getRawBody(), 'reset-password');
        $data = Json::decode($this->httpRequest->getRawBody(), Json::FORCE_ARRAY);
        $this->userService->resetPassword($data['token'], $data['password']);
        $this->sendNoContent();
    }


}
