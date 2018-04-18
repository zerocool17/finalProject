/* Update the animal id where it matches */
UPDATE final_animal
SET name = :name, cost = :cost
WHERE animalid = :animalid