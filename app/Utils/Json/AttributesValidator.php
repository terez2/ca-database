<?php


namespace App\Utils\Json;


use Nette\Http\IResponse;

class AttributesValidator
{
    /**
     * @param $jsonData
     * @param $attribute
     * @return mixed
     * @throws \ApiException
     */
    public function getValidatedAttribute($jsonData, $attribute){
        if (array_key_exists($attribute, $jsonData)) {
            return $jsonData[$attribute];
        } else {
            throw new \ApiException('Attribute ' . $attribute . ' is not exist.', IResponse::S404_NOT_FOUND);
        }
    }
}