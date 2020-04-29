<?php


namespace App\ApiModule\V1Module\Presenters;

use App\Models\ActivitiesModel;
use App\Models\Entities\ActivityEntity;
use App\Models\Entities\ItemEntity;
use App\Models\Entities\TimeActivityEntity;
use App\Models\ItemsModel;
use App\Services\ItemService;
use App\Utils\Json\JsonValidator;
use Nette\Http\IResponse;
use Nette\Utils\Json;
use Ublaboo\ApiRouter\ApiRoute;


/**
 * @ApiRoute(
 *    "/api/v1/items",
 *     presenter="Api:V1:Items"
 * )
 */
class ItemsPresenter extends ModuleBasePresenter
{

    /**
     * @inject
     * @var ItemsModel
     */
    public $itemsModel;


    /**
     * @inject
     * @var ActivitiesModel
     */
    public $activitiesModel;


    /**
     * @inject
     * @var ItemService
     */
    public $itemService;

    /**
     * @inject
     * @var JsonValidator
     */
    public $jsonValidator;

    /**
     * @ApiRoute(
     *    "/api/v1/items/<barcode>",
     *     method="GET",
     *     presenter="Api:V1:Items",
     *     parameters={
     *        "barcode"={
     *            "requirement": "\d+"
     *          }
     *       }
     * )
     * @param $barcode
     * @throws \ApiException
     * @throws \Nette\Application\AbortException
     */
    public function actionRead($barcode)
    {
        $timeActivities = [];
        $activities = $this->activitiesModel->getTableData($this->activitiesModel::TABLE);
        $product = $this->itemService->getProduct($barcode);

        if ($activities && $product) {
            $item = $this->itemsModel->findById($this->itemsModel::ITEMS_TABLE, $barcode);
            if (!$item) {
                $itemQuantity = $this->itemService->getProductQuantity($product);
                $itemCalories = $this->itemService->getProductCalories($product) * $itemQuantity;
                $itemName = $this->itemService->getProductName($product);
                $itemImage = $this->itemService->getProductImage($product);
                for ($i = 0; $i < count($activities); $i++) {
                    $actEntity = new TimeActivityEntity($activities[$i]);
                    $actEntity->setTime($itemCalories / $actEntity->getEnergy());
                    array_push($timeActivities, $actEntity);
                }
                $item = new ItemEntity();
                $item->setActivities($timeActivities);
                $item->setId($barcode); //todo
                $item->setCalories($itemCalories);
                $item->setName($itemName);
                $item->setImage($itemImage);

                $itemArray = $item->toArray();
                $this->itemsModel->insert($this->itemsModel::ITEMS_TABLE, $itemArray);
            }
            $this->sendJson($item);
        } else {
            throw new \ApiException('Activities not found.', IResponse::S404_NOT_FOUND);
        }
    }
}