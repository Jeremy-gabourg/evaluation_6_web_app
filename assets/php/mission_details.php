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
        $statement = $pdo->prepare('SELECT * FROM missions WHERE id LIKE :id');
        $statement->bindParam('id', $_GET['missionId'], PDO::PARAM_INT);

        setlocale(LC_TIME, 'fr_FR', 'French');
        function dateToFrench($date, $format) :string
        {
            $english_days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
            $french_days = array('lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche');
            $english_months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
            $french_months = array('janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre');
            return str_replace($english_months, $french_months, str_replace($english_days, $french_days, date($format, strtotime($date) ) ) );
        }

        if ($statement->execute()) {
            while ($mission = $statement->fetch()) {
                $missionArray = json_decode(json_encode($mission), true);

                $statusId = $missionArray['status'];
                $statementBis = $pdo->prepare('SELECT * FROM mission_status WHERE id LIKE ?');
                $statementBis->bindParam(1, $statusId, PDO::PARAM_INT);

                if ($statementBis->execute()){
                    $statusName = $statementBis->fetch();

                    $countryId = $missionArray['country'];
                    $statementTri = $pdo->prepare('SELECT * FROM countries WHERE id LIKE ?');
                    $statementTri->bindParam(1, $countryId, PDO::PARAM_INT);

                    if ($statementTri->execute()){
                        $countryName = $statementTri->fetch();

                        echo '
                        <div class="container-fluid">
                            <h3>Titre : '.$missionArray['title'].'</h3>
                            <div>
                                <p class="mt-3">Nom de code : '.$missionArray['code_name'].'</p>
                                <p>Pays d\'intervention : '.$countryName['french_name'].'</p>
                                <p>Statut : '.$statusName['name'].'</p>
                                <p>Date de début : '.dateToFrench($missionArray['start_date'],'l d F o').'</p>
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
    ?>
</main>
<?php
require_once (__DIR__ . '/../templates/front_footer.html');
?>