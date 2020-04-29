<?php

namespace App\Services;


use App\Utils\Json\AttributesValidator;
use App\Utils\Json\JsonValidator;
use Nette\Http\IResponse;
use Nette\Http\Request;
use Nette\Utils\Json;

class ItemService
{
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
        // $this->jsonValidator->validateJson($response, 'nutrition-item');
        return $jsonResponse['product'];
    }

    public function getProductCalories($product)
    {
        $nutriments = $this->getProductAttribute($product, 'nutriments');
        return $this->getProductAttribute($nutriments, 'energy-kcal_value');
    }

    public function getProductQuantity($product)
    {
        return $this->getProductAttribute($product, 'product_quantity')/ 100; //todo ml?
    }

    public function getProductName($product)
    {
        return $this->getProductAttribute($product, 'product_name');
    }

    public function getProductImage($product)
    {
        return $this->getProductAttribute($product, 'image_small_url');
    }

    public function getProductAttribute($product, $attribute)
    {
        try {
            return $this->attributesValidator->getValidatedAttribute($product, $attribute);
        } catch (\ApiException $e) {
            throw new \ApiException('Product is not found.', IResponse::S404_NOT_FOUND);
        }
    }
}