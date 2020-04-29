<?php


namespace App\Models\Entities;


class ActivityEntity extends BaseEntity
{

    /**
     * @return array
     */
    protected function getAllowedValues(): array
    {
        return [
            'id',
            'name',
            'energy'
        ];
    }
}