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

            include (__DIR__.'/../controleurs/bdd_connexion.php');
            $sql2 = 'SELECT * FROM field_persons_types ORDER BY name ASC';
            $statement2 = $pdo->prepare($sql2);
            if ($statement2->execute()) {
                while ($fieldPersonTypes = $statement2->fetchObject('FieldPersonType')) {
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

    public function displayPersonTypesList (): void
    {
        try {
            require (__DIR__.'/../controleurs/bdd_connexion.php');

            if (!isset($_GET['page'])){
                $_GET['page']=1;
            }
            $currentpage = $_GET['page'];

            $sql = 'SELECT COUNT(*) AS nb_types FROM field_persons_types';
            $statement1 = $pdo->prepare($sql);
            $statement1->execute();
            $result = $statement1->fetch();

            $nb_field_persons_types = $result['nb_types'];
            $nbParPage = 5;
            $nbPages = ceil($nb_field_persons_types/$nbParPage);
            $start = ($currentpage*$nbParPage)-$nbParPage;

            $sql2 = 'SELECT * FROM field_persons_types ORDER BY name ASC  LIMIT :start, :nbParPage';
            $statement2 = $pdo->prepare($sql2);

            $statement2->bindParam('start', $start, PDO::PARAM_INT);
            $statement2->bindParam('nbParPage', $nbParPage, PDO::PARAM_INT);

            if ($statement2->execute()) {
                while($types = $statement2->fetchObject('FieldPersonType')){
                    echo     '<tr class="align-middle">
                                                <th scope="row">'.$types->getId().'</th>
                                                <td>'.$types->getName().'</td>
                                                <td class="text-end">
                                                    <form method="post" action="/controleurs/modify_field_person_type.php" class="d-inline-block">
                                                        <button type="submit" class="btn btn-warning" name="modifybutton" value="'.$types->getId().'">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                              <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                                            </svg>                                                            
                                                            <span class="d-none d-md-inline ps-1">Modifier</span>                                              
                                                        </button>
                                                        </form>
                                                        <form method="post" class="d-inline-block">
                                                        <button type="submit" class="btn btn-danger" name="suppressionbutton" value="'.$types->getId().'">
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
                echo '   
                            </tbody>
                            </table>
                            </div>
                            <div class="text-center mt-4">
                                <a role="button" class="btn btn-success" href="/controleurs/add_field_person_type.php">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                      <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                      <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                    </svg>
                                    <span class="ps-1">Ajouter un Type</span>
                                </a>
                            </div>';
                if($nb_field_persons_types>$nbParPage){
                    echo '
                        <nav aria-label="Page navigation mt-4 bg-dark">
                          <ul class="pagination justify-content-center mt-4">
                             <li class="page-item ';if($currentpage == 1){echo'disabled';} else{"";};echo'"><a class="page-link" href="field_person_types_listing.php/?page='.($currentpage-1).'">Precédente</a></li>';
                    for($page=1;$page<=$nbPages;$page++){
                        echo'<li class="page-item ';if($currentpage==$page){echo'active';}else{"";};echo'"><a class="page-link" href="field_person_types_listing.php/?page='.$page.'">'.$page.'</a></li>';
                    }
                    echo'<li class="page-item ';if($currentpage == $nbPages){echo'disabled';}else{"";};echo'"><a class="page-link" href="field_person_types_listing.php/?page='.($currentpage+1).'">Suivante</a></li>
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

    public function removeFieldPersonTypes(int $typesId): void
    {
        try {

            include (__DIR__.'/../controleurs/bdd_connexion.php');

            $sql2='DELETE FROM field_persons_types WHERE id = :id';
            $statement = $pdo->prepare($sql2);

            $statement->bindParam('id', $typesId, PDO::PARAM_INT);

            if ($statement->execute()) {
                echo '<div class="alert alert-success">Le type a été supprimé correctement de la base de données</div>';
            }
            else {
                $errorInfo = $statement->errorInfo();
                echo $errorInfo[2];
            }
        } catch (PDOException $e) {
            echo 'Une erreur s\'est produite lors de la communication avec la base de données';
        }
    }

    public function addType(): void
    {
        if ($_POST['name']!=="") {

            try {

                $this->setName($_POST['name']);

                require_once (__DIR__.'/../controleurs/bdd_connexion.php');

                $sql = 'INSERT INTO field_persons_types(name) VALUES (:name)';
                $statement = $pdo->prepare($sql);
                $statement->bindParam('name', $this->name, PDO::PARAM_STR);

                if ($statement->execute()){
                    echo '
                <div class="alert alert-success mt-4" role="alert">
                  Le type a été créé avec succès!
                </div>';
                } else {
                    echo '
                <div class="alert alert-danger mt-4" role="alert">
                  Impossible de créer le type !
                </div>';
                }

                echo '
                </main>
                </div>
                </body>
                </html>';

            } catch (PDOException $e) {
                echo 'Une erreur s\'est produite lors de la communication avec la base de données';
            }
        } else {
            echo '<div class="alert alert-danger mt-4">Merci de ne laisser aucun champs vide</div>';
        }
    }

    public function displaySelectedType(int $fieldPersonTypeId): void
    {
        try {
            $sql = 'SELECT * FROM field_persons_types WHERE id=:id';

            include (__DIR__.'/../controleurs/bdd_connexion.php');
            $statement=$pdo->prepare($sql);
            $statement->bindParam('id', $fieldPersonTypeId, PDO::PARAM_INT);
            if($statement->execute()) {
                while ($type = $statement->fetchObject('FieldPersonType')) {
                    require_once (__DIR__.'/../vues/back_template.html');
                    require_once (__DIR__ . '/../vues/modify_field_person_type_form.php');
                    $_SESSION['fieldPersontypeId'] = $fieldPersonTypeId;
                }
                echo '
                </main>
                </div>
                </body>
                </html>';
            }
        } catch (PDOException $e) {
            echo 'Une erreur s\'est produite lors de la communication avec la base de données';
        }
    }

    public function modifyType($fieldPersonTypeId): void
    {
        try {
            require_once (__DIR__.'/../controleurs/bdd_connexion.php');

            $this->setId($fieldPersonTypeId);
            $this->setName($_POST['name']);

            $sql='UPDATE field_persons_types SET name=:name WHERE id=:id';
            $statement = $pdo->prepare($sql);
            $statement->bindValue('name', $this->name, PDO::PARAM_STR);
            $statement->bindValue('id', $this->id, PDO::PARAM_INT);

            if($statement->execute()){
                $type=$this;
                require_once (__DIR__.'/../vues/modify_field_person_type_form.php');
                echo '<div class="alert alert-success mt-4">Les modifications ont bien été enregistrées</div>';
            } else {
                echo '<div class="alert alert-danger mt-4">Problème lors de l\'enregistrement des données</div>';
            }
            echo '
                </main>
                </body>
                </html>';
        } catch (PDOException $e) {
            echo 'Une erreur s\'est produite lors de la communication avec la base de données';
        }
    }
}