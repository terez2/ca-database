<?php


namespace App\Models\Entities;


class TimeActivityEntity extends BaseEntity
{


    /**
     * @param mixed $time
     */
    public function setTime($time): void
    {
        $this->addAttribute('time', $time);
    }

    /**
     * @return mixed
     * @throws \ApiException
     */
    public function getEnergy()
    {
        return $this->getAttribute('energy');
    }


    /**
     * @return array
     */
    protected function getAllowedValues(): array
    {
        return [
            'id',
            'name',
            'energy',
            'time'
        ];
    }


}