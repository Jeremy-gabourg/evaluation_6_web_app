<?php

class FieldPersonType
{
    private int $id;
    private string $name;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function displaySelectTypesOptions (): void
    {
        try {

            echo '
                <div class="form-floating mt-5">
                <select class="form-select" id="floatingSelect2" aria-label="Floating label select example" name="types">
                    <option selected>Choisissez un type</option>

                ';

            include (__DIR__.'/../controleurs/bdd_connexion.php');
            $sql2 = 'SELECT * FROM field_persons_types ORDER BY name ASC';
            $statement2 = $pdo->prepare($sql2);
            if ($statement2->execute()) {
                while ($fieldPersonTypes = $statement2->fetchObject('FieldPersonStatus')) {
                    echo '<option value="' . $fieldPersonTypes->getId() . '">' . $fieldPersonTypes->getName() . '</option>';
                }
            }
            echo '
                </select>
                <label for="floatingSelect2">Types</label>
              </div>
                ';

        }  catch (PDOException $e) {
            echo 'Une erreur s\'est produite lors de la communication avec la base de données';
        }
    }

}