<?php
require_once (__DIR__ . '/../templates/front_header.php');
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

//                          Préparation d'une 5ème requête pour récupérer les cibles parmi les personnes de terrain de la table 'field_persons' à partir de l'ID de mission
                            $statementFive = $pdo->prepare('SELECT * FROM field_persons WHERE mission = :missionId AND type = :typeId');
                            $statementFive->bindParam('missionId', $missionArray['id'], PDO::PARAM_INT);
                            $statementFive->bindValue('typeId', 3, PDO::PARAM_INT);

                            if ($statementFive->execute()){
                                $targets = $statementFive->fetchAll(PDO::FETCH_ASSOC);

//                                  Préparation d'une 6ème requête pour récupérer les agents parmi les personnes de terrain de la table 'field_persons' à partir de l'ID de mission
                                    $statementSix = $pdo->prepare('SELECT * FROM field_persons WHERE mission = :missionId AND type = :typeId');
                                    $statementSix->bindParam('missionId', $missionArray['id'], PDO::PARAM_INT);
                                    $statementSix->bindValue('typeId', 1, PDO::PARAM_INT);

                                    if($statementSix->execute()){
                                        $agents = $statementSix->fetchAll(PDO::FETCH_ASSOC);


                                        echo '
                                        <div class="container-fluid">
                                            <h3 class="mt-4"><span class="text-decoration-underline">Titre :</span> '.$missionArray['title'].'</h3>
                                            <div>
                                                <p class="mt-4"><span class="text-decoration-underline">Nom de code :</span> '.$missionArray['code_name'].'</p>
                                                <p class="mt-4"><span class="text-decoration-underline">Pays d\'intervention :</span> '.$countryName['french_name'].'</p>
                                                <p><span class="text-decoration-underline">Statut de la mission :</span> '.$statusName['name'].'</p>
                                                <p><span class="text-decoration-underline">Spécialité requise :</span> '.$specialityName['name'].'</p>';

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


                                        echo'<p><span class="text-decoration-underline">Date de début :</span> '.dateToFrench($missionArray['start_date'],'l d F o').'</p>
                                             <p><span class="text-decoration-underline">Date de fin :</span> '.dateToFrench($missionArray['end_date'], 'l d F o').'</p>
                                             <p>
                                             <span class="text-decoration-underline">Description :</span> <br>
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
        }
    ?>
</main>
<?php
require_once (__DIR__ . '/../templates/front_footer.php');
?>