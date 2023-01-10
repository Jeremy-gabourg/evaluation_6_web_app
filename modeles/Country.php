<?php

class Country
{
    private int $id;
    private int $country_code;
    private string $alpha2_code;
    private string $alpha3_code;
    private string $english_name;
    private string $french_name;

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
     * @return int
     */
    public function getCountryCode(): int
    {
        return $this->country_code;
    }

    /**
     * @param int $country_code
     */
    public function setCountryCode(int $country_code): void
    {
        $this->country_code = $country_code;
    }

    /**
     * @return string
     */
    public function getAlpha2Code(): string
    {
        return $this->alpha2_code;
    }

    /**
     * @param string $alpha2_code
     */
    public function setAlpha2Code(string $alpha2_code): void
    {
        $this->alpha2_code = $alpha2_code;
    }

    /**
     * @return string
     */
    public function getAlpha3Code(): string
    {
        return $this->alpha3_code;
    }

    /**
     * @param string $alpha3_code
     */
    public function setAlpha3Code(string $alpha3_code): void
    {
        $this->alpha3_code = $alpha3_code;
    }

    /**
     * @return string
     */
    public function getEnglishName(): string
    {
        return $this->english_name;
    }

    /**
     * @param string $english_name
     */
    public function setEnglishName(string $english_name): void
    {
        $this->english_name = $english_name;
    }

    /**
     * @return string
     */
    public function getFrenchName(): string
    {
        return $this->french_name;
    }

    /**
     * @param string $french_name
     */
    public function setFrenchName(string $french_name): void
    {
        $this->french_name = $french_name;
    }

    public function displayCountriesList (): void
    {
        try {
            require (__DIR__.'/../controleurs/bdd_connexion.php');

            if (!isset($_GET['page'])){
                $_GET['page']=1;
            }
            $currentpage = $_GET['page'];

            $sql = 'SELECT COUNT(*) AS nb_countries FROM countries';
            $statement1 = $pdo->prepare($sql);
            $statement1->execute();
            $result = $statement1->fetch();

            $nbCountries = $result['nb_countries'];
            $nbParPage = 45;
            $nbPages = ceil($nbCountries/$nbParPage);
            $start = ($currentpage*$nbParPage)-$nbParPage;

            $sql2 = 'SELECT * FROM countries ORDER BY french_name ASC  LIMIT :start, :nbParPage';
            $statement2 = $pdo->prepare($sql2);

            $statement2->bindParam('start', $start, PDO::PARAM_INT);
            $statement2->bindParam('nbParPage', $nbParPage, PDO::PARAM_INT);

            if ($statement2->execute()) {
                while($country = $statement2->fetchObject('Country')){
                    echo     '<tr class="align-middle">
                                                <th scope="row">'.$country->getFrenchName().'</th>
                                                <td>'.$country->getAlpha3Code().'</td>
                                                <td>'.$country->getCountryCode().'</td>
                                                <td class="text-end">
                                                    <form method="post">
                                                        <button type="submit" class="btn btn-warning" name="modifybutton" value="'.$country->getId().'">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                              <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                                            </svg>                                                            
                                                            <span class="d-none d-md-inline ps-1">Modifier</span>                                              
                                                        </button>
                                                        <button type="submit" class="btn btn-danger" name="suppressionbutton" value="'.$country->getId().'">
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
                                <a role="button" class="btn btn-success" href="/controleurs/add_country.php">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                      <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                      <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                    </svg>
                                    <span class="ps-1">Ajouter un pays</span>
                                </a>
                            </div>';
                if($nbCountries>$nbParPage){
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

    public function removeCountry(int $countryId): void
    {
        try {

            include (__DIR__.'/../controleurs/bdd_connexion.php');

            $sql2='DELETE FROM countries WHERE id = :id';
            $statement = $pdo->prepare($sql2);

            $statement->bindParam('id', $countryId, PDO::PARAM_INT);

            if ($statement->execute()) {
                echo '<div class="alert alert-success">Le pays a été supprimé correctement de la base de données</div>';
            }
            else {
                $errorInfo = $statement->errorInfo();
                echo $errorInfo[2];
            }
        } catch (PDOException $e) {
            echo 'Une erreur s\'est produite lors de la communication avec la base de données';
        }
    }

    public function addCountry(): void
    {
        $this->setFrenchName($_POST['frenchName']);
        $this->setEnglishName($_POST['englishName']);
        $this->setCountryCode($_POST['countryCode']);
        $this->setAlpha2Code($_POST['alphaCode2']);
        $this->setAlpha3Code($_POST['alphaCode3']);

        try {
            if ($this->alpha3_code!=="" && $this->alpha2_code!=="" && $this->country_code!=="" && $this->english_name!=="" && $this->french_name!=="") {
                require_once (__DIR__.'/../controleurs/bdd_connexion.php');

                $sql = 'INSERT INTO countries(french_name, english_name, country_code, alpha2_code, alpha3_code) VALUES (:french_name, :english_name, :country_code, :alpha2_code, :alpha3_code)';
                $statement = $pdo->prepare($sql);
                $statement->bindParam('french_name', $this->french_name, PDO::PARAM_STR);
                $statement->bindParam('english_name', $this->english_name, PDO::PARAM_STR);
                $statement->bindParam('country_code', $this->country_code, PDO::PARAM_INT);
                $statement->bindParam('alpha2_code', $this->alpha2_code, PDO::PARAM_STR);
                $statement->bindParam('alpha3_code', $this->alpha3_code, PDO::PARAM_STR);

                if ($statement->execute()){
                    echo '
                <div class="alert alert-success mt-4" role="alert">
                  Le pays a été créé avec succès!
                </div>';
                } else {
                    echo '
                <div class="alert alert-danger mt-4" role="alert">
                  Impossible de créer le pays !
                </div>';
                }
            } else {
                echo '<div class="alert alert-danger">Merci de ne laisser aucun champs vide</div>';
            }

            echo '
            </main>
            </div>
            </body>
            </html>';

        } catch (PDOException $e) {
            echo 'Une erreur s\'est produite lors de la communication avec la base de données';
        }
    }
}