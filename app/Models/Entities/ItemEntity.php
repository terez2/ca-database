<?php


namespace App\Models\Entities;


class ItemEntity extends BaseEntity
{

    /**
     * @return mixed
     * @throws \ApiException
     */
    public function getId()
    {
        return $this->getAttribute('id');
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->addAttribute('id', $id);
    }

    /**
     * @return mixed
     * @throws \ApiException
     */
    public function getName()
    {
        return $this->getAttribute('name');
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->addAttribute('name', $name);
    }

    /**
     * @return mixed
     * @throws \ApiException
     */
    public function getCalories()
    {
        return $this->getAttribute('calories');
    }

    /**
     * @param $calories
     */
    public function setCalories($calories): void
    {
        $this->addAttribute('calories', $calories);
    }

    /**
     * @return mixed
     * @throws \ApiException
     */
    public function getImage()
    {
        return $this->getAttribute('image');
    }

    /**
     * @param $image
     */
    public function setImage($image): void
    {
        $this->addAttribute('image', $image);
    }


    /**
     * @return array
     * @throws \ApiException
     */
    public function getActivities(): array
    {
        return $this->getAttribute('activities');
    }

    /**
     * @param array $activities
     */
    public function setActivities(array $activities): void
    {
        $this->addAttribute('activities', $activities);
    }


    /**
     * @return string
     * @throws \ApiException
     */
    public function getIngredients(): string
    {
        return $this->getAttribute('ingredients');
    }

    /**
     * @param string $ingredients
     */
    public function setIngredients(string $ingredients): void
    {
        $this->addAttribute('ingredients', $ingredients);
    }

    public function setAllAttributes($id, $name, $activities, $calories, $image, $ingredients)
    {
        $this->setId($id);
        $this->setActivities($activities);
        $this->setName($name);
        $this->setCalories($calories);
        $this->setImage($image);
        $this->setIngredients($ingredients);

    }

    /**
     * @return array
     */
    protected function getAllowedValues(): array
    {
        return [
            'id',
            'barcode',
            'name',
            'calories',
            'activities',
            'image',
            'ingredients',
        ];
    }
}