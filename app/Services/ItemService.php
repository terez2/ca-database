<?php

namespace App\Services;


use App\Models\Entities\ItemEntity;
use App\Models\Entities\TimeActivityEntity;
use App\Utils\Json\AttributesValidator;
use App\Utils\Json\JsonValidator;
use Nette\Http\IResponse;
use Nette\Http\Request;
use Nette\Utils\Json;

class ItemService
{

    private $product;
    /**
     * @inject
     * @var Request
     */
    public $httpRequest;

    /**
     * @inject
     * @var AttributesValidator
     */
    public $attributesValidator;

    /**
     * @inject
     * @var JsonValidator
     */
    public $jsonValidator;

    /**
     * @param $product
     * @throws \ApiException
     */
    public function controlIfProductFound($product)
    {
        if ((key_exists('status', $product) && $product['status'] === 0) || !key_exists('status', $product)) {
            throw new \ApiException('Product not found.', IResponse::S404_NOT_FOUND);
        }

    }

    /**
     * @param $barcode
     * @return mixed
     * @throws \ApiException
     * @throws \Nette\Utils\JsonException
     */
    public function getProduct($barcode)
    {
        $response = file_get_contents('https://world.openfoodfacts.org/api/v0/product/' . $barcode);
        $jsonResponse = Json::decode($response, Json::FORCE_ARRAY);
        $this->controlIfProductFound($jsonResponse);
        $this->product = $jsonResponse['product'];
        // $this->jsonValidator->validateJson($response, 'nutrition-item');
        return $this->product;
    }

    public function getActivities($activitiesTable, $calories)
    {
        $activities = [];

        for ($i = 0; $i < count($activitiesTable); $i++) {
            $actEntity = new TimeActivityEntity($activitiesTable[$i]);
            $actEntity->setTime($calories / $actEntity->getEnergy());
            array_push($activities, $actEntity);
        }

        return $activities;
    }

    public function getItem($barcode, $activitiesTable)
    {
        $this->getProduct($barcode);

        $itemQuantity = $this->getProductQuantity();
        $calories = $this->getProductCalories() * $itemQuantity;
        $name = $this->getProductName();
        $image = $this->getProductImage();

        $activities = $this->getActivities($activitiesTable, $calories);
        // todo solve name 54491472
        $item = new ItemEntity();
        $item->setAllAttributes($barcode, $name, $activities, $calories, $image);
        return $item->toArray();
    }

    public function getProductCalories()
    {
        $nutriments = $this->getProductAttribute($this->product, 'nutriments');
        return $this->getProductAttribute($nutriments, 'energy-kcal_value');
    }

    public function getProductQuantity()
    {
        return $this->getProductAttribute($this->product, 'product_quantity') / 100; //todo ml?
    }

    public function getProductName()
    {
        return $this->getProductAttribute($this->product, 'product_name');
    }

    public function getProductImage()
    {
        return $this->getProductAttribute($this->product, 'image_small_url');
    }

    public function getProductAttribute($item, $attribute)
    {
        try {
            return $this->attributesValidator->getValidatedAttribute($item, $attribute);
        } catch (\ApiException $e) {
            throw new \ApiException('Product is not found because of wrong attribute ' . $attribute . '.', IResponse::S404_NOT_FOUND);
        }
    }
}