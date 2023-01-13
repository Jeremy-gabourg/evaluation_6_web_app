<?php

class SafeHouse
{
    private int $id;
    private string $address;
    private string $type;
    private int $is_available;
    private int|null $mission;
    private int $country;

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
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getIsAvailable(): int
    {
        return $this->is_available;
    }

    /**
     * @param int $is_available
     */
    public function setIsAvailable(int $is_available): void
    {
        $this->is_available = $is_available;
    }

    /**
     * @return int
     */
    public function getMission(): int
    {
        return $this->mission;
    }

    /**
     * @param int $mission
     */
    public function setMission(int $mission): void
    {
        $this->mission = $mission;
    }

    /**
     * @return int
     */
    public function getCountry(): int
    {
        return $this->country;
    }

    /**
     * @param int $country
     */
    public function setCountry(int $country): void
    {
        $this->country = $country;
    }


    public function displaySafeHousesList (): void
    {
        try {
            require (__DIR__.'/../controleurs/bdd_connexion.php');
            require_once (__DIR__.'/Country.php');
            require_once (__DIR__.'/SafeHouseType.php');

            if (!isset($_GET['page'])){
                $_GET['page']=1;
            }
            $currentpage = $_GET['page'];

            $sql = 'SELECT COUNT(*) AS nb_safe_houses FROM safe_houses';
            $statement1 = $pdo->prepare($sql);
            $statement1->execute();
            $result = $statement1->fetch();

            $nbSafeHouses = $result['nb_safe_houses'];
            $nbParPage = 45;
            $nbPages = ceil($nbSafeHouses/$nbParPage);
            $start = ($currentpage*$nbParPage)-$nbParPage;

            $sql2 = 'SELECT * FROM safe_houses ORDER BY id ASC  LIMIT :start, :nbParPage';
            $statement2 = $pdo->prepare($sql2);

            $statement2->bindParam('start', $start, PDO::PARAM_INT);
            $statement2->bindParam('nbParPage', $nbParPage, PDO::PARAM_INT);

            if ($statement2->execute()) {
                while($safeHouse = $statement2->fetchObject('SafeHouse')){
                    $sql3 = 'SELECT * FROM countries WHERE id=:id';
                    $statement3 = $pdo->prepare($sql3);
                    $countryId = $safeHouse->getCountry();
                    $statement3->bindParam('id', $countryId, PDO::PARAM_INT);

                    if($statement3->execute()) {
                        $country = $statement3->fetchObject('Country');
                        $sql4 = 'SELECT * FROM safe_houses_types WHERE id=:id';
                        $statement4 =$pdo->prepare($sql4);
                        $typeId = $safeHouse->getType();
                        $statement4->bindParam('id', $typeId, PDO::PARAM_INT);

                        if($statement4->execute()){
                            $type = $statement4->fetchObject('SafeHouseType');

                            echo     '<tr class="align-middle">
                                                <th scope="row">'.$safeHouse->getId().'</th>
                                                <td>'.$safeHouse->getAddress().'</td>
                                                <td>'.$country->getFrenchName().'</td>
                                                <td>'.$type->getName().'</td>';

                            if($safeHouse->getIsAvailable()==0) {
                                echo '    <td class="text-danger text-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                                            </svg>
                                          </td>';
                            } else {
                                echo '    <td class="text-success text-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                            </svg>
                                          </td>';
                            }

                            echo'
                                                <td class="text-end">
                                                    <form method="post" action="/controleurs/modify_country.php" class="d-inline-block">
                                                        <button type="submit" class="btn btn-warning" name="modifybutton" value="'.$safeHouse->getId().'">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                              <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                                            </svg>                                                            
                                                            <span class="d-none d-md-inline ps-1">Modifier</span>                                              
                                                        </button>
                                                        </form>
                                                        <form method="post" class="d-inline-block">
                                                        <button type="submit" class="btn btn-danger" name="suppressionbutton" value="'.$safeHouse->getId().'">
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
                                <a role="button" class="btn btn-success" href="/controleurs/add_safe_house.php">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                      <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                      <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                    </svg>
                                    <span class="ps-1">Ajouter un pays</span>
                                </a>
                            </div>';
                if($nbSafeHouses>$nbParPage){
                    echo '
                        <nav aria-label="Page navigation mt-4 bg-dark">
                          <ul class="pagination justify-content-center mt-4">
                             <li class="page-item ';if($currentpage == 1){echo'disabled';} else{"";};echo'"><a class="page-link" href="countries_listing.php/?page='.($currentpage-1).'">Precédente</a></li>';
                    for($page=1;$page<=$nbPages;$page++){
                        echo'<li class="page-item ';if($currentpage==$page){echo'active';}else{"";};echo'"><a class="page-link" href="countries_listing.php/?page='.$page.'">'.$page.'</a></li>';
                    }
                    echo'<li class="page-item ';if($currentpage == $nbPages){echo'disabled';}else{"";};echo'"><a class="page-link" href="countries_listing.php/?page='.($currentpage+1).'">Suivante</a></li>
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

    public function removeSafeHouse(int $safeHouseId): void
    {
        try {

            include (__DIR__.'/../controleurs/bdd_connexion.php');

            $sql2='DELETE FROM safe_houses WHERE id = :id';
            $statement = $pdo->prepare($sql2);

            $statement->bindParam('id', $safeHouseId, PDO::PARAM_INT);

            if ($statement->execute()) {
                echo '<div class="alert alert-success">La planque a été supprimée correctement de la base de données</div>';
            }
            else {
                $errorInfo = $statement->errorInfo();
                echo $errorInfo[2];
            }
        } catch (PDOException $e) {
            echo 'Une erreur s\'est produite lors de la communication avec la base de données';
        }
    }
}