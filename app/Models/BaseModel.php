<?php

namespace App\Models;

use MongoDB\Client;
use Nette\Utils\Json;
use Nette\Utils\JsonException;

class BaseModel
{
    const DATABASE_NAME = "ca";
    private $typeMap = [
        'typeMap' => [
            'root' => 'array',
            'document' => 'array',
            'array' => 'array',
        ]
    ];
    private $mongoClient;

    public function __construct()
    {
        $this->mongoClient = new Client('mongodb://mongo:27017', array("username" => 'root', "password" => '123456'));
    }

    public function getTableData($tableName)
    {
        $rawData = $this->mongoClient->selectCollection(self::DATABASE_NAME, $tableName, $this->typeMap)->find()->toArray();
        return $this->convertToJSON($rawData);
    }

    public function find($tableName, $barcode)
    {
        $rawData = $this->mongoClient->selectCollection(self::DATABASE_NAME, $tableName, $this->typeMap)->findOne(['barcode' => $barcode]);
        return $this->convertToJSON([$rawData]);
    }

    public function insert($tableName, array $values)
    {
        return $this->mongoClient->selectCollection(self::DATABASE_NAME, $tableName)->insertOne($values);
    }

    private function convertToJSON(array $rawData)
    {
        $result = [];
        foreach ($rawData as $d) {
            try {
                $d = Json::decode(Json::encode($d), Json::FORCE_ARRAY);

                $d['_id'] = $d['_id']['$oid'];
                array_push($result, $d);
            } catch (JsonException $e) {
            }
        }
        return $result;
    }
}