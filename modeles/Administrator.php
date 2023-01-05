<?php

class Administrator
{
    private int $id;
    private string $first_name;
    private string $last_name;
    private string $email;
    private string $password;
    private int $creation_date;

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
    public function getFirstName(): string
    {
        return $this->first_name;
    }

    /**
     * @param string $first_name
     */
    public function setFirstName(string $first_name): void
    {
        $this->first_name = $first_name;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->last_name;
    }

    /**
     * @param string $last_name
     */
    public function setLastName(string $last_name): void
    {
        $this->last_name = $last_name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return int
     */
    public function getCreationDate(): int
    {
        return $this->creation_date;
    }

    /**
     * @param int $creation_date
     */
    public function setCreationDate(int $creation_date): void
    {
        $this->creation_date = $creation_date;
    }


    public function addAdministrator()
    {
        var_dump($_POST);
        $this->setLastName($_POST['lastName']);
        $this->setFirstName($_POST['firstName']);
        $this->setEmail($_POST['email']);
        $this->setPassword($_POST['password']);

        require_once (__DIR__.'/../controleurs/bdd_connexion.php');

        $sql = 'INSERT INTO administrators(first_name, last_name, email, password, creation_date) VALUES (:first_name, :last_name, :email, :password, :creation_date)';
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':first_name', $this->firstName, PDO::PARAM_STR);
        $statement->bindParam(':last_name', $this->lastName, PDO::PARAM_STR);
        $statement->bindParam(':email', $this->email, PDO::PARAM_STR);

        $statement->bindParam(':password', password_hash($this->password, PASSWORD_BCRYPT), PDO::PARAM_STR);

        $statement->bindParam(':creation_date', $this->creation_date, PDO::PARAM_INT);
        if ($statement->execute()){
            echo 'L\'utilisateur a bien été créé';
        } else {
            echo 'Impossible de créer l\'utilisateur';
        }
    }
}