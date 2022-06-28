<?php

class Pet
{
    private $name;
    private $breed;
    private $image;

    public function __construct($name, $breed, $image)
    {
        $this->name = $name;
        $this->breed = $breed;
        $this->image = $image;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getBreed(): string
    {
        return $this->breed;
    }

    public function setBreed(string $breed)
    {
        $this->breed = $breed;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image)
    {
        $this->image = $image;
    }
}