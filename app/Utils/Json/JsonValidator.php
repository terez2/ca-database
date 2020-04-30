<?php


namespace App\Utils\Json;

use Nette\SmartObject;

class JsonValidator
{
    use SmartObject;

    private $schemasPath;

    function __construct($schemasPath) {
        $this->schemasPath = $schemasPath;
    }

    public function validateJson($json,$schemaName) {
        $data = json_decode($json);
        $this->validateData($data, $schemaName);
    }

    public function validateData($data,$schemaName) {
        $retriever = new \JsonSchema\Uri\UriRetriever;
        $schema = $retriever->retrieve('file://' . realpath($this->schemasPath.$schemaName.'.json'));
        $validator = new \JsonSchema\Validator();
        $validator->check($data, $schema);
        if (!$validator->isValid()) {
            $message = "JSON is not valid. Violations:\n";
            foreach ($validator->getErrors() as $error) {
                $message .= sprintf("[%s] %s\n", $error['property'], $error['message']);
            }
            throw new \ApiException($message,400);
        }
    }
}