<?php
require_once (__DIR__ . '/../templates/front_header.html');
?>
<main>
    <h1 class="text-center  mt-4">Détails de la mission</h1>
    <?php
    if (!isset ($_GET['missionId'])) {
        echo 'Veuillez cliquer sur une mission svp';
    } else {
        require_once (__DIR__.'/bdd_connexion.php');

//      Préparer une requête pour récupérer les détails de missions de la table 'missions' à partir de l'ID
        $statement = $pdo->prepare('SELECT * FROM missions WHERE id = :id');
        $statement->bindParam('id', $_GET['missionId'], PDO::PARAM_INT);

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
            while ($mission = $statement->fetch(PDO::FETCH_ASSOC)) {

                $missionArray = json_decode(json_encode($mission), true);
                $statusId = $missionArray['status'];

//              Préparation d'une seconde requête pour récupérer le nom du statut de mission dans la table 'mission_status' à partir de l'ID
                $statementTwo = $pdo->prepare('SELECT * FROM mission_status WHERE id = :statusId');
                $statementTwo->bindParam('statusId', $statusId, PDO::PARAM_INT);

                if ($statementTwo->execute()){
                    $statusName = $statementTwo->fetch(PDO::FETCH_ASSOC);

                    $countryId = $missionArray['country'];

//                  Préparation d'une 3ème requête pour récupérer le nom de pays de la table 'countries' à partir de l'ID
                    $statementThree = $pdo->prepare('SELECT * FROM countries WHERE id = :countryId');
                    $statementThree->bindParam('countryId', $countryId, PDO::PARAM_INT);

                    if ($statementThree->execute()){
                        $countryName = $statementThree->fetch(PDO::FETCH_ASSOC);

                        $specialityId = $missionArray['required_speciality'];

//                      Préparation d'une 4ème requête pour récupérer le nom de la spécialité de la tables 'specialities' à partir de l'ID
                        $statementFour = $pdo->prepare('SELECT * FROM specialities WHERE id = :specialityId');
                        $statementFour->bindParam('specialityId', $specialityId, PDO::PARAM_INT);

                        if($statementFour->execute()){
                            $specialityName = $statementFour->fetch(PDO::FETCH_ASSOC);

//                          Préparation d'une 5ème requête pour récupérer les personnes de terrain et leur type de la table 'field_persons' à partir de leur ID
                            $statementFive = $pdo->prepare('SELECT * FROM field_persons WHERE mission = :missionId AND type = :typeId');
                            $statementFive->bindParam('missionId', $missionArray['id'], PDO::PARAM_INT);
                            $statementFive->bindValue('typeId', 3, PDO::PARAM_INT);

                            if ($statementFive->execute()){
                                $targets = $statementFive->fetchAll(PDO::FETCH_ASSOC);

                                print_r($targets);

                                        echo '
                                        <div class="container-fluid">
                                            <h3>Nom de la mission : '.$missionArray['title'].'</h3>
                                            <div>
                                                <p class="mt-3">Nom de code : '.$missionArray['code_name'].'</p>
                                                <p>Pays d\'intervention : '.$countryName['french_name'].'</p>
                                                <p>Statut de la mission : '.$statusName['name'].'</p>
                                                <p>Spécialité requise : '.$specialityName['name'].'</p>';

                                            $numbersOfTargets = count($targets);
                                            if ($numbersOfTargets>1) {
                                                echo'<p>Cibles : <ul>';
                                                foreach($targets as $target){
                                                    echo '<li>'.$target['first_name'].' '.$target['last_name'].'</li>';
                                                }
                                                echo '</ul></p>';

                                            } else {
                                                echo'<p>Cible : '.$targets[0]['first_name'].' '.$targets[0]['last_name'].' (nom de code : '.$targets[0]['code_name'].')</p>';
                                            }


                                            echo'<p>Date de début : '.dateToFrench($missionArray['start_date'],'l d F o').'</p>
                                                <p>Date de fin : '.dateToFrench($missionArray['end_date'], 'l d F o').'</p>
                                                <p>
                                                Description : <br>
                                                '.$missionArray['description'].'
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
    ?>
</main>
<?php
require_once (__DIR__ . '/../templates/front_footer.html');
?>