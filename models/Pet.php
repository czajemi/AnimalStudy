<?php

class Pet
{
    private $name;
    private $breed;
    private $ownerName;
    private $ownerPhone;
    private $image;

    public function __construct($name, $breed, $ownerName, $ownerPhone, $image)
    {
        $this->name = $name;
        $this->breed = $breed;
        $this->ownerName = $ownerName;
        $this->ownerPhone = $ownerPhone;
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

    public function getOwnerName(): string
    {
        return $this->ownerName;
    }

    public function setOwnerName(string $ownerName)
    {
        $this->ownerName = $ownerName;
    }

    public function getOwnerPhone(): string
    {
        return $this->ownerPhone;
    }

    public function setOwnerPhone(string $ownerPhone)
    {
        $this->ownerPhone = $ownerPhone;
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