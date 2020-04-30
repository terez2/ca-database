<?php


namespace App\ApiModule\V1Module\Presenters;

use App\Models\ActivitiesModel;
use App\Models\ItemsModel;
use App\Services\ItemService;
use App\Utils\Filters\BasicFilters;
use App\Utils\Json\JsonValidator;
use Nette\Application\AbortException;
use Nette\Http\IResponse;
use Ublaboo\ApiRouter\ApiRoute; //DO NOT REMOVE!

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
     * @var BasicFilters
     */
    public $basicFilters;

    /**
     * @inject
     * @var JsonValidator
     */
    public $jsonValidator;

    /**
     * @ApiRoute(
     *    "/api/v1/items/<param>",
     *     method="GET",
     *     presenter="Api:V1:Items",
     *     parameters={
     *        "param"={
     *            "type": "string"
     *          }
     *       }
     * )
     * @param $param
     *
     *
     * @throws AbortException
     */
    public function actionRead($param)
    {
        $activitiesTable = $this->activitiesModel->getTableData($this->activitiesModel::TABLE);
        if (!$activitiesTable) {
            $this->sendError('Activities not found.',IResponse::S404_NOT_FOUND);
        }

        if ($this->basicFilters->areNumbers($param)) {
            $item = $this->itemsModel->findFirstByKey($this->itemsModel::ITEMS_TABLE, 'id', $param);
            if (!$item) {
                $item = $this->itemService->getItem($param, $activitiesTable);
                $this->itemsModel->insertToTable($this->itemsModel::ITEMS_TABLE, $item);
            }
        } else {
            $item = $this->itemsModel->findFirstByRegex($this->itemsModel::ITEMS_TABLE, 'name', $param);
            if (!$item) {
                $this->sendError('Product not found.',IResponse::S404_NOT_FOUND);
            }
        }
        $this->sendJson($item);
    }

}