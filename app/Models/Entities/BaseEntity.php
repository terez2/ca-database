<?php


namespace App\Models\Entities;


use Nette\Http\IResponse;
use ReflectionObject;


abstract class BaseEntity
{

    public function __construct(Array $properties = array())
    {
        foreach ($properties as $key => $value) {
            $this->addAttribute($key, $value);
        }
    }

    protected function addAttribute($key, $value)
    {
        if (in_array($key, $this->getAllowedValues())) {
            $this->{$key} = $value;
        } else if ($key === '_id') {
            $this->{'id'} = $value;
        }
    }

    protected function getAttribute($key)
    {
        if (in_array($key, $this->getAllowedValues())) {
            return $this->{$key};
        } else {
            throw new \ApiException(get_class($this) . ' has not '  . $key . ' attribute.', IResponse::S404_NOT_FOUND);
        }
    }

    public function toArray()
    {
        $data = [];
        $reflection = new ReflectionObject($this);
        $properties = $reflection->getProperties();

        foreach ($properties as $key => $property) {
            $propertyName = $property->getName();
            $value = $this->$propertyName;
            if ($value !== null) {
                if (method_exists($value, 'toArray')) {
                    $data[$propertyName] = $value->toArray();
                } else {
                    $data[$propertyName] = $value;
                }
            }
        }
        return $data;
    }

    /**
     * @return array
     */
    abstract protected function getAllowedValues(): array;
}