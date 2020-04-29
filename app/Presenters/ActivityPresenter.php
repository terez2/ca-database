<?php


namespace App\Presenters;


use App\Model\BaseModel;

class ActivityPresenter extends BasePresenter
{

//    /**
//     * @inject
//     * @var BaseModel
//     */
//    public $databaseManager;


    /**
     * @param string $barcode
     */
    public function actionDefault()
    {

        //string $barcode
//        $result = [];
//        $jsonData = json_decode(file_get_contents('https://world.openfoodfacts.org/api/v0/product/' . $barcode), true);
//        if ($jsonData) {
//            if ($jsonData['status'] === 1) {
//                $itemEnergy = $jsonData['product']['nutriments']['energy-kcal_100g'];
//
//                $activityTable = $this->databaseManager->getTable('activity');
//                for ($i = 0; $i < count($activityTable); $i++) {
//                    $activity = $activityTable[$i];
//                    $activityResult = [
//                        "name" => $activity['name'],
//                        "spentTime" => $activity['kcal'] / $itemEnergy
//                    ];
//                    array_push($result, $activityResult);
//                }
//
//            } else {
//                // todo not found
//            }
//        }
//
//        //$barcode  = '0737628064502';//
//        //$jsonData = json_decode(file_get_contents('https://world.openfoodfacts.org/api/v0/product/' . $barcode), true);
////        dump($jsonData); die();
////        dump($jsonData['product']['nutriments']['energy-kcal_100g']); die();
//        //$this->template->anyVariable = 'any value';
//
//
//        $this->sendJson($result);

    }
}