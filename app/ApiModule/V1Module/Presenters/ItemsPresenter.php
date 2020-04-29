<?php


namespace App\ApiModule\V1Module\Presenters;

use App\Models\ActivitiesModel;
use App\Models\Entities\ActivityEntity;
use App\Models\Entities\ItemEntity;
use App\Models\Entities\TimeActivityEntity;
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
        $activities = $this->activitiesModel->getTableData('activities');
        $product = $this->itemService->getProduct($barcode);

        if ($activities && $product) {
            $itemQuantity = $this->itemService->getProductQuantity($product);
            $itemCalories = $this->itemService->getProductCalories($product) * $itemQuantity;
            $itemName = $this->itemService->getProductName($product);
            $itemImage = $this->itemService->getProductImage($product);

            for ($i = 0; $i < count($activities); $i++) {
                $actEntity = new TimeActivityEntity($activities[$i]);
                $actEntity->setTime($itemCalories / $actEntity->getEnergy());
                array_push($timeActivities, $actEntity);
            }

            $nutritionItem = new ItemEntity();
            $nutritionItem->setActivities($timeActivities);
            $nutritionItem->setId($barcode); //todo
            $nutritionItem->setCalories($itemCalories);
            $nutritionItem->setName($itemName);
            $nutritionItem->setImage($itemImage);

            $this->sendJson($nutritionItem);
            // todo add to my database
        } else {
            throw new \ApiException('Activities not found.', IResponse::S404_NOT_FOUND);
        }
    }
}