<?php

class FieldPersonStatus
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


    public function displaySelectStatusOptions (): void
    {

        echo '
                <div class="form-floating mt-5">
                <select class="form-select" id="floatingSelect1" aria-label="Floating label select example" name="status">
                    <option selected>Choisissez un statut</option>
                ';

        try {
            include (__DIR__.'/../controleurs/bdd_connexion.php');
            $sql5 = 'SELECT * FROM field_persons_status ORDER BY name ASC';
            $statement5 = $pdo->prepare($sql5);
            if ($statement5->execute()) {
                while ($fieldPersonStatus = $statement5->fetchObject('FieldPersonStatus')) {
                        echo '<option value="' . $fieldPersonStatus->getId() . '">' . $fieldPersonStatus->getName() . '</option>';
                }
            }
        }  catch (PDOException $e) {
        echo 'Une erreur s\'est produite lors de la communication avec la base de données';
        }

        echo '
                </select>
                <label for="floatingSelect1">Status</label>
              </div>
                ';

    }
}