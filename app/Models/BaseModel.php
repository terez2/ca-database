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

    public function insert($tableName, array $values)
    {
        return $this->mongoClient->selectCollection(self::DATABASE_NAME, $tableName)->insertOne($values);
    }

    public function find($tableName, $id)
    {
        $rawData = $this->mongoClient->selectCollection(self::DATABASE_NAME, $tableName, $this->typeMap)->find(['id' => $id])->toArray();
        if (empty($rawData)) {
            $rawData = [];
        }
        return $this->convertToJSON($rawData);
    }

    public function findById($tableName, $id)
    {
        $rawData = $this->mongoClient->selectCollection(self::DATABASE_NAME, $tableName, $this->typeMap)->find(['id' => $id])->toArray();
        if (empty($rawData)) {
           return [];
        }
        return $this->convertToJSON($rawData)[0];
    }

    private function convertToJSON(array $rawData)
    {
        $result = [];
        foreach ($rawData as $item) {
            foreach ($item as $key => $value) {
                if ($key === '_id') {
                    $item[$key] = (string)$value;
                } else  {
                    $item[$key] = $value;
                }
            }
            array_push($result, $item);
        }
        return $result;
    }
}