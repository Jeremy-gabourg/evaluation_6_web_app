<?php

require_once (__DIR__.'/../modeles/AgentSpeciality.php');

class FieldPerson
{
    private string $id;
    private string $first_name;
    private string $last_name;
    private string $birth_date;
    private string $code_name_or_identification;
    private int $status;
    private int $type;
    private int $country_of_birth;
    private array $agentSpecialities;
    private $mission;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
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
        $this->first_name = ucfirst(strtolower($first_name));
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
        $this->last_name = strtoupper(strtolower($last_name));
    }

    /**
     * @return string
     */
    public function getBirthDate(): string
    {
        return $this->birth_date;
    }

    /**
     * @param string $birth_date
     */
    public function setBirthDate(string $birth_date): void
    {
        $this->birth_date = $birth_date;
    }

    /**
     * @return string
     */
    public function getCodeNameOrIdentification(): string
    {
        return $this->code_name_or_identification;
    }

    /**
     * @param string $code_name_or_identification
     */
    public function setCodeNameOrIdentification(string $code_name_or_identification): void
    {
        $this->code_name_or_identification = $code_name_or_identification;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @param int $type
     */
    public function setType(int $type): void
    {
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getCountryOfBirth(): int
    {
        return $this->country_of_birth;
    }

    /**
     * @param int $country_of_birth
     */
    public function setCountryOfBirth(int $country_of_birth): void
    {
        $this->country_of_birth = $country_of_birth;
    }

    /**
     * @return array
     */
    public function getAgentSpecialities(): array
    {
        return $this->agentSpecialities;
    }

    /**
     * @param array $agentSpecialities
     */
    public function setAgentSpecialities(array $agentSpecialities): void
    {
        $this->agentSpecialities = $agentSpecialities;
    }

    /**
     * @return
     */
    public function getMission()
    {
        return $this->mission;
    }

    /**
     * @param int $mission
     */
    public function setMission( $mission): void
    {
        $this->mission = $mission;
    }

    public function displayFieldPersonsList (): void
    {
        try {
            require (__DIR__.'/../controleurs/bdd_connexion.php');

            if (!isset($_GET['page'])){
                $_GET['page']=1;
            }
            $currentpage = $_GET['page'];

            $sql = 'SELECT COUNT(*) AS nb_field_persons FROM field_persons';
            $statement1 = $pdo->prepare($sql);
            $statement1->execute();
            $result = $statement1->fetch();

            $nbFieldPersons = $result['nb_field_persons'];
            $nbParPage = 5;
            $nbPages = ceil($nbFieldPersons/$nbParPage);
            $start = ($currentpage*$nbParPage)-$nbParPage;

            $sql2 = 'SELECT * FROM field_persons ORDER BY last_name, first_name ASC  LIMIT :start, :nbParPage';
            $statement2 = $pdo->prepare($sql2);

            $statement2->bindParam('start', $start, PDO::PARAM_INT);
            $statement2->bindParam('nbParPage', $nbParPage, PDO::PARAM_INT);

            if ($statement2->execute()) {
                while($fieldPerson = $statement2->fetchObject('FieldPerson')) {

                    $statusId = $fieldPerson->getStatus();
                    require_once(__DIR__ . '/../modeles/FieldPersonStatus.php');
                    $sql3 = 'SELECT * FROM field_persons_status WHERE id=:id';
                    $statement3 = $pdo->prepare($sql3);
                    $statement3->bindParam('id', $statusId, PDO::PARAM_INT);
                    if ($statement3->execute()) {
                        $status = $statement3->fetchObject('FieldPersonStatus');

                        $typeId = $fieldPerson->getType();
                        require_once(__DIR__ . '/../modeles/FieldPersonType.php');
                        $sql4 = 'SELECT * FROM field_persons_types WHERE id=:id';
                        $statement4 = $pdo->prepare($sql4);
                        $statement4->bindParam('id', $typeId, PDO::PARAM_INT);
                        if ($statement4->execute()) {
                            $type = $statement4->fetchObject('FieldPersonType');

                            echo '<tr class="align-middle">
                                                <th scope="row">' . $fieldPerson->getFirstName() . '</th>
                                                <td>' . $fieldPerson->getLastName() . '</td>
                                                <td>' . $fieldPerson->getCodeNameOrIdentification() . '</td>
                                                <td>' . $status->getName() . '</td>
                                                <td>' . $type->getName() . '</td>
                                                <td class="text-end">
                                                    <form method="post">
                                                        <button type="submit" class="btn btn-warning" name="modifybutton" value="'.$fieldPerson->getId().'">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                              <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                                            </svg>                                                            
                                                            <span class="d-none d-md-inline ps-1">Modifier</span>                                              
                                                        </button>
                                                        <button type="submit" class="btn btn-danger" name="suppressionbutton" value="' . $fieldPerson->getId() . '">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                              <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                                            </svg>      
                                                            <span class="d-none d-md-inline ps-1">Supprimer</span>                                              
                                                        </button>
                                                    </form>
                                                </td>
                                    </tr>
                                        ';
                        }
                    }
                }
                    echo '   
                            </tbody>
                            </table>
                            </div>
                            <div class="text-center mt-4">
                                <a role="button" class="btn btn-success" href="/controleurs/add_field_person.php">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                      <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                      <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                    </svg>
                                    <span class="ps-1">Ajouter une personne de terrain</span>
                                </a>
                            </div>';
                        if ($nbFieldPersons > $nbParPage) {
                            echo '
                        <nav aria-label="Page navigation mt-4 bg-dark">
                          <ul class="pagination justify-content-center mt-4">
                             <li class="page-item ';
                            if ($currentpage == 1) {
                                echo 'disabled';
                            } else {
                                "";
                            };
                            echo '"><a class="page-link" href="field_persons_listing.php/?page=' . ($currentpage - 1) . '">Precédente</a></li>';
                            for ($page = 1; $page <= $nbPages; $page++) {
                                echo '<li class="page-item ';
                                if ($currentpage == $page) {
                                    echo 'active';
                                } else {
                                    "";
                                };
                                echo '"><a class="page-link" href="field_persons_listing.php/?page=' . $page . '">' . $page . '</a></li>';
                            }
                            echo '<li class="page-item ';
                            if ($currentpage == $nbPages) {
                                echo 'disabled';
                            } else {
                                "";
                            };
                            echo '"><a class="page-link" href="field_persons_listing.php/?page=' . ($currentpage + 1) . '">Suivante</a></li>
                          </ul>
                        </nav>
                        </main>
                        </body>
                        </html>
                        ';
                        } else {
                        echo '</main>
                              </body>
                              </html>';
                        }

            }
            else {
                $errorInfo = $statement2->errorInfo();
                echo $errorInfo[2];
            }
        } catch (PDOException $e) {
            echo 'Une erreur s\'est produite lors de la communication avec la base de données';
        }
    }

    public function removeFieldPerson(string $fieldPersonId): void
    {
        try {

            include (__DIR__.'/../controleurs/bdd_connexion.php');

            $sql2='DELETE FROM field_persons WHERE id = :id';
            $statement = $pdo->prepare($sql2);

            $statement->bindParam('id', $fieldPersonId, PDO::PARAM_STR);

            if ($statement->execute()) {
                echo '<div class="alert alert-success">L\'agent de terrain a été supprimé correctement de la base de données</div>';
            }
            else {
                $errorInfo = $statement->errorInfo();
                echo $errorInfo[2];
            }
        } catch (PDOException $e) {
            echo 'Une erreur s\'est produite lors de la communication avec la base de données';
        }
    }

    public function displayForm() {
        try {
            require_once (__DIR__.'/FieldPersonStatus.php');
            require_once (__DIR__.'/FieldPersonType.php');
            require_once (__DIR__.'/Country.php');

            require_once (__DIR__ . '/../vues/add_person_field_form.php');
            echo '</main>
                  </body>
                  </html>';
        } catch (PDOException $e) {
            echo 'Une erreur s\'est produite lors de la communication avec la base de données';
        }
    }
    function guidv4($data = null) {
        // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
        $data = $data ?? random_bytes(16);
        assert(strlen($data) == 16);

        // Set version to 0100
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        // Set bits 6-7 to 10
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

        // Output the 36 character UUID.
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }
    public function addFieldPerson(): void
    {
        if ($_POST['firstName']!=="" && $_POST['lastName']!=="" && $_POST['birthDate']!=="" && $_POST['codeNameOrIdentificationCode']!=="" && $_POST['status']!=="" && $_POST['types']!=="" && $_POST['placeOfBirth']!=="") {

            $this->setId($this->guidv4());
            $dateOfBirth = date('Y-m-d',strtotime($_POST['birthDate']));
            $this->setFirstName($_POST['firstName']);
            $this->setLastName($_POST['lastName']);
            $this->setBirthDate($dateOfBirth);
            $this->setCodeNameOrIdentification($_POST['codeNameOrIdentificationCode']);
            $this->setStatus($_POST['status']);
            $this->setType($_POST['types']);

            try {

                include (__DIR__.'/../controleurs/bdd_connexion.php');
                require_once (__DIR__.'/Country.php');

                $sql = 'SELECT * FROM countries WHERE french_name=:french_name';
                $statement = $pdo->prepare($sql);
                $statement->bindValue('french_name', $_POST['placeOfBirth'], PDO::PARAM_STR);

                if($statement->execute()) {
                    $placeOfBirth = $statement->fetchObject('Country');
                    $this->setCountryOfBirth($placeOfBirth->getId());

                    $sql1 = 'INSERT INTO field_persons(id, first_name, last_name, birth_date, code_name_or_identification, status, type, country_of_birth) VALUES (:id, :first_name, :last_name, :birth_date, :code_name_or_identification, :status, :type, :country_of_birth)';
                    $statement1 = $pdo->prepare($sql1);
                    $statement1->bindValue('id', $this->id, PDO::PARAM_STR);
                    $statement1->bindValue('first_name', $this->first_name, PDO::PARAM_STR);
                    $statement1->bindValue('last_name', $this->last_name, PDO::PARAM_STR);
                    $statement1->bindValue('birth_date', $this->birth_date, PDO::PARAM_STR);
                    $statement1->bindValue('code_name_or_identification', $this->code_name_or_identification, PDO::PARAM_STR);
                    $statement1->bindValue('status', $this->status, PDO::PARAM_INT);
                    $statement1->bindValue('type', $this->type, PDO::PARAM_INT);
                    $statement1->bindValue('country_of_birth', $this->country_of_birth, PDO::PARAM_INT);

                    if ($statement1->execute()){
                        echo '
                <main class="col">
                <div class="alert alert-success mt-4" role="alert">
                  L\'agent de terrain a été créé avec succès!
                </div>
                </main>
                </body>
                </html>
                ';
                    } else {
                        echo '
                <main class="col">
                <div class="alert alert-danger mt-4" role="alert">
                  Impossible de créer l\'agent de terrain !
                </main>
                </div>
                </body>
                </html>';
                    }
                }

            } catch (PDOException $e) {
                echo 'Une erreur s\'est produite lors de la communication avec la base de données';
            }
        } else {
            echo '<div class="alert alert-danger mt-4">Merci de ne laisser aucun champs vide</div>';
        }
    }
}