<?php

class Mission
{
    private int $id;
    private string $title;
    private string $description;
    private string $code_name;
    private int $country;
    private int $type;
    private int $status;
    private int $required_speciality;
    private string $start_date;
    private string $end_date;

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
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getCodeName(): string
    {
        return $this->code_name;
    }

    /**
     * @param string $code_name
     */
    public function setCodeName(string $code_name): void
    {
        $this->code_name = $code_name;
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
    public function getRequiredSpeciality(): int
    {
        return $this->required_speciality;
    }

    /**
     * @param int $required_speciality
     */
    public function setRequiredSpeciality(int $required_speciality): void
    {
        $this->required_speciality = $required_speciality;
    }

    /**
     * @return string
     */
    public function getStartDate(): string
    {
        return $this->start_date;
    }

    /**
     * @param string $start_date
     */
    public function setStartDate(string $start_date): void
    {
        $this->start_date = $start_date;
    }

    /**
     * @return string
     */
    public function getEndDate(): string
    {
        return $this->end_date;
    }

    /**
     * @param string $end_date
     */
    public function setEndDate(string $end_date): void
    {
        $this->end_date = $end_date;
    }


    public function displayMissionsList()
    {
        try {
            require_once(__DIR__.'/MissionStatus.php');
            require_once(__DIR__.'/../controleurs/bdd_connexion.php');

            if (!isset($_GET['page'])){
                $_GET['page']=1;
            }
            $currentpage = $_GET['page'];

            $sql = 'SELECT COUNT(*) AS nb_missions FROM missions';
            $statement = $pdo->prepare($sql);
            $statement->execute();
            $result = $statement->fetch();

            $nbMissions = $result['nb_missions'];
            $nbParPage = 5;
            $nbPages = ceil($nbMissions/$nbParPage);
            $start = ($currentpage*$nbParPage)-$nbParPage;

            $sql1 = 'SELECT * FROM missions ORDER BY id ASC LIMIT :start, :nbParPage';
            $statement1 = $pdo->prepare($sql1);
            $statement1->bindValue('start', $start, PDO::PARAM_INT);
            $statement1->bindValue('nbParPage', $nbParPage, PDO::PARAM_INT);

            if ($statement1->execute()) {
                while($mission = $statement1->fetchObject('Mission')){
                    $statusId = $mission->getStatus();

                    require_once(__DIR__ . '/../modeles/MissionStatus.php');
                    $sql2 = 'SELECT * FROM mission_status WHERE id LIKE ?';
                    $statement2 = $pdo->prepare($sql2);
                    $statement2->bindParam(1, $statusId, PDO::PARAM_INT);
                    if ($statement2->execute()){
                        $statusName = $statement2->fetchObject('MissionStatus');
                        echo     '<tr>
                                                <th scope="row">'.$mission->getId().'</th>
                                                <td>'.$mission->getTitle().'</td>
                                                <td  class="d-none d-md-block">'.$mission->getCodeName().'</td>
                                                <td>'.$statusName->getName().'</td>
                                                <td>
                                                    <a role="button" class="text-success" href="/controleurs/mission_details.php?missionId='.$mission->getId().'">
                                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                          <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                          <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                      </svg>
                                                    </a>
                                                </td>
                                            </tr>
                                        ';
                    }
                } echo '    </tbody>
                            </table>
                            </div>
                            </main>';
                if($nbMissions>$nbParPage){
                    echo '
                        <nav aria-label="Page navigation mt-4 bg-dark">
                          <ul class="pagination justify-content-center mt-4">
                             <li class="page-item ';if($currentpage == 1){echo'disabled';} else{"";};echo'"><a class="page-link" href="index.php/?page='.($currentpage-1).'">Precédente</a></li>';
                    for($page=1;$page<=$nbPages;$page++){
                        echo'<li class="page-item ';if($currentpage==$page){echo'active';}else{"";};echo'"><a class="page-link" href="index.php/?page='.$page.'">'.$page.'</a></li>';
                    }
                    echo'<li class="page-item ';if($currentpage == $nbPages){echo'disabled';}else{"";};echo'"><a class="page-link" href="index.php/?page='.($currentpage+1).'">Suivante</a></li>
                          </ul>
                        </nav>
                        </main>
                        </body>
                        </html>
                        ';
                }
            }
            else {
                $errorInfo = $statement->errorInfo();
                echo $errorInfo[2];
            }
        } catch (PDOException $e) {
            echo 'Une erreur s\'est produite lors de la communication avec la base de données';
        }
    }

    public function displayMissionDetails()
    {
        echo '    <main class="container-md">
                <h1 class="text-center  mt-4">Détails de la mission</h1>';

        if ($_GET['missionId']=="" || !isset($_GET['missionId'])) {
            echo '<div class="alert alert-danger mt-4">Veuillez cliquer sur une mission svp</div>';
        } else {
            require_once(__DIR__.'/MissionStatus.php');
            require_once(__DIR__.'/Country.php');
            require_once(__DIR__.'/Speciality.php');

            require_once(__DIR__ . '/../controleurs/bdd_connexion.php');

        //      Préparer une requête pour récupérer les détails de missions de la table 'missions' à partir de l'ID
            $statement = $pdo->prepare('SELECT * FROM missions WHERE id = :id');
            $missionId = $_GET['missionId'];
            $statement->bindParam('id', $missionId, PDO::PARAM_INT);

            setlocale(LC_TIME, 'fr_FR', 'French');
            function dateToFrench($date, $format) :string
            {
                $english_days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
                $french_days = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche');
                $english_months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
                $french_months = array('janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre');
                return str_replace($english_months, $french_months, str_replace($english_days, $french_days, date($format, strtotime($date) ) ) );
            }

            if ($statement->execute()) {
                while ($mission = $statement->fetchObject('Mission')) {

                    $statusId = $mission->getStatus();

        //              Préparation d'une seconde requête pour récupérer le nom du statut de mission dans la table 'mission_status' à partir de l'ID
                    $statementTwo = $pdo->prepare('SELECT * FROM mission_status WHERE id = :statusId');
                    $statementTwo->bindParam('statusId', $statusId, PDO::PARAM_INT);

                    if ($statementTwo->execute()){
                        $status = $statementTwo->fetchObject('MissionStatus');

                        $countryId = $mission->getCountry();

        //                  Préparation d'une 3ème requête pour récupérer le nom de pays de la table 'countries' à partir de l'ID
                        $statementThree = $pdo->prepare('SELECT * FROM countries WHERE id = :countryId');
                        $statementThree->bindParam('countryId', $countryId, PDO::PARAM_INT);

                        if ($statementThree->execute()){
                            $country = $statementThree->fetchObject('Country');

                            $specialityId = $mission->getRequiredSpeciality();

        //                      Préparation d'une 4ème requête pour récupérer le nom de la spécialité de la tables 'specialities' à partir de l'ID
                            $statementFour = $pdo->prepare('SELECT * FROM specialities WHERE id = :specialityId');
                            $statementFour->bindParam('specialityId', $specialityId, PDO::PARAM_INT);

                            if($statementFour->execute()){
                                $speciality = $statementFour->fetchObject('Speciality');

        //                          Préparation d'une 5ème requête pour récupérer les cibles parmi les personnes de terrain de la table 'field_persons' à partir de l'ID de mission
                                $statementFive = $pdo->prepare('SELECT * FROM field_persons WHERE mission = :missionId AND type = :typeId');
                                $statementFive->bindParam('missionId', $missionId, PDO::PARAM_INT);
                                $statementFive->bindValue('typeId', 3, PDO::PARAM_INT);

                                if ($statementFive->execute()){
                                    $targets = $statementFive->fetchAll(PDO::FETCH_ASSOC);

        //                                  Préparation d'une 6ème requête pour récupérer les agents parmi les personnes de terrain de la table 'field_persons' à partir de l'ID de mission
                                    $statementSix = $pdo->prepare('SELECT * FROM field_persons WHERE mission = :missionId AND type = :typeId');
                                    $statementSix->bindParam('missionId', $missionId, PDO::PARAM_INT);
                                    $statementSix->bindValue('typeId', 1, PDO::PARAM_INT);

                                    if($statementSix->execute()){
                                        $agents = $statementSix->fetchAll(PDO::FETCH_ASSOC);

                                        echo '
                                                <div class="container-fluid">
                                                    <h3 class="mt-4"><span class="text-decoration-underline">Titre :</span> '.$mission->getTitle().'</h3>
                                                    <div>
                                                        <p class="mt-4"><span class="text-decoration-underline">Nom de code :</span> '.$mission->getCodeName().'</p>
                                                        <p class="mt-4"><span class="text-decoration-underline">Pays d\'intervention :</span> '.$country->getFrenchName().'</p>
                                                        <p><span class="text-decoration-underline">Statut de la mission :</span> '.$status->getName().'</p>
                                                        <p><span class="text-decoration-underline">Spécialité requise :</span> '.$speciality->getName().'</p>';

                                        $numbersOfTargets = count($targets);
                                        if ($numbersOfTargets>1) {
                                            echo'<p class="text-decoration-underline">Cibles : <ul>';
                                            foreach($targets as $target){
                                                echo '<li>'.$target['first_name'].' '.$target['last_name'].' (nom de code : '.$target['code_name_or_identification'].')</li>';
                                            }
                                            echo '</ul></p>';
                                        } else {
                                            echo'<p><span class="text-decoration-underline">Cible :</span> '.$targets[0]['first_name'].' '.$targets[0]['last_name'].' (nom de code : '.$targets[0]['code_name_or_identification'].')</p>';
                                        }

                                        $numbersOfAgents = count($agents);
                                        if ($numbersOfAgents>1) {
                                            echo'<p class="text-decoration-underline">Agents : <ul>';
                                            foreach($agents as $agent){
                                                echo '<li>'.$agent['first_name'].' '.$agent['last_name'].' (code d\'identification : '.$agent['code_name_or_identification'].')</li></ul></p>';
                                            }
                                        } else {
                                            echo'<p><span class="text-decoration-underline">Agent :</span>  '.$agents[0]['first_name'].' '.$agents[0]['last_name'].' (code d\'identification : '.$agents[0]['code_name_or_identification'].')</p>';
                                        }


                                        echo'<p><span class="text-decoration-underline">Date de début :</span> '.dateToFrench($mission->getStartDate(),'l d F o').'</p>
                                                     <p><span class="text-decoration-underline">Date de fin :</span> '.dateToFrench($mission->getEndDate(), 'l d F o').'</p>
                                                     <p>
                                                     <span class="text-decoration-underline">Description :</span> <br>
                                                     '.$mission->getDescription().'
                                                     </p>
                                                    </div>
                                                </div>
                                                ';

                                    }
                                }
                            }
                        }
                    }
                }
            }
        } echo '</main>';

    }
}

