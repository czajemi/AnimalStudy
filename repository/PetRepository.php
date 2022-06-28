<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Pet.php';

class PetRepository extends Repository
{

    public function getPet(int $id_pet): ?Pet
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM pet WHERE id_pet = :id_pet
        ');
        $stmt->bindParam(':id_pet', $id_pet, PDO::PARAM_INT);
        $stmt->execute();

        $pet = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$pet) {
            return null;
        }

        return new Pet(
            $pet['breed'],
            $pet['name'],
            $pet['image']
        );
    }

    public function addPet(Pet $pet): void
    {
        $stmt = $this->database->connect()->prepare('
        INSERT INTO pet (name, breed, image)
        VALUES (?, ?, ?)
        ');
        $stmt ->execute([
            $pet->getName(),
            $pet->getBreed(),
            $pet->getImage()
        ]);
    }
}